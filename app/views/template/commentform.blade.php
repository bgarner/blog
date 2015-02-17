<form id="comment-form">
    <input type="hidden" id="author" name="author" value="{{ Auth::user()->id }}">
    <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    <br />
    <button type="submit" class="btn btn-default pull-right" id="comment-submit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Send</button>
</form>
