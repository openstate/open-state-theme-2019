@extends('layouts.app')

@section('content')
  <div class="container">
    @include('partials.page-header')

    <div class="row">
      <div class="col-12">
        <form class="search-bar bg-grijs-10" role="search" method="get" action="/">
          <label for="search-input" class="footer-form">
            <? _e("
              <!--:nl-->
                ZOEKEN:
              <!--:--><!--:en-->
                SEARCH:
              <!--:-->
            ") ?>
          </label>
          <input type="search" class="form-control" id="search-input" name="s" value="{!! get_search_query() !!}">
        </form>
      </div>
    </div>

    @if (have_posts())
      <div class="text-center mx-auto mb-4 archive-pagination">
        <?
          global $wp_query;
          $big = 999999999; // need an unlikely integer
          // Default 50, this value is set in functions.php
          $posts_per_page = $wp_query->query_vars['posts_per_page'];
          $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
          $paginate_args = array(
              'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big))),
              'format' => '?paged=%#%',
              'current' => max(1, get_query_var('paged')),
              'total' => $wp_query->max_num_pages,
              'show_all' => true,
          );
          echo paginate_links($paginate_args);

          $post_min = $posts_per_page * ($paged - 1) + 1;
          $post_max = $posts_per_page * ($paged - 1) + $wp_query->post_count;
          $pagination_string = '<br><div class="pagination-string">zoekresultaten ' .  $post_min  . '-' . $post_max . ' van in totaal ' . $wp_query->found_posts . '</div>';
          if (get_bloginfo("language") == 'en-US') {
              $pagination_string = '<br><div class="pagination-string">search results ' .  $post_min  . '-' . $post_max . ' of ' . $wp_query->found_posts . ' total' . '</div>';
          }
          echo $pagination_string;
        ?>
      </div>
    @endif

    @if (!have_posts())
      <?
        $lang = 'nl';
        if (get_bloginfo("language") == 'en-US') {
            $lang = 'en';
        }
      ?>

      <div class="alert alert-warning">
        <? if ($lang == 'nl') {
          echo 'Geen resultaten gevonden.';
        } elseif ($lang == 'en') {
          echo 'No results were found.';
        } ?>
        {{ __('', 'sage') }}
      </div>
    @endif

    @while(have_posts()) @php the_post() @endphp
      @include('partials.archive-posts')
    @endwhile

    @if (have_posts())
      <div class="text-center mx-auto mb-4 archive-pagination">
        <?
          echo paginate_links($paginate_args);
          echo $pagination_string;
        ?>
      </div>
    @endif
  </div>
@endsection
