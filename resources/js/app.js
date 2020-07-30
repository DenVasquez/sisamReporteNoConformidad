require('./bootstrap');
import Vue from 'vue';
import VueAWN from "vue-awesome-notifications"
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Vuelidate from 'vuelidate';
import {routes} from './routes';
import StoreData from './store';
import MainApp from './components/MainApp.vue';
import {initialize} from './helpers/general';
import Axios from 'axios';

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Vuelidate);
Vue.use(Axios);
Vue.use(VueAWN);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode: 'history'
});



initialize(store, router);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp
    }

});
