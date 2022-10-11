<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>


        <h1 class="my-5">How to start?</h1>
        <h2>
           1. Create a provider.
        </h2>
        <p>Create a provider on <a href="https://selldone.com/shuttle/providers">Selldone Providers</a>.</p>

        <v-img :src="require('./../../assets/images/create-provider.png')" max-width="640" class="mx-auto my-3"></v-img>


        <ul>
            <li>Make sure set <b>OAuth 2.0</b> as authentication mode, and copy <b>Return URL</b> to <code>provider-return-url</code> in <b>Config > selldone.php</b>.</li>
            <li>Past test values from Controller.php to  <b>Client ID</b>, and <b>Client Secret</b>. </li>
            <li>Set <code>https://yourdomain.com/auth/login</code> to <b>OAuth URL</b>. You can change it on <code>routes\web.php</code>.</li>
            <li>Set <code>https://yourdomain.com/auth/token</code> to <b>Token Generation API</b>. You can change it on <code>routes\web.php</code>.</li>
        </ul>

        <v-img :src="require('./../../assets/images/auth.png')" max-width="640" class="mx-auto my-3"></v-img>


        <h2>
            2. Create a connect bridge.
        </h2>
        <p>You need to pay 20 USD one time. After creating connect bridge and implement needed webhooks, you can request to verify. After that your service will be in front of thousands merchants around the world for free.</p>


        <v-img :src="require('./../../assets/images/created-bridge.png')" max-width="640" class="mx-auto my-3"></v-img>

        <h2>
            3. Run test project. (optional)
        </h2>
        <p>This is a free sample project to test APIs and webhooks of connect provider. You can deploy this project on a test server with an ip/domain public access.</p>

        <ul>
            <li>
                Go to <b>config > selldone.php</b> and enter return url, <b>sign key</b> and <b>secret key</b> .
                You can find these values on Selldone > Your provider > APIs tab and Webhooks Tab.
            </li>
            <v-img :src="require('./../../assets/images/api-key.png')" max-width="640" class="mx-auto my-3"></v-img>
            <small class="d-block text-center">Secret key</small>

            <v-img :src="require('./../../assets/images/sign-key.png')" max-width="640" class="mx-auto my-3"></v-img>
            <small class="d-block text-center">Webhook sign key</small>

            <li>
                Go to <b>App\Http\Controllers > Controller.php</b> and enter some sample values for client and generated access token.
            </li>
            <li>
                You will be redirected to your service login url and will return back to selldone after grant or reject access.
            </li>


            <li>
                After connecting your shop, Selldone try to use webhooks to sync products and categories. We will pass some sample categories and products in this step.
                You can edit it here: <b>App\Http\Controllers > WebhooksController.php</b>.
            </li>
        </ul>




        <h2>
            4. Implement webhooks and APIs for live.
        </h2>
        <p>Make sure regenerate api key and webhook sign keys when you go live.</p>













    </div>
</template>

<script>

import {ConnectMode} from "../enums/ConnectMode";
import ProviderAuthenticationMode from "../enums/ProviderAuthenticationMode";

export default {
    name: "Help",
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
