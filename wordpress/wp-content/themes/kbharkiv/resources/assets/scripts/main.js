// import external dependencies
import 'custom-event-polyfill';
import 'jquery';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import singlePost from './routes/single-post';
import blog from './routes/blog';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Blog post
  singlePost,
  // Blog index
  blog,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
