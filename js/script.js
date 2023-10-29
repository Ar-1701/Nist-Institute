// Start Jquery 
$(document).ready(function () {
    $(".readMore").on("click", function () {
        $(this).parent().toggleClass("show");
        var replaceText = $(this).parent().hasClass("show") ? "ReadLess" : "ReadMore";
        $(this).html(replaceText);
    });
});

// last Bracket
// send file using ajax using form
// validation for name length