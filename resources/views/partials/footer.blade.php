<footer class="content-info">
  <div class="row-full bg-grijs-10">
    <div class="container">
      <div class="row footer-bar">
        <div class="col-12">
          <form role="search" method="get" action="/">
            <label for="search-input" class="footer-form text-donkerderblauw">
              <? _e("
                <!--:nl-->
                  ZOEKEN:
                <!--:--><!--:en-->
                  SEARCH:
                <!--:-->
              ") ?>
            </label>
            @if (is_search())
              <input type="search" class="form-control" id="search-input" name="s" value="{!! get_search_query() !!}">
            @else
              <input type="search" class="form-control" id="search-input" name="s">
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
  @if (!in_array('page-newsletter-data', get_body_class()))
  <div class="row-full bg-lichtblauw">
    <div class="container">
      <div class="row footer-bar">
        <div class="col-12">
          @include('partials.newsletter')
        </div>
      </div>
    </div>
  </div>
  @endif
  <div class="container">
    <div class="row footer-bar">
      <div class="col-lg-8">
        <p>
          <? _e("
            <!--:nl-->
              Ja, ik wil ook een open overheid! Wil jij kunnen zien wie er bij ministers lobbyen? Wil jij zelf de uitslagen van jouw stembureau controleren? Wil jij de uitgaven van gemeenten makkelijk met elkaar kunnen vergelijken? Wil jij publieke data achter een betaalmuur weghalen? Wij kunnen ons werk doen en overheidsinformatie ontsluiten met jouw steun. Maak ons werk mogelijk en doe vandaag nog een donatie.
            <!--:--><!--:en-->
              Yes, I want an open government! Do you want to see who is lobbying ministers? Do you want to check the results of your own polling station? Do you want to be able to compare municipal spending? Do you want to open public data stuck behind a paywall? We can do our job and unlock government information with your support. Make our work possible and make a donation today.
            <!--:-->
          ") ?>
        </p>
      </div>
      <div class="col-lg-4 text-lg-right my-auto">
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
        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 text-center">
          <img class="img-fluid" src="@asset('images/Open-state-foundation-logo.svg')" alt="Open State Foundation logo">
        </div>
      </div>
      <div class="row footer-icons d-flex justify-content-center">
        <a href="/contact/" title="<?php _e("<!--:nl-->Neem contact op<!--:--><!--:en-->Contact us<!--:-->"); ?>"><i class="far fa-3x fa-envelope"></i></a>
        <a href="https://slack.hackdeoverheid.nl/" title="Hack de Overheid community Slack" target="_blank" rel="noopener"><i class="fab fa-3x fa-slack"></i></a>
        <a href="<?php _e("<!--:nl-->https://openstate.eu/nl/feed/<!--:--><!--:en-->https://openstate.eu/en/feed/<!--:-->"); ?>" title="RSS" target="_blank" rel="noopener"><i class="fas fa-3x fa-rss"></i></a>
        <a href="https://twitter.com/openstateeu" title="Twitter" target="_blank" rel="noopener"><i class="fab fa-3x fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/open-state-foundation/" title="LinkedIn" target="_blank" rel="noopener"><i class="fab fa-3x fa-linkedin"></i></a>
        <a href="https://www.facebook.com/openstatefoundation" title="Facebook" target="_blank" rel="noopener"><i class="fab fa-3x fa-facebook-f"></i></a>
        <a href="https://www.meetup.com/Hackdeoverheid-Meetups/" title="Hack de Overheid Meetup" target="_blank" rel="noopener"><i class="fab fa-3x fa-meetup"></i></a>
        <a href="https://www.flickr.com/photos/openstate/albums" title="Flickr" target="_blank" rel="noopener"><i class="fab fa-3x fa-flickr"></i></a>
        <a href="https://github.com/openstate" title="GitHub" target="_blank" rel="noopener"><i class="fab fa-3x fa-github"></i></a>
        <a href="https://data.openstate.eu/" title="data.openstate.eu" target="_blank" rel="noopener" class="ckan">@svg('logo-ckan')</a>
      </div>
    </div>
  </div>
</footer>
