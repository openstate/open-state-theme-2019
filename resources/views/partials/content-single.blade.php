<article @php post_class() @endphp>
  <header class="mb-5">
    <? _e("
      <!--:nl-->
        <h6>NIEUWS</h6>
      <!--:--><!--:en-->
        <h6>NEWS</h6>
      <!--:-->
    ") ?>
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
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
