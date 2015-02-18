<?php
class BlogPostController extends BaseController{

    protected function index()
    {
        return View::make('admin/home');
    }

    protected function create()
    {
        return View::make('admin/posts/newpost');
    }

    protected function save()
    {
        $blogPostData = array(
            'author' => Input::get('authorid'),
            'title' => Input::get('blogposttitle'),
            'content' => Input::get('blogpostcontent')
        );

        $blogpost = BlogPost::create($blogPostData);
        $blogpost->save();

        $message = "New post created!";
        return View::make('admin/home')
            ->with('message', $message);
    }

    protected function edit($id)
    {
        $blogpost = DB::table('posts')
            ->find($id);
        return View::make('admin/posts/editpost')
            ->with('blogpost', $blogpost);
    }

    protected function update()
    {
        $id= Input::get('post_id');

        $blogPostData = array(
            'title' => Input::get('blogposttitle'),
            'content' => Input::get('blogpostcontent')
        );

        BlogPost::find($id)->update($blogPostData);

        $message = "Post Updated!";
        return View::make('admin/home')
            ->with('message', $message);

    }
}
