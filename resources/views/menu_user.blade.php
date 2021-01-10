<div class="navbar-header">
  <a class="navbar-brand" href="{{ URL('/') }}">Alfa Tour & Travel</a>
</div>
<ul class="nav navbar-nav">
  <li class="active"><a href="{{ URL('/') }}">Home</a></li>
  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Trip <span class="caret"></span></a>
    <ul class="dropdown-menu">
      @foreach($trip as $v_trip)
        <li>
          <a href="#">{{ $v_trip->trip }}</a>
        </li>
      @endforeach
    </ul>
  </li>
  <li><a href="#">Refund</a></li>
  <li><a href="#">Reschedule</a></li>
  <li><a href="#">Konfirmasi</a></li>
  <li><a href="#">About Us</a></li>
  <li><a href="#">Testimoni</a></li>
</ul>