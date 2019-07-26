<div class="col-12">
  <article @php post_class() @endphp>
    <div class="row">
      <div class="col-12 col-md-3">
        <header>
          <a href="{!! the_permalink() !!}">
            <div class="overlay-container">
              {!! the_post_thumbnail('col-4-thumbnail', array('class' => 'img-fluid image-cover')) !!}
              <div class="overlay overlay-blauw d-flex">@include('partials/entry-meta')</div>
            </div>
          </a>
        </header>
      </div>
      <div class="col-12 col-md-9">
        <h5 class="entry-title bg-roze"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
        @php the_excerpt() @endphp
      </div>
    </div>
  </article>
</div>
