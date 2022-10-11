<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>


        <h1>Auth | {{ProviderAuthenticationMode.OAuth.title}}</h1>
        <p>
           {{ProviderAuthenticationMode.OAuth.description}}
        </p>


        <ol>
            <li>User select your service on the Channel > Connect OS tab. and click on the <b>Connect</b> button.</li>
            <li>User will be redirected to <code>login_url</code>.</li>
            <li>User grant access for Selldone on your website and you return user to the <code>return_url</code> with the <b>authorize code</b>.</li>
            <li>We send authorize code with <code>client_id</code> and <code>client_secret</code> to the <code>token_url</code> and your server response with an <b>access token</b>.</li>
            <li>We store the <b>access token</b> and add it to all webhooks calls requests with <code>Authorization</code> key.  <code>Authorization: Bearer access-token</code></li>
        </ol>


        <div class="max-w-widget my-5">
        <h4>Return URL</h4>
            <div>It's auto generated url by Selldone.</div>

        <link-box-copy :value="SD_CONFIG.return_url" class="my-3" ></link-box-copy>

        <h4 class="mt-5">Client ID</h4>
<div>Create a new client on your service and set client ID and secret here.</div>
        <link-box-copy :value="SD_CONFIG.client_id" message="Past it on your SD provider > Auth tab." class="my-3" ></link-box-copy>

        <h4 class="mt-5">Client Secret</h4>

        <link-box-copy :value="SD_CONFIG.client_secret" message="Past it on your SD provider > Auth tab." class="my-3" ></link-box-copy>


            <h4 class="mt-5">OAuth Login URL </h4>

            <link-box-copy :value="SD_CONFIG.login_url" message="Past it on your SD provider > Auth tab." class="my-3" ></link-box-copy>


            <h4 class="mt-5">Token Generation API </h4>

            <link-box-copy :value="SD_CONFIG.token_url" message="Past it on your SD provider > Auth tab." class="my-3" ></link-box-copy>

        </div>


    </div>
</template>

<script>

import {ConnectMode} from "../enums/ConnectMode";
import ProviderAuthenticationMode from "../enums/ProviderAuthenticationMode";
import LinkBoxCopy from "../components/LinkBoxCopy";

export default {
    name: "Auth",
    components: {LinkBoxCopy},
    data: () => ({
        mode:ConnectMode.Migration,
        ConnectMode:ConnectMode,
        ProviderAuthenticationMode:ProviderAuthenticationMode,

        SD_CONFIG:  window.SD_CONFIG?window.SD_CONFIG:{},
    }),

    computed: {
        modes(){
            return Object.values(ConnectMode)
        },



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
