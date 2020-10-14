window.Vue = require('vue');

Vue.component('ad', require('./components/AdComponent.vue').default);

const app = new Vue({
    el: '#app'
});