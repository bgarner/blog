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
            //$(window).scrollTop(0);
        }

        if(hasError == false) {


            //$("#comment-form").append('<br /><br /><img style="height: 15px; width: 128px; float: left;" src="/images/ajax-loader.gif" alt="Sending" id="sending" />');
            //$("#sendEmail li.buttons").append('<img src="img/loading.gif" alt="Loading" id="loading" />');


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
