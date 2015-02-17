<?php
class Comment extends Eloquent {

    protected $table = 'comments';

    protected $fillable = array('post_id','author','comment');

    protected function getAllComments()
    {
        $comments = DB::table('comments')
            ->orderBy('updated_at', 'asc')
            ->get();
        return $comments;
    }

    protected function getCommentsByPost($id)
    {
        $comments = DB::table('comments')
            ->where('post_id', '=', $id)
            ->orderBy('updated_at', 'asc')
            ->get();
        return $comments;
    }

    protected function getCommentCount($id)
    {
        $comments = DB::table('comments')
            ->where('post_id', '=', $id)
            ->get();
        return count($comments);
    }

    protected function getCommentsByUser($id)
    {
        $comments = DB::table('comments')
            ->where('author','=', $id)
            ->orderBy('updated_at', 'asc')
            ->get();
        return $comments;
    }


}
