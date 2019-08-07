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
                <img class="navbar-brand-img img-fluid" src="@asset('images/Open-state-foundation-logo-tagline-en.svg')">
              @else
                <img class="navbar-brand-img img-fluid" src="@asset('images/Open-state-foundation-logo-tagline-nl.svg')">
              @endif
            @else
              <img class="navbar-brand-img img-fluid" src="@asset('images/Open-state-foundation-logo.svg')">
            @endif
          </a>
        </div>

        <div class="col-3 col-sm-2 col-lg-1 offset-lg-3 text-right">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-text">MENU</a>
          </button>
        </div>

        <?
          global $qtranslate_slug;
          $lang = 'nl';
          $lang_text = 'NL/<b>EN</b>';
          $lang_search_text = 'Search';
          if (get_bloginfo("language") == 'nl') {
            $lang = 'en';
            $lang_text = '<b>NL</b>/EN';
            $lang_search_text = 'Zoeken';
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
                  <div class="col-2 col-sm-1 menu-icons rm-gutter">
                    <div class="row">
                      <div class="col-12">
                        <div class="language mx-auto">
                          <a href="' . $qtranslate_slug->get_current_url($lang) . '">' . $lang_text . '</a>
                        </div>
                      </div>
                      <div class="col-12 search-menu-col">
                        <hr class="search-menu-hr">
                        <div class="custom-search text-center">
                          <span>
                            <form method="GET" action="/" role="search">
                              <input type="search" class="form-control" id="search-menu-icon" name="s">
                            </form>
                          </span>
                        </div>
                      </div>
                      <div class="col-12 search-menu-text text-center">
                        ' . $lang_search_text . '
                        <hr class="search-menu-hr">
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
