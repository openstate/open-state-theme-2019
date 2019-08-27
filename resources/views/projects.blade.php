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
    $total_count_query = new WP_Query($args);
    $args['facetwp'] = true;
    $the_query = new WP_Query($args);
  ?>

  <div class="container facetwp-template">
    @include('partials.page-header')
    <div class="row projects-row">
      <div class="col-12 col-sm-6 col-md-4 bg-grijsblauw projects-filter">
        <span class="text-white"><b>Filter</b></span>
        <i class="fas fa-filter text-white float-right filter-icon"></i>
        @if ($_GET['_projects'] or $_GET['_projects_search'])
          <a class="float-right remove-filters" href="#" onclick="FWP.reset(); event.preventDefault();">
            <? _e("
              <!--:nl-->
                filters wissen
              <!--:--><!--:en-->
                remove filters
              <!--:-->
            ") ?>
          </a>
        @endif
        <?php echo facetwp_display('facet', 'projects_search'); ?>
        <?php echo facetwp_display('facet', 'projects'); ?>
      </div>
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
