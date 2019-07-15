<div class="carousel-item {{ $active }}">
  <header>
    <h2><a href="{{ $project_url }}" target="_blank" rel="noopener">{!! $project_title !!}</a></h2>
  </header>
  <div class="box">
    <div class="cube">
      {!! $project_plaatje !!}
    </div>
    <div class="inverse-paars-button">
      <a class="open-site btn btn-paars" href="{{ $project_url }}" target="_blank" rel="noopener">Open site&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
    </div>
  </div>
</div>
