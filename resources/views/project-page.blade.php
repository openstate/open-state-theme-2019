{{--
  Template Name: Project Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <header class="mb-5">
      <div class="container">
        @include('partials.page-header')
      </div>
      <div class="container-fluid bg-grijs-blauw">
        <div class="row">
          <div class="container">
            <div class="row position-relative">
              <div id="carouselControls" class="col-10 offset-1 carousel slide" data-ride="carousel">
                <div class="row margin-top-50">
                  @if (is_array(get_field('project_websites')))
                    <div class="col-lg-4 offset-lg-1 order-lg-12 text-center my-auto">
                      {!! the_post_thumbnail('col-6-thumbnail', array('class' => 'img-fluid')) !!}
                    </div>
                    <div class="col-lg-6 order-lg-1">
                      <div class="carousel-inner">
                        {{-- See app/Controllers/index.php, this calls partials/project-website-big-screenshot for each project website --}}
                        {!! $project_websites !!}
                      </div>
                    </div>
                  @else
                    <div class="col-lg-6 offset-lg-3 text-center my-auto pb-4">
                      {!! the_post_thumbnail('col-6-thumbnail', array('class' => 'img-fluid')) !!}
                    </div>
                  @endif
                </div>
                {!! $project_websites_controls !!}
              </div>
              @if ($project_websites_count > 1)
              <div class="col-12 carousel-controls">
                <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon mr-auto" aria-hidden="true"></span>
                  <span class="sr-only">
                    <? _e("
                      <!--:nl-->
                        Vorige
                      <!--:--><!--:en-->
                        Previous
                      <!--:-->
                    ") ?>
                  </span>
                </a>
                <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon ml-auto" aria-hidden="true"></span>
                  <span class="sr-only">
                    <? _e("
                      <!--:nl-->
                        Volgende
                      <!--:--><!--:en-->
                        Next
                      <!--:-->
                    ") ?>
                  </span>
                </a>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
      @include('partials.content-page')
    </div>
  @endwhile

  @if (count(array_filter(array(get_field('project_status_lobby_score'), get_field('project_status_data_beschikbaar_score'), get_field('project_status_ontsluiten_en_hulpmiddelen_score'), get_field('project_status_duurzame_ontsluiting_score'), get_field('project_status_hergebruik_score')))) > 0)
    <div class="container-fluid bg-grijs-30 status-carousel">
      <div class="row padding-bottom-40">
        <div class="container">
          <div class="row position-relative">
            <div class="col-12 text-center status">STATUS</div>
            <div id="carouselStatusControls" class="col-12 carousel slide" data-ride="carousel">
              @if (count(array_filter(array(get_field('project_status_lobby_score'), get_field('project_status_data_beschikbaar_score'), get_field('project_status_ontsluiten_en_hulpmiddelen_score'), get_field('project_status_duurzame_ontsluiting_score'), get_field('project_status_hergebruik_score')))) > 1)
                @include('partials.status-carousel-controls')
              @endif
              <div class="carousel-inner mt-4">
                @include('partials.status-carousel')
              </div>
            </div>
            @if (count(array_filter(array(get_field('project_status_lobby_score'), get_field('project_status_data_beschikbaar_score'), get_field('project_status_ontsluiten_en_hulpmiddelen_score'), get_field('project_status_duurzame_ontsluiting_score'), get_field('project_status_hergebruik_score')))) > 1)
              <div class="col-12 carousel-controls">
                <a class="carousel-control-prev" href="#carouselStatusControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon mr-auto" aria-hidden="true"></span>
                  <span class="sr-only">
                    <? _e("
                      <!--:nl-->
                        Vorige
                      <!--:--><!--:en-->
                        Previous
                      <!--:-->
                    ") ?>
                  </span>
                </a>
                <a class="carousel-control-next" href="#carouselStatusControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon ml-auto" aria-hidden="true"></span>
                  <span class="sr-only">
                    <? _e("
                      <!--:nl-->
                        Volgende
                      <!--:--><!--:en-->
                        Next
                      <!--:-->
                    ") ?>
                  </span>
                </a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endif

  <?
    wp_reset_query();

    $categories = get_the_category();
    if (!empty( $categories)) {
      $cat = esc_html($categories[0]->term_id);
      $cat_name = esc_html($categories[0]->name);
    }

    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'cat' => $cat,
    );

    $the_query = new WP_Query($args);
  ?>

  @if ($the_query->have_posts())
    <div class="container page-news mt-5">
      <h3 class="text-center">
        {{ $the_query->post_count }}
        <? _e("
          <!--:nl-->
            nieuwsberichten over
          <!--:--><!--:en-->
            news posts about
          <!--:-->
        ") ?>
        {{ $cat_name }}
      </h3>
      @while ($the_query->have_posts())
        <? $the_query->the_post() ?>
        <div class="row">
          <div class="col-12">
            <article <? post_class() ?>>
              <div class="row">
                <div class="col-12 col-lg-3 col-xl-2">
                  <header>
                    <a href="{!! the_permalink() !!}">
                      <div class="overlay-container">
                        {!! the_post_thumbnail('col-4-thumbnail', array('class' => 'img-fluid image-cover')) !!}
                        <div class="overlay overlay-blauw d-flex">
                          @include('partials/entry-meta')
                        </div>
                      </div>
                    </a>
                  </header>
                </div>
                <div class="col-12 col-lg-9 col-xl-10">
                  <p class="entry-title bg-roze">
                    <a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
                  </p>
                </div>
              </div>
            </article>
          </div>
        </div>
      @endwhile
    </div>
  @endif
@endsection
