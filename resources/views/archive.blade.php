{{--
  Template Name: Archive Template
--}}

@extends('layouts.app')

@section('content')
  <div class="container">
    @include('partials.page-header')
    <div class="row">
      <?
        wp_reset_query();
        $posts_per_page = 50;
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => $posts_per_page,
          'paged' => $paged,
        );
        $the_query = new WP_Query($args);

      ?>

      <div class="text-center mx-auto mb-4 archive-pagination">
        <?
          $big = 999999999; // need an unlikely integer
          $paginate_args = array(
              'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big))),
              'format' => '?paged=%#%',
              'current' => max(1, get_query_var('paged')),
              'total' => $the_query->max_num_pages,
              'show_all' => true,
          );
          echo paginate_links($paginate_args);

          $post_min = $posts_per_page * ($paged - 1) + 1;
          $post_max = $posts_per_page * ($paged - 1) + $the_query->post_count;
          $pagination_string = '<br><div class="pagination-string">nieuwsberichten ' .  $post_min  . '-' . $post_max . ' van in totaal ' . $the_query->found_posts . '</div>';
          if (get_bloginfo("language") == 'en-US') {
              $pagination_string = '<br><div class="pagination-string">news posts ' .  $post_min  . '-' . $post_max . ' of ' . $the_query->found_posts . ' total' . '</div>';
          }
          echo $pagination_string;
        ?>
      </div>

      @if ($the_query->have_posts())
        @while ($the_query->have_posts())
          <? $the_query->the_post() ?>
            @include('partials.archive-posts')
        @endwhile
      @endif

      <div class="text-center mx-auto mb-4 archive-pagination">
        <?
          echo paginate_links($paginate_args);
          echo $pagination_string;
        ?>
      </div>

      <? wp_reset_query(); ?>
    </div>
  </div>
@endsection
