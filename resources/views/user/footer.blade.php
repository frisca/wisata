<footer class="footer-section">
    <div class="container">
      <div class="footer-cta pt-5 pb-5">
        <div class="row" style="margin-top: 15px;margin-bottom: 25px; ">
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="glyphicon glyphicon-home"></i>
              <div class="cta-text">
                <h4>Office</h4>
                <span>PT. Mawardiana Berkah Sejahtera</span> <br>
                <span>Alfa Tour and Travel</span> <br>
                <span>Ciater Tengah RT 007/006</span> <br>
                <span>Kel. Ciater, Kec. Serpong</span> <br>
                <span>Tangerang Selatan</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="glyphicon glyphicon-earphone"></i>
              <div class="cta-text">
                <h4>Phone</h4>
                <span>Whatsapp : 0812 8905 9823</span><br>
                <span>Telepon&nbsp;&nbsp;&nbsp;&nbsp; : (021) 7587 0404</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="glyphicon glyphicon-compressed"></i>
              <div class="cta-text">
                <h4>Diana Fitria Upik</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-content pt-5 pb-5">
        <div class="row">
          <div class="col-xl-4 col-lg-4 mb-50">
          </div>
        </div>
      </div>
      </div>
      <div class="copyright-area">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 text-center text-lg-center">
              <div class="copyright-text">
                <p>
                  Travel Agent Paket Wisata Indonesia dan Luar Negeri<br>Alfa Tour dan Travel
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </footer>
</div>
<script>
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
    xhttp.open("GET", "{{ URL('user/send') }}?sender="+sender+"&oborolan="+oborolan+'&receiver='+receiver, true);
    xhttp.send();
    $('#oborolan').val("");
  }
  $(document).ready(function(){
    $('.pembayaran').change(function(){
      var pembayaran = $('.pembayaran').val();
      if(pembayaran == 1) {
        var total = parseInt($('.total').val()) * 0.3;
        $('.jumlah').val(total);
      }else if(pembayaran == 2){
        var total = parseInt($('.total').val());
        $('.jumlah').val(total);
      }else{
        $('.jumlah').val('');
      }
    });
    $('.paid').submit(function(){
      
    });
    $('.edit').click(function(){
        var id = $(this).attr('pemesananid'); //get 
         $('input[name="id_pemesanan"]').val(id);
     });
     $('.lunas').click(function(){
        var id = $(this).attr('pemesananid'); //get 
        var total = $(this).attr('total'); //get 
        $('input[name="id_pemesanan"]').val(id);
        $('input[name="total"]').val(total);
     });
     $('.refund').click(function(){
        var nomor = $(this).attr('pemesananid');
        $('input[name="nomor_pemesanan"]').val(nomor);
     });
     $( ".trip" ).change(function() {
      var id = $(this).val();
      $('.lokasi').empty();
      // console.log(id);
      if(id == ''){
        $('<option>', {value: '', text: 'Semua Destinasi'}).prependTo($('.lokasi'));
        $(".lokasi").val($(".lokasi option:first").val());
      }else{
        $.ajax({
            type: "GET",
            url: "{{ URL('wisata/trip/') }}" + "/" + id,
            dataType: 'json',
            success: function (data) {
              $.each(data, function (i, item) {
                  $('.lokasi').prepend($('<option>', { 
                      value: item.id_lokasi,
                      text : item.lokasi
                  }));
              });
              $('<option>', {value: '', text: 'Semua Destinasi'}).prependTo($('.lokasi'));
              $(".lokasi").val($(".lokasi option:first").val());
            },
            error: function (data) {
                console.log(data);
            }
        });
      }
    });
    var sender = $('#sender').val();   
    var receiver = $('#receiver').val();
    console.log(sender, receiver);
    $.ajaxSetup({cache:false});
    setInterval(function(){$('#demos').load("{{ URL('user/message') }}" + "?sender="+sender+"&receiver="+receiver);}, 2000);
  });
</script>
</body>
</html>