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

  <div class="container">
    @include('partials.page-header')
    <div class="bg-grijsblauw projects-filter d-inline-block">
      <span class="text-white"><b>Filter</b></span>
      <i class="fas fa-filter text-white float-right filter-icon"></i>
      <div id="remove-filters">
        <a class="float-right" href="#" onclick="FWP.reset(); event.preventDefault();">
          <? _e("
            <!--:nl-->
              filters wissen
            <!--:--><!--:en-->
              remove filters
            <!--:-->
          ") ?>
        </a>
      </div>
      <? echo facetwp_display('facet', 'projects_search'); ?>
      <? echo facetwp_display('facet', 'projects'); ?>
    </div>
    <div class="row projects-row">
      <div id="no-results" class="col-12 col-sm-6 col-md-4 offset-md-4 offset-sm-6">
        <? _e("
          <!--:nl-->
            Er zijn geen projecten gevonden. Verwijder één of meerdere filters/zoektermen of <a href='#' onclick='FWP.reset(); event.preventDefault();'>wis alle filters</a>.
          <!--:--><!--:en-->
            No projects found. Remove one or more filters/search terms or <a href='#' onclick='FWP.reset(); event.preventDefault();'>remove all filters</a>.
          <!--:-->
        ") ?>
      </div>
      @if ($the_query->have_posts())
        <? $first_col = true ?>
        @while ($the_query->have_posts())
          <? $the_query->the_post() ?>
          @if ($first_col)
            <div class="col-12 col-sm-6 col-md-4 offset-md-4 offset-sm-6">
              @include('partials.content-projects')
            </div>
            <? $first_col = false ?>
          @else
            <div class="col-12 col-sm-6 col-md-4">
              @include('partials.content-projects')
            </div>
          @endif
        @endwhile
      @endif
      <? wp_reset_query() ?>
      </div>
    </div>
  </div>
@endsection
