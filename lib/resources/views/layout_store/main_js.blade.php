<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

{{--JS library--}}
<script src="https://kit.fontawesome.com/fb68d1099d.js" crossorigin="anonymous"></script>
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
