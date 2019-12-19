<article @php post_class() @endphp>
  <div class="row">
    <div class="col-12">
      <header>
        <a href="{!! the_permalink() !!}">
          <div class="overlay-container">
            {!! the_post_thumbnail('col-8-thumbnail', array('class' => 'img-fluid image-cover')) !!}
            <div class="overlay overlay-blauw d-flex">@include('partials/entry-meta')</div>
          </div>
        </a>
        <h5 class="entry-title bg-roze"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h5>
      </header>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="entry-summary bg-roze">
        @php the_excerpt() @endphp
      </div>
    </div>
  </div>
</article>
