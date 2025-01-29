<article @php post_class() @endphp>
  <header class="mb-5">
    @if ($agenda_evenement)
    <? _e("
      <!--:nl-->
        <h6>AGENDA</h6>
      <!--:--><!--:en-->
        <h6>AGENDA</h6>
      <!--:-->
    ") ?>
    @else
    <? _e("
      <!--:nl-->
        <h6>NIEUWS</h6>
      <!--:--><!--:en-->
        <h6>NEWS</h6>
      <!--:-->
    ") ?>
    @endif
    <div class="row">
      <div class="col-12">
        <hr class="mb-md-5">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="row post-header-title">
          <div class="col-12">
            <h1 class="entry-title">{!! get_the_title() !!}</h1>
          </div>
          <div class="col-12 mt-auto">
            @include('partials/entry-meta')
            <hr class="m-0">
          </div>
        </div>
      </div>
      <div class="col-md-6 my-auto text-center">
        {!! the_post_thumbnail('col-6-thumbnail', array('class' => 'img-fluid image-cover-post')) !!}
      </div>
    </div>
  </header>
  <div class="row entry-content">
    <div class="col-lg-8 offset-lg-2">
      @php the_content() @endphp

      @include('partials.action-boxes')

      @if ($agenda_evenement)
      @if ($agenda_inschrijfformulier_url)
      <a class="btn btn-paars inschrijf-button" href="{{ $agenda_inschrijfformulier_url }}">
        <? _e("
          <!--:nl-->
            Inschrijven
          <!--:--><!--:en-->
            Register
          <!--:-->
        ") ?>
        &nbsp;&nbsp;<i class="fas fa-arrow-right"></i>
      </a>
      @endif

      <div class="info-box d-flex">
        <?
          $unixtimestamp = strtotime($agenda_tijdstip);
          $formatted_date = date_i18n('l j F Y, H:i', $unixtimestamp);
        ?>
        <span class="fa-stack text-paars my-auto">
          <i class="far fa-clock fa-stack-2x icon-background"></i>
        </span>
        <h4 class="d-inline my-auto">{{ $formatted_date }}</h4>
      </div>

      <div class="info-box d-flex">
        <span class="fa-stack text-donkerpaars my-auto">
          <i class="far fa-circle fa-stack-2x icon-background"></i>
          <i class="fas fa-map-marker-alt fa-stack-1x"></i>
        </span>
        <h4 class="d-inline my-auto">{{ $agenda_locatie }}</h4>
      </div>
      @endif
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
