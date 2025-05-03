<script src="{{asset('/')}}frontend/assets/js/vendor/jquery.js"></script>
<script src="{{asset('/')}}frontend/assets/js/bootstrap.js"></script>
<script src="{{asset('/')}}frontend/assets/js/metisMenu.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/slick.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/jquery.fancybox.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/jquery-ui-slider-range.js"></script>
<script src="{{asset('/')}}frontend/assets/js/ajax-form.js"></script>
<script src="{{asset('/')}}frontend/assets/js/wow.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('/')}}frontend/assets/js/main.js"></script>
<script src="{{asset('/')}}frontend/assets/js/custom.js"></script>
<!-- Toastr -->
<script src="{{asset('/')}}app-assets/vendor/libs/toastr/toastr.js"></script>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1805091193393268');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1805091193393268&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
<script>
    //toster initilaxitions
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>

@stack('script')
