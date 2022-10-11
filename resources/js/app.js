/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import router from "./router/Router";
import store from "./store/Store";
import App from "./App.vue";


import Vue from 'vue'
import vuetify from './plugins/vuetify' // path to vuetify export


import VueJsonPretty from 'vue-json-pretty'

Vue.component("vue-json-pretty", VueJsonPretty)
import 'vue-json-pretty/lib/styles.css';


//――――――――――――――――――――――――― Axios ―――――――――――――――――――――――――

window.axios = require("axios");

// 🞧 Header: CORS
window.axios.defaults.headers.common["Access-Control-Allow-Headers"] = "Origin, X-Requested-With, Content-Type, Accept";


let access_token = window.SD_CONFIG.secret_key;

if (access_token) {
    // User previously login
    // 🞧 Header: Authorization
    window.axios.defaults.headers.common["Authorization"] = "Basic " + access_token;
}


Vue.mixin({
    methods: {
        //―――――――――――――――――――――― Copy Clipboard (Bug fixed in dialog) ――――――――――――――――――――

        copyToClipboard(str, title = null) {
            //console.log('copyToClipboard',str)
            const el = document.createElement("textarea");
            el.addEventListener("focusin", (e) => e.stopPropagation());
            el.value = str;
            document.body.appendChild(el);
            el.select();
            document.execCommand("copy");
            document.body.removeChild(el);
        },
    }
})


new Vue({
    router,
    store,

    vuetify,
    render: (h) => h(App),

}).$mount('#app')


