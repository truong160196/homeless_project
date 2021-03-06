<script type="text/javascript" src="{{asset('assets/js_user/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_user/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/waitme/js/waitMe.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/sweet2/sweet2.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/lib/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/slim.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/lib/moment/min/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/parsleyjs/js/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/waitme/js/waitMe.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/sweet2/sweet2.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js_user/qrcode.min.js')}}"></script>

{{--JS library--}}
<script type="text/javascript" src="{{asset('assets/js_user/jquery-plugin-collection.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_user/main.js')}}"></script>

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
<script type="text/javascript" src="{{asset('assets/lib/web3/ethereumjs-tx-1.3.3.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js_admin/blockchain.js')}}"></script>
@yield('js')
