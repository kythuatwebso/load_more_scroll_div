jQuery(function($) {
    $('.ul_danhmuccheck.support').on('scroll', function() {
        var $t = $(this);
        if($t.scrollTop() + $t.innerHeight() >= $t[0].scrollHeight) {
            // alert('end reached');

            $.ajax({
                type: "GET",
                cache: true,
                url: "./ajax.php?op=hotrosanpham&name=loadmoresp&value="+parseInt($t.attr('data-page')),
                success: function (response) {
                    $(".ul_danhmuccheck.support").append(response);
                }
            });

            $t.attr('data-page', (parseInt($t.attr('data-page')) + 1));
        }
    });
});