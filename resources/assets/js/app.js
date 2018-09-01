
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

// Vue.component('onlinesmart', require('./components/NotifyComponent.vue'));

// const app = new Vue({
//     el: '#app',
//     data:{
//         orders:'',
//     },
//     created(){
//         // alert(444);
//         var id = $('meta[name="user"]').attr('content');
//             // alert(name);
//         if(id){
//             // alert('frr');
//             axios.get('/onlinesmart/public/notification').then(response => {
//                this.orders = response.data;
//                console.log(response);
//             });
//
//             Echo.private('App.Models.User.' + id).notification((response)=>{
//                data = {'data':response};
//                this.orders.push(data);
//                console.log(response);
//             });
//         }
//     }
// });
