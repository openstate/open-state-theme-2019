<footer class="content-info">
  <div class="row-full bg-grijs-10">
    <div class="container">
      <div class="row footer-bar">
        <div class="col-12">
          <form role="search" method="get" action="">
            <label for="search-input" class="footer-form">
              <? _e("
                <!--:nl-->
                  ZOEKEN:
                <!--:--><!--:en-->
                  SEARCH:
                <!--:-->
              ") ?>
            </label>
            <input type="search" class="form-control" id="search-input" placeholder="waar ben je naar op zoek?" value="" name="s">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row-full bg-lichtblauw">
    <div class="container">
      <div class="row footer-bar">
        <div class="col-12">
          <form action="https://openstate.us4.list-manage.com/subscribe/post?u=03355fd4f1a7935cae63b21aa&amp;id=a9619e4f3e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <label for="mce-EMAIL" class="footer-form">
              <? _e("
                <!--:nl-->
                  <span class='font-weight-bold'>OP DE HOOGTE BLIJVEN?</span> MELD JE AAN VOOR DE MAANDELIJKSE NIEUWSBRIEF:
                <!--:--><!--:en-->
                  <span class='font-weight-bold'>STAY UP TO DATE?</span> SUBSCRIBE TO OUR MONTHLY NEWSLETTER:
                <!--:-->
              ") ?>
            </label>
            <div id="mc_embed_signup_scroll">
              <div class="row">
                <div class="col-12">
                  <div class="mc-field-group mc-first-group">
                    <input type="email" placeholder="
<? _e("
<!--:nl-->
e-mailadres
<!--:--><!--:en-->
email address
<!--:-->
") ?>
                    " value="" name="EMAIL" class="email form-control" id="mce-EMAIL">
                  </div>
                </div>
              </div>
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none; color:green"></div>
              </div>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_03355fd4f1a7935cae63b21aa_a9619e4f3e" tabindex="-1" value="">
                <input type="submit" name="subscribe" id="mc-embedded-subscribe style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1"">
              </div>
            </div>
          </form>
          <p>
            <? _e("
              <!--:nl-->
              Wat kan je verwachten?
              <!--:--><!--:en-->
              What can you expect?
              <!--:-->
            ") ?>
            <a href="https://us4.campaign-archive.com/home/?u=03355fd4f1a7935cae63b21aa&id=a9619e4f3e" target="_blank" rel="noopener">
              <? _e("
                <!--:nl-->
                Zie onze eerdere nieuwsbrieven.
                <!--:--><!--:en-->
                See our previous newsletters.
                <!--:-->
              ") ?>
            </a>
          </p>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
        <script type='text/javascript'>
          var $mcj = jQuery.noConflict(true);
          (function($) {
            window.fnames = new Array();
            window.ftypes = new Array();
            fnames[0]='EMAIL';
            ftypes[0]='email';
            fnames[1]='NAME';
            ftypes[1]='text';
            if ($("html").attr("lang") == "nl") {
              $mcj.extend($mcj.validator.messages, {
                email: "Dit is een ongeldig e-mailadres.",
              });
            }
          }(jQuery));
        </script>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row footer-bar">
      <div class="col-8">
        <p>
          Wil je samen met ons het verschil maken? Met een donatie steun je Open State Foundation in haar missie voor digitale transparantie door publieke informatie als open data beschikbaar te krijgen en deze toegankelijk te maken voor hergebruikers. Samen versterken we daarmee de democratie en creëren we maatschappelijke en economische waarde voor iedereen.
        </p>
      </div>
      <div class="col-4 text-right my-auto">
        <a class="btn btn-paars donate-button" href={!! get_page_link(6960) !!}>
          <? _e("
            <!--:nl-->
              DONEREN
            <!--:--><!--:en-->
              DONATE
            <!--:-->
          ") ?>
          &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-donate"></i><i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="row-full bg-grijs-10">
    <div class="container">
      <div class="row footer-bar">
        <div class="col-6 offset-3">
          <img src="@asset('images/Open-state-foundation-logo-tagline-nl.svg')" alt="Open State Foundation logo">
        </div>
      </div>
    </div>
  </div>
</footer>
