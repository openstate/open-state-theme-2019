export default {
  finalize() {
    // JavaScript to be fired on the projects, tools & data page
    (function($) {
      var FWP = window.FWP || {};

      // Retrieves URL parameter values
      function url_parameter(key) {
        key = key.replace(/[*+?^$.[\]{}()|\\/]/g, '\\$&');
        var match = location.search.match(new RegExp('[?&]'+key+'=([^&]+)(&|$)'));
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
      }

      $(document).on('facetwp-loaded', function() {
        if ($('html').attr('lang') == 'nl') {
          $('.facetwp-search').attr('placeholder', 'zoeken');
        } else {
          $('.facetwp-search').attr('placeholder', 'search');
        }

        // Add extra height if there are no current projects, in order
        // to make the completed projects fall below the filter
        if ($('.current-project').length == 0) {
           $('.projects-row').addClass('no-projects');
        } else {
           $('.projects-row').removeClass('no-projects');
        }

        if (url_parameter('_projects') || url_parameter('_projects_search')) {
          $('#remove-filters').css('display', 'inline');
        } else {
          $('#remove-filters').css('display', 'none');
        }

        if (url_parameter('_projects')) {
          var filters = url_parameter('_projects');
          if ($('html').attr('lang') == 'nl') {
            var theme_mapping = {
              'elections': 'verkiezingen',
              'decisions': 'besluiten',
              'finances': 'financiën',
              'results': 'resultaten',
              'events': 'evenementen',
            }
            $.each(theme_mapping, function(key, value) {
              filters = filters.replace(key, value);
            });
          }

          filters = filters.replace(/,/g, ' / ');

          $('#projects-header-filters').html(filters);
        } else {
          $('#projects-header-filters').html('');
        }

        if (url_parameter('_projects_search')) {
          var search_term = 'zoekterm ';
          if ($('html').attr('lang') == 'en-US') {
            search_term = 'search term ';
          }

          var search_text = '';
          if (filters) {
            search_text = ' / ';
          }

          search_text += search_term + '\'' + url_parameter('_projects_search') + '\'';
          $('#projects-header-search-text').html(search_text);
        } else {
          $('#projects-header-search-text').html('');
        }

        if (filters || search_text) {
          $('#projects-header-semicolon').html(': ');
        } else {
          $('#projects-header-semicolon').html('');
        }

        if (FWP.settings.pager.total_rows == $('#projects-header-counter-total').html()) {
          $('#projects-header-counter-shown').html('');
        } else {
          $('#projects-header-counter-shown').html(FWP.settings.pager.total_rows + '/');
        }

        if (FWP.settings.pager.total_rows == '0') {
          $('#no-results').css('display', 'block');
        } else {
          $('#no-results').css('display', 'none');
        }
      });
    })(jQuery)
  },
};
