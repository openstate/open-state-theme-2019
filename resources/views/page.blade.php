@extends('layouts.app')

@section('content')
  <div class="container">
    @while(have_posts()) @php the_post() @endphp
      <header class="mb-5">
        @include('partials.page-header')
        <div class="row">
          <div class="col-md-8 offset-md-2 my-auto text-center">
            {!! the_post_thumbnail('col-8-thumbnail', array('class' => 'img-fluid image-cover')) !!}
          </div>
        </div>
      </header>
      @include('partials.content-page')
    @endwhile
  </div>
@endsection
