// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

// import then needed Font Awesome functionality
import { config, library, dom } from '@fortawesome/fontawesome-svg-core';
// import required icons
import { faDonate, faTools, faArrowRight } from '@fortawesome/free-solid-svg-icons';

// allow usage in pseudo elements
config.searchPseudoElements=true;

// add the imported icons to the library
library.add(faDonate, faTools, faArrowRight);

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
