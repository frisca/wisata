    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
          <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More themes</a></li>
          <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank"> Support</a></li>
          <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank"> Purchase</a></li>
        </ul>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('theme-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="{{ asset('theme-assets/js/core/app-menu-lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme-assets/js/core/app-lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">
      function loadDoc() {
        var oborolan = $('#oborolan').val();
        var sender = $('#sender').val();
        
        var receiver = $('#receiver').val();
        console.log(receiver);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("demo").innerHTML =
            xhttp.responseText;
          }
        };
        xhttp.open("GET", "{{ URL('send') }}?sender="+sender+"&oborolan="+oborolan+'&receiver='+receiver, true);
        xhttp.send();
        $('#oborolan').val("");
      }
      $(document).ready(function(){
        $("li.nav-item").on('click', function(e){
          // console.log(e.target, new Date().toString());
          $("li.nav-item.active").removeClass('active');
          $(this).addClass('active');
        });
        $('#example').dataTable( {
            "autoWidth": false
        });
        $('#example1').dataTable( {
            "autoWidth": false
        });
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten,{
          language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
        
        var sender = $('#sender').val();   
        var receiver = $('#receiver').val();
        console.log(sender, receiver);
        $.ajaxSetup({cache:false});
        setInterval(function(){$('#demos').load("{{ URL('message') }}" + "?sender="+sender+"&receiver="+receiver);}, 2000);
      });
    </script>
  </body>
</html>