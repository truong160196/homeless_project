<script type="text/javascript" src="{{asset('assets/lib/jquery/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/jquery-ui/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/popper.js/js/popper.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/lib/bootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/perfect-scrollbar.jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/parsleyjs/js/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/jt.timepicker/js/jquery.timepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/moment/min/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/fileuploader/js/jquery.modal.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/waitme/js/waitMe.min.js')}}"></script>

{{--<script type="text/javascript" src="{{asset('assets/lib/summernote/dist/summernote-bs4.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/datatables/js/dataTables.checkboxes.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/lightbox2/js/lightbox.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/lobibox/js/lobibox.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/simple-timer/simple-timer.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/lazyload/jquery.lazy.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/lazyload/jquery.lazy.plugins.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/context-menu/jquery.contextMenu.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/context-menu/jquery.ui.position.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('assets/lib/isotope/isotope.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('assets/lib/sweet2/sweet2.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/autoNumeric/autoNumeric.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/slim.js')}}"></script>
{{--JS library--}}
<script type="text/javascript"  src="{{asset('assets/js_admin/jquery.bootstrap-wizard.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/js_admin/bootstrap-material-design.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('assets/js_admin/chartist.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('assets/js_admin/material-dashboard.js?v=2.1.1')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/main.js')}}"></script>

<script>
    var base_url = "{{url('/')}}";
    var base_ajax = "{{url('/api')}}";
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
{{--web3 ethereum--}}
<script type="text/javascript" src="{{asset('assets/lib/web3/web3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/web3/ethereumjs-abi-0.6.5.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/web3/ethereumjs-wallet-0.6.0.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/web3/web3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/blockchain.js')}}"></script>

@yield('js')

{{--<script>$(window).on('load', function(){if($('.se-pre-con').length > 0) {$(".se-pre-con").fadeOut("slow");}});</script>--}}
