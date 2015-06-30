$(function () {

    /* Form */
    $('#form').on("submit", function (e) {
        e.preventDefault();
        var fields = $(this).serializeArray();

        $.post("email.php", fields, responseForm, 'json');
        $('#button').prop( "disabled", true );
        
 


    });
    function responseForm(r) {

        if (r.success == 0) {

            alert("Revisa los campos");
            $('#button').prop( "disabled", false );
        }
        else {
            $('.content-form').text('');
            $('#form').append("<span class='message'>" + r.message + "<span>");
        }
    }

});
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        slideshowSpeed:	7000,
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });

});
$('#contact').on('click',function(){
    $('#popUp').addClass('show');
});
$('#close').on('click',function(){
    $('#popUp').removeClass('show');
});