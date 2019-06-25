<article @php post_class() @endphp>
  <div class="row">
    <div class="col-12">
      <header>
        <a href="{!! the_permalink() !!}">
          <div class="overlay-container">
            {!! the_post_thumbnail('thumbnail', array('class' => 'img-fluid image-cover-frontpage')) !!}
            <div class="overlay d-flex">@include('partials/entry-meta')</div>
          </div>
        </a>
        <h2 class="entry-title bg-roze"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
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
