<?php
class UserController extends BaseController{

    protected function showUsers(){
        $users = User::getAllUsers();
        return View::make('/admin/users/users')
            ->with('users', $users);
    }

    protected function viewUser($id){
        $user = User::find($id);
        return View::make('/admin/users/view')
            ->with('user', $user);
    }

    protected function newUser(){
        return View::make('/admin/users/view');
    }

    protected function editUser($id){
        return View::make('/admin/users/edit');
    }


}
