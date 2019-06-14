@extends('layouts.app')

@section('content')
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
        echo 'Excuses, de pagina die je probeert te bezoeken bestaat niet.';
      } elseif ($lang == 'en') {
        echo 'Sorry, but the page you were trying to view does not exist.';
      } ?>
    </div>
    {!! get_search_form(false) !!}
  @endif
@endsection
