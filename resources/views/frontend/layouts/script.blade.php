@yield('before_scripts')
<script src="{{asset('frontend')}}/assets/libs/jquery/jquery-3.6.0.min.js"></script>
<script src="{{asset('frontend')}}/assets/libs/slick/slick.min.js"></script>
<script src="{{asset('frontend')}}/assets/libs/scrollreveal/scrollreveal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('frontend')}}/assets/libs/anime/anime.min.js"></script>
<!-- End Select2 -->
<script src="{{asset('frontend')}}/assets/libs/fancybox/jquery.fancybox.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/toastr.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/main-scripts.js"></script>
<!-- Messenger Плагин чата Code -->
<div id="fb-root"></div>

<!-- Your Плагин чата code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "103610888678329");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v12.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ru_RU/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@toastr_render
@yield('scripts')
