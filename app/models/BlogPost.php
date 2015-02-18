<?php
class BlogPost extends Eloquent {

    protected $table = 'posts';
    protected $fillable = array('author', 'title', 'content');

    protected function getAllPosts()
    {
        $posts = DB::table('posts')
            ->orderBy('updated_at', 'des')
            ->get();
        return $posts;
    }

    protected function getUserPosts($id)
    {
        $posts = DB::table('posts')
            ->where('author', '=', $id)
            ->orderBy('updated_at', 'asc')
            ->get();
        return $posts;
    }

    protected function getBlogPost($id)
    {
        $post = DB::table('posts')
            ->find($id);
        return $post;
    }



}
