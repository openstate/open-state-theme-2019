{{--
  Template Name: Projects, Tools & Data Template
--}}

@extends('layouts.app')

@section('content')
  <?
    wp_reset_query();
    $args = array(
      'numberposts' => -1,
      'post_type' => 'page',
      'posts_per_page' => -1,
      'post_parent__in' => Array(9113, 9116, 9118, 9120, 9122)
    );
    $the_query = new WP_Query($args);
  ?>

  <div class="container">
    @include('partials.page-header')
    <div class="row">
      <?
        if($the_query->have_posts()):
          while($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="col-12 col-sm-6 col-md-4">
              @include('partials.content-projects')
            </div>
          <? endwhile;
        endif;
        wp_reset_query();
      ?>
    </div>
  </div>
@endsection
