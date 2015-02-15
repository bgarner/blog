<?php
class AdminController extends BaseController{

    protected function showLogin(){

        return View::make('admin/login');
    }
}
