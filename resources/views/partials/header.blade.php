<header class="banner">
  <div class="container">
    <div class="row">
      <nav class="nav-top fixed-top navbar bg-white justify-content-start">
        <div class="col-sm-4 d-none d-sm-block nav-buttons">
          @if (has_nav_menu('top_navigation'))
            {!! wp_nav_menu(
              [
                'theme_location' => 'top_navigation',
                'menu_class' => 'nav navbar-nav',
                'link_after' => '<i class="fas fa-arrow-right"></i>',
                'walker' => new App\wp_bootstrap4_navwalker()
              ]
            ) !!}
          @endif
        </div>

        <div class="col-9 col-sm-6 col-lg-4 text-lg-center pr-0 pl-md-0">
          <a class="navbar-brand mr-0" href="{{ home_url('/') }}">
            @if (!is_front_page())
              @if (get_bloginfo("language") == 'en-US')
                <img class="navbar-brand-img img-fluid" src="@asset('images/Open-state-foundation-logo-tagline-en.svg')" alt="Open State Foundation - open data, transparent society">
              @else
                <img class="navbar-brand-img img-fluid" src="@asset('images/Open-state-foundation-logo-tagline-nl.svg')" alt="Open State Foundation - open data, transparante samenleving">
              @endif
            @else
              <img class="navbar-brand-img img-fluid" src="@asset('images/Open-state-foundation-logo.svg')" alt="Open State Foundation">
            @endif
          </a>
        </div>

        <div class="col-3 col-sm-2 col-lg-1 offset-lg-3 text-right">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-text">MENU</span>
          </button>
        </div>

        <?
          global $qtranslate_slug;
          $lang = 'nl';
          $lang_text = 'NL/<b>EN</b>';
          $lang_search_text = 'Search';
          $lang_contact = 'Contact us';
          if (get_bloginfo("language") == 'nl-NL') {
            $lang = 'en';
            $lang_text = '<b>NL</b>/EN';
            $lang_search_text = 'Zoeken';
            $lang_contact = 'Neem contact op';
          }
        ?>

        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(
            [
              'theme_location' => 'primary_navigation',
              'menu_class' => 'nav navbar-nav',
              'link_after' => '<i class="fas fa-arrow-right"></i>',
              'items_wrap' => '
                <div class="outer-menu row">
                  <div class="col-10 col-sm-10 offset-sm-1 inner-menu">
                    <ul id="%1$s" class="%2$s">%3$s</ul>
                  </div>
                  <div class="col-2 col-sm-1 menu-icons rm-gutter-left">
                    <div class="row">
                      <div class="col-12 rm-gutter">
                        <div class="language mx-auto">
                          <a href="' . $qtranslate_slug->get_current_url($lang) . '">' . $lang_text . '</a>
                        </div>
                      </div>
                      <div class="col-12 search-menu-col rm-gutter">
                        <hr class="search-menu-hr mx-auto">
                        <div class="custom-search text-center">
                          <form method="GET" action="/" role="search">
                            <input type="search" class="form-control" id="search-menu-icon" name="s">
                          </form>
                        </div>
                      </div>
                      <div class="col-12 search-menu-text text-center rm-gutter">
                        ' . $lang_search_text . '
                        <hr class="search-menu-hr mx-auto">
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="/contact/" title="' . $lang_contact . ' "><i class="far fa-envelope"></i></a>
                        <a class="d-none d-md-block" href="/contact/" title="' . $lang_contact . ' "><i class="far fa-2x fa-envelope"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://join.slack.com/t/hackdeoverheid/shared_invite/zt-1uf4fks3o-1zId60CY_5sSyYza0NSwAQ" title="Hack de Overheid community Slack" target="_blank" rel="noopener"><i class="fab fa-slack"></i></a>
                        <a class="d-none d-md-block" href="https://join.slack.com/t/hackdeoverheid/shared_invite/zt-1uf4fks3o-1zId60CY_5sSyYza0NSwAQ" title="Hack de Overheid community Slack" target="_blank" rel="noopener"><i class="fab fa-2x fa-slack"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://openstate.eu/feed/" title="RSS" target="_blank" rel="noopener"><i class="fas fa-rss"></i></a>
                        <a class="d-none d-md-block" href="https://openstate.eu/feed/" title="RSS" target="_blank" rel="noopener"><i class="fas fa-2x fa-rss"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://mastodon.nl/@openstate" title="Mastodon" target="_blank" rel="noopener"><i class="fab fa-mastodon"></i></a>
                        <a class="d-none d-md-block" href="https://mastodon.nl/@openstate" title="Mastodon" target="_blank" rel="noopener"><i class="fab fa-2x fa-mastodon"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://twitter.com/openstateeu" title="Twitter" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                        <a class="d-none d-md-block" href="https://twitter.com/openstateeu" title="Twitter" target="_blank" rel="noopener"><i class="fab fa-2x fa-twitter"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://www.linkedin.com/company/open-state-foundation/" title="LinkedIn" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a>
                        <a class="d-none d-md-block" href="https://www.linkedin.com/company/open-state-foundation/" title="LinkedIn" target="_blank" rel="noopener"><i class="fab fa-2x fa-linkedin"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://www.meetup.com/Hackdeoverheid-Meetups/" title="Hack de Overheid Meetup" target="_blank" rel="noopener"><i class="fab fa-meetup"></i></a>
                        <a class="d-none d-md-block" href="https://www.meetup.com/Hackdeoverheid-Meetups/" title="Hack de Overheid Meetup" target="_blank" rel="noopener"><i class="fab fa-2x fa-meetup"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://www.flickr.com/photos/openstate/albums" title="Flickr" target="_blank" rel="noopener"><i class="fab fa-flickr"></i></a>
                        <a class="d-none d-md-block" href="https://www.flickr.com/photos/openstate/albums" title="Flickr" target="_blank" rel="noopener"><i class="fab fa-2x fa-flickr"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a class="d-md-none" href="https://github.com/openstate" title="GitHub" target="_blank" rel="noopener"><i class="fab fa-github"></i></a>
                        <a class="d-none d-md-block" href="https://github.com/openstate" title="GitHub" target="_blank" rel="noopener"><i class="fab fa-2x fa-github"></i></a>
                      </div>
                      <div class="col-12 text-center menu-icon">
                        <a href="https://data.openstate.eu/" title="data.openstate.eu" target="_blank" rel="noopener" class="ckan">' . App\template('partials.ckan-svg') . '</a>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>',
              'container' => 'div',
              'container_id' => 'navbarSupportedContent',
              'container_class' => 'collapse navbar-collapse',
              'walker' => new App\wp_bootstrap4_navwalker()
            ]
          ) !!}
        @endif
        <div class="breadcrumbs-parent col-12 col-sm-10">
          {!! App\breadcrumbs(); !!}
        </div>
        <div class="col-sm-2 d-none d-sm-block">
          <div class="language-parent">
            <div class="language ml-auto">
              <a href={!! $qtranslate_slug->get_current_url($lang) !!}>
                <?
                  _e("
                    <!--:nl-->
                      <b>NL</b>/EN
                    <!--:--><!--:en-->
                      NL/<b>EN</b>
                    <!--:-->
                  ")
                ?>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>
