<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('/backend')}}/assets/js/bundle.js?ver=2.4.0"></script>
<script src="{{asset('/backend')}}/assets/js/toastr.min.js"></script>
<script src="{{asset('/backend')}}/assets/js/dropzone/dropzone.min.js"></script>
@toastr_render
<script src="{{asset('/backend')}}/assets/js/scripts.js?ver=2.4.0"></script>
@yield('scripts')
