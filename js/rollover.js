$(document).ready(function () {
    $(".panel-body img").each(function () {
        var oldurl = $(this).attr("src");
        var newurl = $(this).attr("id");

        var rolloverimg = new Image();
        rolloverimg.src = newurl;

        $(this).hover(
                function () {
                    $(this).attr("src", newurl);
                },
                function(){
                    $(this).attr("src",oldurl);
                }
        )


    })


})