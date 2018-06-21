
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('caffe', require('./components/CaffeNotification.vue'));

const app = new Vue({
    el: '#app',
    data: {
        caffes: ''
    },
    created(){
        if(window.Laravel.userId){
            axios.post('/notifications/caffe/notification').then(response => {
                this.caffe = response.data;
                console.log(response.data);
            });

            Echo.private('App.User.' + window.Laravel.userId).notification((response)=>{
                data = {"data": response};
                this.caffes.push(data);
                console.log(response);
            });
        }
    }
});
