<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Program;
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
            $validationArr['id'] = 'required|integer|exists:users,id';
            $validationArr['email'] .= ','.$request->input('id');

            if ($request->input('password')) {
                $validationArr['password'] = 'required|confirmed|min:3|max:50';
                $fields['password'] = bcrypt($fields['password']);
            } else unset($fields['password']);

            $this->validate($request, $validationArr);
            $user = User::findOrFail($request->input('id'));
        } else {
            $validationArr['password'] = 'required|confirmed|min:3|max:50';
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
    
    public function programs(Request $request, $slug=null)
    {
        $this->breadcrumbs = ['users' => trans('content.programs')];
        if ($request->has('id')) {
            $this->data['program'] = Program::findOrFail($request->input('id'));
            $this->breadcrumbs['programs?id='.$this->data['program']->id] = $this->data['program']->title;
            return $this->showView('program');
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs['programs/add'] = trans('content.adding_program');
            return $this->showView('program');
        } else {
            $this->data['programs'] = Program::all();
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
            $validationArr['id'] = 'required|integer|exists:programs,id';
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
        $this->validate($request, ['id' => 'required|integer|exists:programs,id']);
        $program = Program::find($request->input('id'));
        foreach ($program->trainings as $training) {
            $this->unlinkFile($training, 'photo');
            foreach ($training->photos as $photo) {
                $this->unlinkFile($photo, 'photo');
            }
        }
        $program->delete();
        return response()->json(['success' => true]);
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
        $menus = [
            ['href' => 'users', 'name' => trans('content.users'), 'icon' => 'icon-users'],
            ['href' => 'programs', 'name' => trans('content.programs'), 'icon' => 'icon-folder-open2'],
            ['href' => 'settings', 'name' => trans('content.settings'), 'icon' => 'icon-gear']
        ];

//        $this->data['messages'] = $this->getMessages();

        return view('admin.'.$view, [
            'breadcrumbs' => $this->breadcrumbs,
            'data' => $this->data,
            'menus' => $menus
        ]);
    }
}