<article @php post_class() @endphp>
  <div class="row">
    <div class="col-12">
      <header>
        <a href="{!! the_permalink() !!}">
          <div class="overlay-container">
            {!! the_post_thumbnail('col-8-thumbnail', array('class' => 'img-fluid image-cover')) !!}
            {{-- Events (page ID 8675) are given a donkerpaars overlay  --}}
            @if (wp_get_post_parent_id(get_the_id()) == 8675)
            <div class="overlay overlay-donkerpaars d-flex"></div>
            @else
            <div class="overlay overlay-blauw d-flex"></div>
            @endif
          </div>
        </a>
        <h5 class="entry-title bg-roze"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      </header>
    </div>
  </div>
</article>