<?php
class BlogPostController extends BaseController{

    protected function index(){
        //show all of the posts, ordered by data updated
    
        return View::make('admin/home');

    }

    protected function show($id){
        //show a specific post
        //return View::make('admin/posts');
    }

    protected function create(){

        return View::make('admin/newpost');

    }

    protected function save(){
        $blogPostData = array(
            'author' => Input::get('authorid'),
            'title' => Input::get('blogposttitle'),
            'content' => Input::get('blogpostcontent')
        );
        //return View::make('admin/newpost');

        $blogpost = BlogPost::create($blogPostData);
        $blogpost->save();

    }

    protected function edit(){

        //return View::make('admin/editpost');
        return "edit post";
    }




}
