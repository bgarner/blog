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


    $(document).on('click','.comment-delete',function(){

        var commentidVal = $(this).attr('data-comment');
        var selector = "#comment"+commentidVal;

        $.post("/deletecomment",{ comment_id: commentidVal })
            .done( function(data){
                $(selector).closest('tr').fadeOut(2000);
            });
        return false;
    });

    $(document).on('click','.comment-delete-inblog',function(){

        var commentidVal = $(this).attr('data-comment');
        var selector = "#comment"+commentidVal;

        $.post("/deletecomment",{ comment_id: commentidVal })
        .done( function(data){
            $(selector).closest('div').fadeOut(2000);
        });
        return false;
    });

});
