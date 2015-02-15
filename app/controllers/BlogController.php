<?php
class BlogController extends \BaseController{

    public function index(){
        return View::make('blog');
    }
}
