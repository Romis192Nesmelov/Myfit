<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
//use Carbon\Carbon;

class AdminController extends UserController
{
    use HelperTrait;
    
    private $breadcrumbs = [];

    public function __construct()
    {
        $this->middleware('auth');
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
            return $this->showView('user');
        } else if ($slug && $slug == 'add') {
            $this->breadcrumbs['users/add'] = trans('content.adding_user');
            return $this->showView('user');
        } else {
            $this->data['users'] = User::all();
            return $this->showView('users');
        }
    }

    public function deleteUser(Request $request)
    {
        return $this->deleteSomething($request, new User());
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
            ['href' => 'users', 'name' => trans('content.users'), 'icon' => 'icon-users']
        ];

//        $this->data['messages'] = $this->getMessages();

        return view('admin.'.$view, [
            'breadcrumbs' => $this->breadcrumbs,
            'data' => $this->data,
            'menus' => $menus
        ]);
    }
}