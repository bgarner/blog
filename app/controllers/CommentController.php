<?php
class CommentController extends BaseController{

    protected function getLatest()
    {
        $comments = Comment::getAllComments();
        return View::make('/admin/comments/latest')
            ->with('comments', $comments);
    }

    protected function showComments($id)
    {
        $comments = Comment::getCommentsByPost($id);
        $blogpost = BlogPost::getBlogPost($id);
        return View::make('admin/comments/postcomments')
            ->with('comments', $comments)
            ->with('blogpost', $blogpost);
    }

    protected function deleteComment()
    {
        $id = Input::get('comment_id');
        $comment = Comment::find($id);
        $comment->delete();
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
