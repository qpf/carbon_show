$(document).ready(function() {
    $("#menu").click(function() {
        if ($(".menulist").css("display") == 'none') {
            $(".menulist").slideToggle("show");
        } else {
            $(".menulist").slideToggle("hide");
        }
    });
    $("#uphide").click(function() {
        $(".menulist").slideToggle("hide");
    });
});

function bytes(str) {
    var len = 0;
    for (var i = 0; i < str.length; i++) {
        if (str.charCodeAt(i) > 127) {
            len++;
        }
        len++;
    }
    return len;
}