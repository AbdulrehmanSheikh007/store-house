</div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
        <script src="{{asset('public/scripts/extras.1.1.0.min.js')}}"></script>
        <script src="{{asset('public/scripts/shards-dashboards.1.1.0.min.js')}}"></script>
        <script src="{{asset('public/alertify/alertify.min.js')}}"></script>
        <script src="{{asset('public/datepicker/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/datepicker/daterangepicker.js')}}" type="text/javascript"></script>
        <!-- Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script async defer src="{{asset('public/js/default.js')}}"></script>
        
        <script>
            var SITE_URL = site_url = "{{ url('/')}}";
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var APP_URL = "<?php echo URL::to('/'); ?>";
        </script>
    </body>
</html>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>