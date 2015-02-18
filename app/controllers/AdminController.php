<?php
class AdminController extends BaseController{

    protected function showAdminLogin(){

        return View::make('admin/login');
    }

}
