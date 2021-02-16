<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\UserParam;
use App\Program;
use App\Training;
use App\TrainingDay;
use App\TrainingVideo;
use App\TrainingGoal;
use App\TrainingPhoto;
use App\VideoAdvice;
use App\Feed;
use App\Payment;
use App\Settings;
//use Carbon\Carbon;

class AdminController extends UserController
{
    use HelperTrait;
    
    private $breadcrumbs = [];

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return redirect('admin/users');
    }

    public function users(Request $request, $slug=null)
    {
        $this->breadcrumbs = ['users' => trans('content.users')];
        if ($request->has('id')) {
            $this->data['user'] = User::findOrFail($request->input('id'));
            $this->breadcrumbs['users?id='.$this->data['user']->id] = $this->data['user']->name;
            $this->data['locations'] = $this->getLocations($this->data['user']->location);
            $this->data['years'] = $this->getBirthdayYears();
            return $this->showView('user');
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs['users/add'] = trans('content.adding_user');
            $this->data['locations'] = $this->getLocations();
            $this->data['years'] = $this->getBirthdayYears();
            return $this->showView('user');
        } else {
            $this->data['users'] = User::all();
            return $this->showView('users');
        }
    }

    public function editUser(Request $request)
    {
        $validationArr = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email'
        ];
        $fields = $this->processingFields($request, 'active', ['old_password','avatar']);

        if ($request->has('id')) {
            $validationArr['id'] = $this->validationUser;
            $validationArr['email'] .= ','.$request->input('id');

            if ($request->input('password')) {
                $validationArr['password'] = $this->validationPassword;
                $fields['password'] = bcrypt($fields['password']);
            } else unset($fields['password']);

            $this->validate($request, $validationArr);
            $user = User::findOrFail($request->input('id'));
        } else {
            $validationArr['password'] = $this->validationPassword;
            $this->validate($request, $validationArr);
            $fields['password'] = bcrypt($fields['password']);
            $user = User::create($fields);
        }

        if ($request->file('avatar')) $fields = array_merge($fields, $this->processingImage($request, $user, 'avatar', 'user_'.$user->id, 'images/avatars'));
        $user->update($fields);

        $this->saveCompleteMessage();
        return redirect('/admin/users');
    }

    public function deleteUser(Request $request)
    {
        return $this->deleteSomething($request, new User(), 'avatar');
    }
    
    public function editUserParam(Request $request)
    {
        $this->validate($request, ['id' => $this->validationUser]);
        $userId = $request->input('id');
        $params = ['height','weight','waist_girth','hip_girth'];
        $userParams = UserParam::where('user_id',$userId)->get();

        foreach ($userParams as $userParam) {
            $changedParams = false;
            foreach ($params as $param) {
                $inputName = 'param'.$userParam->id.'_'.$param;
                if ($request->has($inputName)) {
                    $value = $request->input($inputName);
                    if ($value > 300) $value = 300;
                    if ($userParam[$param] != $value) {
                        $userParam[$param] = $value;
                        $changedParams = true;
                    }
                }
            }
            if ($changedParams) $userParam->save();
        }

        $newParams = false;
        $fields = ['user_id' => $userId];
        foreach ($params as $param) {
            $value = $request->input('param_add_'.$param);
            $fields[$param] = $value;
            if ($value) $newParams = true;
        }
        if ($newParams) UserParam::create($fields);

        $this->saveCompleteMessage();
        return redirect()->back();
    }
    
    public function deleteUserParam(Request $request)
    {
        return $this->deleteSomething($request, new UserParam());
    }
    
    public function programs(Request $request, $slug=null)
    {
        $this->breadcrumbs = ['programs' => trans('content.programs')];
        if ($request->has('id')) {
            $this->data['program'] = Program::findOrFail($request->input('id'));
            $this->breadcrumbs['programs?id='.$this->data['program']->id] = $this->data['program']->title;
            return $this->showView('program');
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs['programs/add'] = trans('content.adding_program');
            return $this->showView('program');
        } else {
            return $this->showView('programs');
        }
    }
    
    public function editProgram(Request $request)
    {
        $validationArr = [
            'title' => 'required|max:255|unique:programs,title',
            'description' => 'required|min:3|max:3000'
        ];
        $fields = $this->processingFields($request, 'active','photo');

        if ($request->has('id')) {
            $validationArr['id'] = $this->validationProgram;
            $validationArr['title'] .= ','.$request->input('id');

            $this->validate($request, $validationArr);
            $program = Program::findOrFail($request->input('id'));
        } else {
            $this->validate($request, $validationArr);
            $program = Program::create($fields);
        }

        if ($request->file('photo')) $fields = array_merge($fields, $this->processingImage($request, $program, 'photo', 'program'.$program->id, 'images/programs'));
        $program->update($fields);

        $this->saveCompleteMessage();
        return redirect('/admin/programs');
    }
    
    public function deleteProgram(Request $request)
    {
        $this->validate($request, ['id' => $this->validationProgram]);
        $program = Program::find($request->input('id'));
        foreach ($program->trainings as $training) {
            $this->deletingTraining($training);
        }
        $program->delete();
        return response()->json(['success' => true]);
    }
    
    public function trainings(Request $request, $slug=null)
    {
        $this->breadcrumbs = ['programs' => trans('content.programs')];
        if ($request->has('id')) {
            $this->data['training'] = Training::findOrFail($request->input('id'));
            $this->breadcrumbs['programs?id='.$this->data['training']->program->id] = $this->data['training']->program->title;
            $this->breadcrumbs['trainings?id='.$this->data['training']->id] = $this->data['training']->duration.' '.trans('content.weeks').'/'.$this->data['training']->periodicity;
            return $this->showView('training');
        } else if ($slug && $slug == 'add') {
            $this->validate($request, ['program_id' => $this->validationProgram]);
            $program = Program::find($request->input('program_id'));
            $this->breadcrumbs['programs?id='.$program->id] = $program->title;
            $this->breadcrumbs['programs/add'] = trans('content.adding_training');
            return $this->showView('training');
        } else {
            return $this->showView('trainings');
        }
    }

    public function editTraining(Request $request)
    {
        $validationArr = [
            'complexity' => 'required|integer|min:1|max:6',
            'duration' => 'required|integer|min:1|max:10',
            'periodicity' => 'regex:/^((\d+)\s(раз(а)?)\s(в)\s(неделю))$/',
            'equipment' => 'required|max:191',

            'warning_title' => 'required|max:191',
            'warning_description' => 'required|max:1000',
            'recommendation_title' => 'required|max:191',
            'recommendation_description' => 'required|max:1000',

            'warmup_warning_title' => 'max:191',
            'warmup_warning_description' => 'max:1000',
            'warmup_recommendation_title' => 'max:191',
            'warmup_recommendation_description' => 'max:1000',

            'main_warning_title' => 'required|max:191',
            'main_warning_description' => 'required|max:1000',
            'main_recommendation_title' => 'required|max:191',
            'main_recommendation_description' => 'required|max:1000',

            'main_cardio_title' => 'max:191',
            'main_cardio_description' => 'max:1000',

            'hitch_warning_title' => 'max:191',
            'hitch_warning_description' => 'max:1000',
            'hitch_recommendation_title' => 'max:191',
            'hitch_recommendation_description' => 'max:1000',

            'price' => 'required|integer|min:50|max:10000',
            'program_id' => $this->validationProgram
        ];
        
        $fields = $this->processingFields($request,['with_cardio','its_cardio','active'],'photo');
        if ($fields['its_cardio']) $fields['with_cardio'] = 0;

        if ($request->has('id')) {
            $validationArr['id'] = $this->validationTraining;
            $this->validate($request, $validationArr);
            $training = Training::findOrFail($request->input('id'));
        } else {
            $this->validate($request, $validationArr);
            $training = Training::create($fields);
        }

        if ($request->file('photo')) $fields = array_merge($fields, $this->processingImage($request, $program, 'photo', 'program'.$program->id, 'images/programs'));
        $training->update($fields);

        $this->saveCompleteMessage();
        return redirect()->back();
    }

    public function deleteTraining(Request $request)
    {
        $this->validate($request, ['id' => $this->validationTraining]);
        $this->deletingTraining(Training::find($request->input('id')));
        return response()->json(['success' => true]);
    }
    
    private function deletingTraining(Training $training)
    {
        $this->unlinkFile($training, 'photo');
        foreach ($training->photos as $photo) {
            $this->unlinkFile($photo, 'photo');
        }
        $training->delete();
    }
    
    public function day(Request $request, $slug=null)
    {
        $this->breadcrumbs = ['programs' => trans('content.programs')];
        if ($request->has('id')) {
            $this->data['day'] = TrainingDay::findOrFail($request->input('id'));
            $this->breadcrumbs['programs?id='.$this->data['day']->training->program->id] = $this->data['day']->training->program->title;
            $this->breadcrumbs['trainings?id='.$this->data['day']->training->id] = $this->data['day']->training->duration.' '.trans('content.weeks').'/'.$this->data['day']->training->periodicity;
            $this->breadcrumbs['day?id='.$this->data['day']->id] = trans('content.day_id',['id' => $this->data['day']->id]);
        } else if ($slug && $slug == 'add') {
            $this->validate($request, ['training_id' => $this->validationTraining]);
            $training = Training::find($request->input('program_id'));
            $this->breadcrumbs['programs?id='.$training->program->id] = $training->program->title;
            $this->breadcrumbs['trainings?id='.$training->id] = trans('content.training_id',['id' => $training->id]);
            $this->breadcrumbs['day/add'] = trans('content.adding_day');
        }
        return $this->showView('day');
    }
    
    public function editDay(Request $request)
    {
        $validationArr = [
            'training_id' => $this->validationTraining,
            'emphasis' => 'required|min:3|max:191'
        ];
        $fields = $this->processingFields($request);

        if ($request->has('id')) {
            $validationArr['id'] = $this->validationTrainingDay;
            $this->validate($request, $validationArr);
            $day = TrainingDay::findOrFail($request->input('id'));
            $day->update($fields);
        } else {
            $this->validate($request, $validationArr);
            TrainingDay::create($fields);
        }
        $this->saveCompleteMessage();
        return redirect()->back();
    }
    
    public function deleteDay(Request $request)
    {
        return $this->deleteSomething($request, new TrainingDay());
    }

    public function editGoals(Request $request)
    {
        $this->validate($request, ['id' => $this->validationTraining]);
        $trainingId = $request->input('id');
        $addGoal = $request->input('goal_add');
        $trainingGoals = TrainingGoal::where('training_id',$trainingId)->get();
        foreach ($trainingGoals as $goal) {
            $goalText = $request->input('goal_id'.$goal->id);
            if ($goalText && $goalText != $goal->goal) {
                $goal->goal = $goalText;
                $goal->save();
            } else if (!$goalText) $goal->delete();
        }

        if ($addGoal) {
            TrainingGoal::create([
                'goal' => $addGoal,
                'training_id' => $trainingId
            ]);
        }
        $this->saveCompleteMessage();
        return redirect()->back();
    }
    
    public function deleteGoal(Request $request)
    {
        return $this->deleteSomething($request, new TrainingGoal());
    }
    
    public function editPhotos(Request $request)
    {
        $this->validate($request, ['id' => $this->validationTraining]);
        $trainingId = $request->input('id');
        $addPhoto = $request->file('photo_add');
        $trainingPhotos = TrainingPhoto::where('training_id',$trainingId)->get();
        foreach ($trainingPhotos as $photo) {
            $inPhoto = $request->input('photo_id'.$photo->id);
            if ($inPhoto) {
                $field = $this->processingImage($request, $photo, 'photo', 'photo'.$photo->id, 'images/potos');
                $photo->update($field);
            }
        }

        if ($addPhoto) {
            $photo = TrainingPhoto::create([
                'photo' => '',
                'training_id' => $trainingId
            ]);
            $field = $this->processingImage($request, $photo, 'photo', 'photo'.$photo->id, 'images/potos');
            $photo->update($field);
        }
        $this->saveCompleteMessage();
        return redirect()->back();
    }
    
    public function deletePhoto(Request $request)
    {
        return $this->deleteSomething($request, new TrainingPhoto(), 'photo');
    }
    
    public function editVideo(Request $request)
    {
        $changeHref = function($href) {
            return str_replace('https://youtu.be/','https://www.youtube.com/embed/',$href);
        };

        $this->validate($request, ['id' => $this->validationTrainingDay]);
        $dayId = $request->input('id');
        $addVideo = $request->input('video_add');
        $dayVideos = TrainingVideo::where('training_day_id',$dayId)->get();
        foreach ($dayVideos as $video) {
            $href = $request->input('video_id'.$video->id);
            if ($href && $href != $video->video) {
                $video->video = $changeHref($href);
                $video->save();
            } else if (!$href) $video->delete();
        }

        if ($addVideo) {
            TrainingVideo::create([
                'video' => $changeHref($addVideo),
                'training_day_id' => $dayId
            ]);
        }
        $this->saveCompleteMessage();
        return redirect()->back();
    }

    public function deleteVideo(Request $request)
    {
        return $this->deleteSomething($request, new TrainingVideo());
    }

    public function videoAdvice(Request $request)
    {
        $this->breadcrumbs = ['video-advice' => trans('content.video_advice')];
        if ($request->has('id')) {
            $this->data['advice'] = VideoAdvice::findOrFail($request->input('id'));
            $this->breadcrumbs['video-advices?id='.$this->data['advice']->id] = trans('content.video_advice_by',['date' => $this->data['advice']->updated_at]);
            return $this->showView('video_advice');
        } else {
            VideoAdvice::where('new',1)->update(['new' => 0]);
            $this->data['advices'] = VideoAdvice::orderBy('created_at','desc')->get();
            return $this->showView('video_advices');
        }
    }

    public function editVideoAdvice(Request $request)
    {
        $this->validate($request, ['id' => 'required|integer|exists:video_advice,id']);
        $fields = $this->processingFields($request,'paid');
        $advice = VideoAdvice::find($request->input('id'));
        $advice->update($fields);
        $this->saveCompleteMessage();
        return redirect('/admin/video-advice');
    }

    public function deleteVideoAdvice(Request $request)
    {
        return $this->deleteSomething($request, new VideoAdvice());
    }

    public function feed(Request $request)
    {
        $this->breadcrumbs = ['feed' => trans('content.feed')];
        if ($request->has('id')) {
            $this->data['feed'] = Feed::findOrFail($request->input('id'));
            $this->breadcrumbs['feed?id='.$this->data['feed']->id] = trans('content.feed_by',['date' => $this->data['feed']->updated_at]);
            return $this->showView('feed');
        } else {
            Feed::where('new',1)->update(['new' => 0]);
            $this->data['feeds'] = Feed::orderBy('created_at','desc')->get();
            return $this->showView('feeds');
        }
    }

    public function editFeed(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:feeds,id',
            'recipe' => 'required|min:5|max:2000',
            'comment' => 'max:2000',
        ]);
        $fields = $this->processingFields($request,'paid');
        $feed = Feed::find($request->input('id'));
        $feed->update($fields);
        $this->saveCompleteMessage();
        return redirect('/admin/feed');
    }

    public function deleteFeed(Request $request)
    {
        return $this->deleteSomething($request, new Feed());
    }
    
    public function payments(Request $request, $slug=null)
    {
        $this->breadcrumbs = ['payments' => trans('content.payments')];
        if ($request->has('id')) {
            $this->data['payment'] = Payment::findOrFail($request->input('id'));
            $this->breadcrumbs['payments?id='.$this->data['payment']->id] = trans('content.payment_by',['date' => $this->data['payment']->created_at]);
            $this->data['users'] = User::all();
            return $this->showView('payment');
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs['payments/add'] = trans('content.adding_user');
            $this->data['users'] = User::all();
            return $this->showView('payment');
        } else {
            $this->data['payments'] = Payment::orderBy('created_at','desc')->get();
            return $this->showView('payments');
        }
    }
    
    public function editPayment(Request $request)
    {
        $validationArr = [
            'user_id' => $this->validationUser,
            'training_id' => $this->validationTraining,
            'value' => 'required|integer|min:50',
        ];
        $fields = $this->processingFields($request, 'active');
        $training = Training::find($fields['training_id']);
        $fields['value'] = $fields['value'] > $training->price ? $training->price : $fields['value'];

        if ($request->has('id')) {
            $validationArr['id'] = 'required|integer|exists:payments,id';
            $this->validate($request, $validationArr);
            $payment = Payment::find($request->input('id'));
            $payment->update($fields);
        } else {
            $this->validate($request, $validationArr);
            Payment::create($fields);
        }
        $this->saveCompleteMessage();
        return redirect('/admin/payments');
    }

    public function deletePayment(Request $request)
    {
        return $this->deleteSomething($request, new Payment());
    }
    
    public function getUser(Request $request)
    {
        $this->validate($request, ['id' => $this->validationUser]);
        $user =  User::find($request->input('id'));
        $userBlock = view('admin._user_creds_block',[
            'title' => trans('content.user_why_created_payment'),
            'user' => $user,
            'users' => User::all()
        ])->render();
        return response()->json(['success' => true, 'user' => $userBlock]);
    }

    public function getTraining(Request $request)
    {
        $this->validate($request, ['id' => $this->validationTraining]);
        $training = Training::find($request->input('id'));
        $price = view('admin._money_format_block', ['value' => $training->price])->render();
        return response()->json(['success' => true, 'program' => $training->program->title, 'value' => $training->price, 'price' => $price]);
    }

    public function settings()
    {
        $this->breadcrumbs = ['users' => trans('content.settings')];
        $this->data['settings'] = Settings::all();
        return $this->showView('settings');
    }

    public function editSettings(Request $request)
    {
        $settings = Settings::all();
        $validationArr = [];
        foreach ($settings as $setting) {
            $validationArr[$setting->name] = 'required|integer|min:100|max:10000';
        }
        $this->validate($request, $validationArr);
        foreach ($settings as $setting) {
            $setting->value = $request->input($setting->name);
            $setting->save();
        }
        $this->saveCompleteMessage();
        return redirect('/admin/settings');
    }

    private function deleteSomething(Request $request, Model $model, $files=null, $addValidation=null)
    {
        $this->validate($request, ['id' => 'required|integer|exists:'.$model->getTable().',id'.($addValidation ? '|'.$addValidation : '')]);
        $table = $model->find($request->input('id'));
        
        $table->delete();

        if ($files) {
            if (is_array($files)) {
                foreach ($files as $file) {
                    $this->unlinkFile($table, $file);
                }
            } else $this->unlinkFile($table, $files);
        }
        return response()->json(['success' => true]);
    }

    private function showView($view)
    {
        $programs = Program::all();
        $programsSubMenu = [];
        foreach ($programs as $program) {
            $programsSubMenu[] = ['href' => '?id='.$program->id, 'name' => $program->title];
        }
        
        $menus = [
            ['href' => 'users', 'name' => trans('content.users'), 'icon' => 'icon-users'],
            ['href' => 'programs', 'name' => trans('content.programs'), 'icon' => 'icon-tree6', 'submenu' => $programsSubMenu],
            ['href' => 'trainings', 'name' => trans('content.trainings'), 'icon' => 'icon-accessibility'],
            ['href' => 'settings', 'name' => trans('content.settings'), 'icon' => 'icon-gear'],
            ['href' => 'video-advice', 'name' => trans('content.video_advice'), 'icon' => 'icon-video-camera3'],
            ['href' => 'feed', 'name' => trans('content.feed'), 'icon' => 'icon-reading'],
            ['href' => 'payments', 'name' => trans('content.payments'), 'icon' => 'icon-wallet'],
        ];

//        $this->data['messages'] = $this->getMessages();

        return view('admin.'.$view, [
            'breadcrumbs' => $this->breadcrumbs,
            'programs' => $programs,
            'data' => $this->data,
            'menus' => $menus
        ]);
    }
}