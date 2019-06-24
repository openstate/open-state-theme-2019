@extends('layouts.app')

@section('content')
  <div class="container">
    @include('partials.page-header')

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
      {!! get_search_form(false) !!}
    @endif

    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile

    {!! get_the_posts_navigation() !!}
  </div>
@endsection
