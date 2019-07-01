<header>
  <div class="row">
    <div class="col-md-8 offset-md-2 my-auto text-center">
      {!! the_post_thumbnail('col-8-thumbnail', array('class' => 'img-fluid image-cover-post')) !!}
    </div>
  </div>
</header>
<div class="row entry-content">
  <div class="col-lg-8 offset-lg-2">
    @php the_content() @endphp
  </div>
</div>
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
