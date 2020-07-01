// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import singleArrangementer from './routes/singleArrangementer';
import templateArrangementer from './routes/templateArrangementer';
/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // About Us page, note the change from about-us to aboutUs.
  singleArrangementer,
  templateArrangementer,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
