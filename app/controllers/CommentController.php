<?php
class CommentController extends BaseController{

    protected function getLatest()
    {
        return View::make('/admin/comments/latest');
    }

    protected function showComments($postid)
    {

    }

    protected function editComment($id)
    {

    }

    public function addComment()
    {
        $commentdata = array(
            'post_id' => Input::get('post_id'),
            'author' => Input::get('author'),
            'comment' => Input::get('comment')
        );

        $comment = Comment::create($commentdata);
        $comment->save();

    }


}
