<article @php post_class() @endphp>
  <div class="row">
    <div class="col-12">
      <header>
        <div class="header-image">
          {!! the_post_thumbnail('thumbnail', array('class' => 'img-fluid image-cover')) !!}
          @include('partials/entry-meta')
        </div>
        <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      </header>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="entry-summary">
        @php the_excerpt() @endphp
      </div>
    </div>
  </div>
</article>
