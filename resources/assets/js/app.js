
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

import NProgress from 'vue-nprogress';

Vue.component('vue-editor', function (resolve) {
    require(['./components/Editor.vue'], resolve)
});
Vue.component('vue-message', function (resolve) {
    require(['./components/Message.vue'], resolve)
});


//Vue.use(NProgress);
//const nprogress = new NProgress({ parent: '.nprogress-container' })

const app = new Vue({
    //nprogress,
    el: '#app'
});