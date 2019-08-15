{{--
  Template Name: Newsletter Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <header class="mb-5">
      <div class="container">
        @include('partials.page-header')
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="p-4 bg-lichtblauw">
              @include('partials.newsletter')
            </div>
          </div>
        </div>
      </div>
    </header>
  @endwhile
@endsection
