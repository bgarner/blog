<?php
class PostController extends BaseController{

    protected function index(){
        //show all of the posts
        return View::make('admin/home');
    }

    protected function showPost($id){
        //show a specific post
        //return View::make('admin/posts');
    }

    protected function editPost(){

        return View::make('admin/editpost');
    }


    protected function newPost(){

        return View::make('admin/newpost');
    }

}
