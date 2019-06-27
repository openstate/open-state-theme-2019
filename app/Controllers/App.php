<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        $lang = 'nl';
        if (get_bloginfo("language") == 'en-US') {
            $lang = 'en';
        }

        if (is_home()) {
            return;
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            if ($lang == 'nl') {
              return sprintf('Zoekresultaten voor "%s"', get_search_query());
            } elseif ($lang == 'en') {
              return sprintf('Search results for "%s"', get_search_query());
            }
        }
        if (is_404()) {
            if ($lang == 'nl') {
              return 'Pagina niet gevonden';
            } elseif ($lang == 'en') {
              return 'Page not found';
            }
        }
        return get_the_title();
    }
}
