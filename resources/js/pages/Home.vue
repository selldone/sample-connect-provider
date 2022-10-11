<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>


        <h1>Connect Provider Panel</h1>
        <p>
            It's a sample project to implement connect provider bridge.
        </p>
        <ul>
            <li>
                <b>Connect OS</b> is a service on Selldone business os that helps businesses to sync products, orders
                and customers between their shops and 3rd party services.
            </li>
            <li>
                <b>Providers</b> are 3rd party services like drop-shipping suppliers, fulfilment centers and
                marketplaces.
            </li>
            <li>
                <b>Bridge</b> is a code that handle apis and webhooks between provider and Selldone connect OS.
            </li>


        </ul>


        <div class="max-w-widget my-5">
            <h4>Service Mode</h4>
            <div>This project support migration.</div>
            <v-select label="Mode" v-model="mode" :items="modes"  item-value="code" item-text="title" @input="v=>$store.commit('setMode', v)" return-object disabled></v-select>
           <v-subheader>
               {{mode.desc}}
           </v-subheader>

            <h4 class="mt-5">Authorization</h4>
            <div>This project support OAuth2.0.</div>
            <div class="mt-5 mb-3">
                <v-icon color="primary" class="me-2">circle</v-icon> <b>{{ProviderAuthenticationMode.OAuth.title}}</b>
            </div>
            <v-subheader>
                {{ProviderAuthenticationMode.OAuth.description}}
            </v-subheader>

            <h4 class="mt-5">Webhook Sign Key</h4>
            <div>We use this to verify source of received webhook calls from Selldone.</div>

            <v-text-field disabled :value="SD_CONFIG.webhook_sign_key"></v-text-field>


            <h4 class="mt-5">API Secret Key</h4>
            <div>We use this to authenticate our api calls to Selldone.</div>

            <v-text-field disabled :value="SD_CONFIG.secret_key"></v-text-field>


        </div>





    </div>
</template>

<script>

import {ConnectMode} from "../enums/ConnectMode";
import ProviderAuthenticationMode from "../enums/ProviderAuthenticationMode";

export default {
    name: "Home",
    components: {},
    data: () => ({
        ConnectMode:ConnectMode,
        ProviderAuthenticationMode:ProviderAuthenticationMode,

        mode:ConnectMode.Migration,

        SD_CONFIG:  window.SD_CONFIG?window.SD_CONFIG:{},

    }),

    computed: {
        modes(){
            return Object.values(ConnectMode)
        }
    },

    created() {
        this.mode=this.$store.getters.getMode
    },


    mounted() {

    },

    methods: {},
};
</script>
<style lang="scss">
.max-w-widget{
    max-width: 620px;
    margin: auto;
}
</style>
