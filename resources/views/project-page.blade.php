{{--
  Template Name: Project Template
--}}

@extends('layouts.app')

@section('content')
  <div>
    @while(have_posts()) @php the_post() @endphp
      <header class="mb-5">
        <div class="container">
          @include('partials.page-header')
        </div>
        <div class="container-fluid bg-grijs-5 bg-grijs-blauw">
          <div class="row">
            <div class="container">
              <div class="row position-relative">
                <div id="carouselControls" class="col-10 offset-1 carousel slide" data-ride="carousel">
                  <div class="row margin-top-50">
                    <div class="col-lg-4 offset-lg-1 order-lg-12 text-center my-auto">
                      {!! the_post_thumbnail('col-6-thumbnail', array('class' => 'img-fluid')) !!}
                    </div>
                    <div class="col-lg-6 order-lg-1">
                      <div class="carousel-inner">
                        {{-- See app/Controllers/index.php, this calls partials/project-website-big-screenshot for each project website --}}
                        {!! $project_websites !!}
                      </div>
                    </div>
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
  </div>
@endsection
