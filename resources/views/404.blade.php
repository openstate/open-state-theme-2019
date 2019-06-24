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
          echo 'Excuses, de pagina die je probeert te bezoeken bestaat niet. <a href="/">Bezoek de homepage</a> of gebruik het zoekformulier hieronder.';
        } elseif ($lang == 'en') {
          echo 'Sorry, but the page you were trying to view does not exist. <a href="/"> Visit the home page</a> or use the search form below.';
        } ?>
      </div>
    @endif
  </div>
@endsection
