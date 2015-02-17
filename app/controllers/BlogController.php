<?php
class BlogController extends \BaseController{

    public function index()
    {
        $posts = BlogPost::all();
        return View::make('blog')
            ->with('posts', $posts);
    }

    public function read($id)
    {
        $post = BlogPost::find($id);
        //dd($post->author);
        $author = User::find($post->author);
        $comments = Comment::getCommentsByPost($id);
        return View::make('read')
            ->with('post', $post)
            ->with('author', $author)
            ->with('comments', $comments);
    }

    public function authors()
    {
        $authorList = User::authorList();
        return View::make('authors')
            ->with('authorList', $authorList);
    }

    public function authorProfile($id)
    {
        $author = User::find($id);
        $posts = BlogPost::getUserPosts($id);
        $comments = Comment::getCommentsByUser($id);
        return View::make('authorprofile')
            ->with('author', $author)
            ->with('posts', $posts)
            ->with('comments', $comments);
    }

}
