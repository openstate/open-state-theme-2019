{{--
  Template Name: Contact Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <header class="mb-5">
      <div class="container">
        @include('partials.page-header')
      </div>
      <div class="container-fluid bg-grijsblauw">
        <div class="row">
          <div class="container">
            <div class="row padding-top-50 padding-bottom-40">
              <div class="col-12 contact-text">
                <? _e("
                  <!--:nl-->
                    <i><b>VRAGEN?</b> STEL ZE HIER:</i>
                  <!--:--><!--:en-->
                    <i><b>QUESTIONS?</b> ASK THEM HERE:</i>
                  <!--:-->
                ") ?>
              </div>
              <div class="col-12">
                @if (get_bloginfo("language") == 'en-US')
                  {!! do_shortcode( '[contact-form-7 id="2122" title="Main Contact Form"]' ) !!}
                @else
                  {!! do_shortcode( '[contact-form-7 id="2346" title="Main Contact Form_NL"]' ) !!}
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      @include('partials.content-page')
    </div>
  @endwhile
@endsection
