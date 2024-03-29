
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Vue.config.debug = true;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('list-film', require('./components/list_film.vue'));
Vue.component('film-detail', require('./components/film_detail.vue'));
Vue.component('film-create', require('./components/film_create.vue'));
Vue.component('film-comment', require('./components/film_comment.vue'));