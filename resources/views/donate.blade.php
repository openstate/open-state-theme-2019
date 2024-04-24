{{--
  Template Name: Donate Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <header class="mb-5">
      <div class="container">
        @include('partials.page-header')
      </div>
      <div class="container">
        @include('partials.content-page')
      </div>
    </header>
    <div id="donatieformulier" class="container-fluid bg-grijsblauw">
      <div class="row">
        <div class="container">
          <div class="row padding-top-50 padding-bottom-40">
            <div class="col-12 contact-text">
              <? _e("
                <!--:nl-->
                  <i><b>DONATIEFORMULIER:</b></i>
                <!--:--><!--:en-->
                  <i><b>DONATE FORM</b></i>
                <!--:-->
              ") ?>
            </div>
            <div class="col-12">
              <form action="/en/donate/" class="donate-form" method="post">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <select id="dmm_interval" name="dmm_recurring_interval" class="custom-select donate-form-field" onchange="dmm_recurring_methods(this.value);">
                      <option value="one">
                        <? _e("
                          <!--:nl-->
                            Eenmalige donatie
                          <!--:--><!--:en-->
                            One time donation
                          <!--:-->
                        ") ?>
                      </option>
                      <option value="month">
                        <? _e("
                          <!--:nl-->
                            Maandelijkse donatie
                          <!--:--><!--:en-->
                            Monthly donation
                          <!--:-->
                        ") ?>
                      </option>
                    </select>
                    <label id="dmm_permission" style="display: none">
                      <input type="checkbox" name="dmm_permission">
                        <? _e("
                          <!--:nl-->
                            Hierbij machtig ik Open State Foundation om het bovenstaande bedrag periodiek van mijn rekeningnummer af te schrijven.
                          <!--:--><!--:en-->
                            I hereby authorize Open State Foundation to periodically debit the above amount from my account number.
                          <!--:-->
                        ") ?>
                    </label>
                  </div>
                  <div class="col-12 col-md-6">
                    <select id="dmm_dd" class="custom-select donate-form-field" onchange="if(this.value!='--'){document.getElementById('dmm_amount2').value=this.value;document.getElementById('dmm_amount2').style.display = 'none';}else{document.getElementById('dmm_amount2').style.display = 'block';}">
                      <option value="--">
                        <? _e("
                          <!--:nl-->
                            Eigen bedrag invoeren (in €)
                          <!--:--><!--:en-->
                            Enter own amount (in €)
                          <!--:-->
                        ") ?>
                      </option>
                      <option value="5">€ 5</option>
                      <option value="10" selected="">€ 10</option>
                      <option value="25">€ 25</option>
                      <option value="50">€ 50</option>
                      <option value="100">€ 100</option>
                    </select>
                    <input type="hidden" name="dmm_currency" id="dmm_currency" value="EUR">
                    <input type="text" id="dmm_amount2" name="dmm_amount" class="donate-form-field" value="10" style="display: none;">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-6">
                    <select name="dmm_method" class="custom-select donate-form-field">
                      <option value="">
                        <? _e("
                          <!--:nl-->
                            Kies een betaalmethode
                          <!--:--><!--:en-->
                            Choose a payment method
                          <!--:-->
                        ") ?>
                      </option>
                      <option class="dmm_dd dmm_nomc" value="ideal" style="display: block;">iDEAL</option>
                      <option class="dmm_cc dmm_mc" value="creditcard">
                        <? _e("
                          <!--:nl-->
                            Creditcard
                          <!--:--><!--:en-->
                            Credit card
                          <!--:-->
                        ") ?>
                      </option>
                      <option class="dmm_recurring dmm_nomc" value="banktransfer" style="display: block;">
                        <? _e("
                          <!--:nl-->
                            Overboeking
                          <!--:--><!--:en-->
                            Bank transfer
                          <!--:-->
                        ") ?>
                      </option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-6">
                    <input type="text" name="dmm_name" class="donate-form-field" placeholder="<?php _e("<!--:nl-->naam<!--:--><!--:en-->name<!--:-->"); ?>" value="" required>
                  </div>
                  <div class="col-12 col-md-6">
                    <input type="email" name="dmm_email" class="donate-form-field" placeholder="<?php _e("<!--:nl-->e-mailadres<!--:--><!--:en-->email address<!--:-->"); ?>" value="" required>
                  </div>
                </div>
                <textarea name="dmm_message" class="donate-form-field donate-form-field-textarea" placeholder="<?php _e("<!--:nl-->bericht (optioneel)<!--:--><!--:en-->message (optional)<!--:-->"); ?>"></textarea>
                <div class="text-right">
                  <button name="dmm_submitted" class="btn btn-primary donate-form-field donate-form-button">
                    <? _e("
                      <!--:nl-->
                        Doneren
                      <!--:--><!--:en-->
                        Donate
                      <!--:-->
                    ") ?>
                    <span class="text-right"><i class="fas fa-arrow-right"></i></span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-none">
      {!! do_shortcode( '[doneren_met_mollie]' ) !!}
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <br>
          <div>
            <h5 id="bedrijfsdonateurs">
              <? _e("
                <!--:nl-->
                  Bedrijfsdonateurs
                <!--:--><!--:en-->
                  Corporate donors
                <!--:-->
              ") ?>
            </h5>
          </div>
          <br>
          <p>
            <b style="font-size: 30px;">
              <? _e("
                <!--:nl-->
                  We staan open voor bedrijfsdonateurs!
                <!--:--><!--:en-->
                  We are open for corporate donors!
                <!--:-->
              ") ?>
            </b>
          </p>
          <p>
            <? _e("
              <!--:nl-->
              <!--:--><!--:en-->
              <!--:-->
            ") ?>
            <? _e("
              <!--:nl-->
                Wil je met jouw bedrijf doneren aan Open State Foundation? Bekijk dan onze <a href='https://openstate.eu/wp-content/uploads/sites/14/2022/09/Open-State-Foundation-Bedrijfsdonateurs-propositie.pdf' target='blank'><b>propositie</b></a>!
              <!--:--><!--:en-->
                Would you like your company to donate to Open State Foundation? Then take a look at our <a href='https://openstate.eu/wp-content/uploads/sites/14/2022/09/Open-State-Foundation-Bedrijfsdonateurs-propositie.pdf' target='_blank'><b>proposition</b></a>!
              <!--:-->
            ") ?>
          </p>
          <div>
            <b>
              <? _e("
                <!--:nl-->
                  Open World-donateurs
                <!--:--><!--:en-->
                  Open World-donors
                <!--:-->
              ") ?>
            </b>
            <p>
              <? _e("
                <!--:nl-->
                  €5.000 of meer per jaar (niet meer dan 10% van onze continuïteitsreserve).
                <!--:--><!--:en-->
                  €5,000 or more per year (not more than 10% of our continuity reserve).
                <!--:-->
              ") ?>
            </p>
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-6">
                  <p>
                    <a href="https://www.centric.eu/" target="_blank" rel="noopener">
                      <img class="img-fluid" src="@asset('images/logo-centric.svg')" alt="Logo van Centric">
                    </a>
                  </p>
                  <p><b>Centric</b></p>
                  <? _e("
                    <!--:nl-->
                      <p>Centric is een ervaren en betrokken IT-partner voor gemeentelijke instellingen. Met onze applicaties en services ondersteunen we de decentrale overheid al meer dan 25 jaar in ieder beleidsveld.</p>
                    <!--:--><!--:en-->
                      <p>Centric is an experienced and committed IT partner for municipal institutions. With our applications and services, we have been supporting decentralized government in every policy area for more than 25 years.</p>
                    <!--:-->
                  ") ?>
                  <p>
                    <a href="https://www.centric.eu/" target="_blank" rel="noopener">centric.eu</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div>
            <b>
              <? _e("
                <!--:nl-->
                  Open State-donateurs
                <!--:--><!--:en-->
                  Open State-donors
                <!--:-->
              ") ?>
            </b>
            <p>
              <? _e("
                <!--:nl-->
                  €1.000 - €5.000 per jaar.
                <!--:--><!--:en-->
                  €1,000 - €5,000 per year.
                <!--:-->
              ") ?>
            </p>
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-4">
                  <i>
                    <? _e("
                      <!--:nl-->
                        Wordt jouw bedrijf de eerste Open State-donateur? Dan tonen we hier jouw logo, bedrijfsnaam, beschrijving en link naar je website.
                      <!--:--><!--:en-->
                        Will your company be the first Open State-donor? Then we will show your logo, company name, description and link to your website.
                      <!--:-->
                    ") ?>
                  </i>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div>
            <b>
              <? _e("
                <!--:nl-->
                  Open Street-donateurs
                <!--:--><!--:en-->
                  Open Street-donors
                <!--:-->
              ") ?>
            </b>
            <p>
              <? _e("
                <!--:nl-->
                  €500 - €1.000 per jaar.
                <!--:--><!--:en-->
                  €500 - €1,000 per year.
                <!--:-->
              ") ?>
            </p>
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-4">
                  <i>
                    <? _e("
                      <!--:nl-->
                        Wordt jouw bedrijf de eerste Open Street-donateur? Dan tonen we hier jouw bedrijfsnaam en een link naar je website.
                      <!--:--><!--:en-->
                        Will your company be the first Open Street-donor? Then we will show your company name and a link to your website.
                      <!--:-->
                    ") ?>
                  </i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      window.onload=function() {
          var dmm_dd = document.getElementById('dmm_dd');
          if (dmm_dd !== null) {
              if (dmm_dd.value !== '--') {
                  document.getElementById('dmm_amount2').value=document.getElementById('dmm_dd').value;
                  document.getElementById('dmm_amount2').style.display = 'none';
              }
          }
          if (document.getElementById('dmm_interval').value !== 'one'){
              document.getElementById('dmm_permission').style.display = 'block';
              document.getElementById("dmm_permission").children[0].required = true;
          }
          dmm_recurring_methods(document.getElementById('dmm_interval').value);
          dmm_multicurrency_methods(document.getElementById('dmm_currency').value);
      }
    </script>
    <script>
      function dmm_recurring_methods(value) {
          var x = document.getElementsByClassName("dmm_recurring");
          var i;
          for (i = 0; i < x.length; i++) {
              x[i].style.display = (value!="one" ? "none" : "block");
              x[i].disabled = (value!="one" ? "disabled" : "");
          }
          
          document.getElementById("dmm_permission").style.display = (value=="one" ? "none" : "block");
          document.getElementById("dmm_permission").children[0].required = (value=="one" ? false : true);
      }
    </script>
    <script>
      function dmm_multicurrency_methods(value) {
          var x = document.getElementsByClassName("dmm_nomc");
          var i;
          for (i = 0; i < x.length; i++) {
              x[i].style.display = (value!="EUR" ? "none" : "block");
              x[i].disabled = (value!="EUR" ? "disabled" : "");
          }
      }
    </script>
  @endwhile
@endsection
