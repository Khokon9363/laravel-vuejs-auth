require('./bootstrap')

import Router from './routes.js';

Vue.component('App', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    router : Router
});