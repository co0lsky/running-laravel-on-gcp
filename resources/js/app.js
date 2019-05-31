
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { MM } from 'vue-media-manager';
require('vue-media-manager/dist/style.css');
require('font-awesome/css/font-awesome.css');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

const mm = new MM({
    el: '#media-manager',
    api: {
        baseUrl: 'http://localhost:8000/api/mm',
        listUrl: 'list',
        downloadUrl: 'download',  // optional
        uploadUrl: 'upload',      // optional
        deleteUrl: 'delete'       // optional
    }
});
