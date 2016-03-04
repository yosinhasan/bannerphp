(function ($) {
    $(document).ready(function() {
        var src = $(".src").val();
        $.ajax({
            type: 'POST',
            url: '/process.php',
            data: 'src=' + src,
            success: function(data){
                
            }
        });
    });
})(jQuery);