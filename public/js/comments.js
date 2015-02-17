$(document).ready(function() {

    //disable the default action
    $("#comment-submit").click(function(){
        return false;
    });

    $("#comment-submit").click(function(){
        $(".error").hide();
        var hasError = false;

        var authorVal = $("#author").val();
        var postVal = $("#post_id").val();
        var commentVal = $("#comment").val();

        //validation
        if(commentVal == '') {
            $("#comment").after('<span class="error">Oops, you forgot to say something.</span>');
            hasError = true;

        }

        if(hasError == false) {

            $.post("/addcomment",
            {
                author: authorVal,
                post_id: postVal,
                comment: commentVal
            },

                function(data){

                    $('#commentcontainer').append($(' <div><small>Just now, <em><strong>you</strong></em> said:</small><br />'+ commentVal +'</div>').hide().fadeIn(2000));
                    $('#comment').val('');

                }
            );
        }

        return false;
    });
});
