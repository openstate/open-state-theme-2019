<div class="row entry-content">
  <div class="col-lg-8 offset-lg-2">
    @php the_content() @endphp
    @include('partials.action-boxes')
  </div>
</div>
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
