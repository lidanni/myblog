require(['jquery'], function() {
    $(function () {
        $icon = $('.to-top');
        $(window).on('scroll', function () {
            var iScrollTop = $(window).scrollTop(),
                iWinHeight = $(window).height();
            if (iScrollTop > iWinHeight) {
                $icon.show();
            }
            else {
                $icon.hide();
            }
        });

        $icon.on('click', function () {
            //    此功能还未完善
        });
    });
});
