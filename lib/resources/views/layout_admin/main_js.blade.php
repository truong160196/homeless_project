<script type="text/javascript" src="{{asset('assets/lib/jquery/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/jquery-ui/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/popper.js/js/popper.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/lib/bootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/perfect-scrollbar.jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables/js/dataTables.checkboxes.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/parsleyjs/js/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/summernote/dist/summernote-bs4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/jt.timepicker/js/jquery.timepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/moment/min/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/lightbox2/js/lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/fileuploader/js/jquery.modal.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/lobibox/js/lobibox.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/waitme/js/waitMe.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/simple-timer/simple-timer.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/lazyload/jquery.lazy.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/lazyload/jquery.lazy.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/cascading-dropdown/jquery.cascadingdropdown.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/context-menu/jquery.contextMenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/context-menu/jquery.ui.position.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/isotope/isotope.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/sweet2/sweet2.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/autoNumeric/autoNumeric.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/slim.js')}}"></script>
{{--JS library--}}
<script type="text/javascript"  src="{{asset('assets/js_admin/jquery.bootstrap-wizard.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/js_admin/bootstrap-material-design.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/chartist.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/material-dashboard.js?v=2.1.1')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/main.js')}}"></script>
@yield('js')
{{--<script>$(window).on('load', function(){if($('.se-pre-con').length > 0) {$(".se-pre-con").fadeOut("slow");}});</script>--}}
<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

    });
</script>
<script>
    var run_waitMe = function(el, stop) {
        if (stop) {
            $(el).waitMe('hide');
        } else {
            $(el).waitMe({
                effect: 'bounce',
                text: 'Please wait...',
                bg: 'rgba(255,255,255,0.7)',
                color: '#000',
                maxSize: '',
                waitTime: -1,
                textPos: 'vertical',
                fontSize: '',
                source: "{{asset('/assets/images/loading_heineken.gif')}}",
                onClose: function(el) {}
            });
        }
    };

</script>
