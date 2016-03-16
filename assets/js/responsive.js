$(function(){
    var win = $(window);
    fn_responsive();

    win.on('resize', function(e) {
        fn_responsive();
    });

    if (window.addEventListener) {
        window.addEventListener('orientationchange', function() {
            fn_responsive();
        }, false);
    }

    var sr_move_flag;
    function fn_responsive()
    {
        if (win.width() > 480) {
            if (sr_move_flag === true) {

                sr_move_flag = false;
            }

            sr_is_mobile = false;

        } else {

            sr_is_mobile = true;

        }
    }
});