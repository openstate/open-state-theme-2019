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
        <div class="container-fluid bg-grijs-5">
          <div class="row">
            <div class="container">
              <div class="row">
                <div id="carouselControls" class="col-10 offset-1 carousel slide" data-ride="carousel">
                  <div class="row move-carousel-lower">
                    <div class="col-6">
                      <div class="carousel-inner">
                        {{-- See app/Controllers/index.php, this calls partials/project-website-big-screenshot for each project website --}}
                      {!! $project_websites !!}
                      </div>
                    </div>
                    <div class="col-6">
                      
                      {!! the_post_thumbnail('col-6-thumbnail', array('class' => 'img-fluid')) !!}
                    </div>
                  </div>
                  <ol class="carousel-indicators">
                    {!! $project_websites_controls !!}
                  </ol>
                </div>
                <div class="col-12">
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
              </div>
            </div>
          </div>
        </div>
        <div class="project-balk-blauw container-fluid bg-lichtblauw">
          <div class="row">
            <div class="col-12">
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
