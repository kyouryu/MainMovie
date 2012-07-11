                   $(function(){

    $(":checked").parent().css("background", "");
$("input").click(function(e) {
    var t = e.target.type;
    var chk = $(this).prop('checked');
    var name = $(this).attr('name');
    if (t == 'checkbox') {
        if (chk == true) {
            $(this).parent().css('background', '#f3f365');
        } else {
            $(this).parent().css('background-color', '');
        }
        return true;

    }
});

})