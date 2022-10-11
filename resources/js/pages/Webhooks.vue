<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>


        <h1>Webhooks</h1>
        <p>
            Selldone calls this endpoints to inform you about updates or fetch required information about connected
            accounts.
        </p>

        We send three parameters in the header of all webhook calls:
        <ul>
            <li><code>Selldone-Sign-Id</code>: <b>Sign ID</b> is a unique id for each request. This value is the UTC timestamp. You can check it to make sure it's not a duplicated old request.</li>
            <li><code>Selldone-Sign-Hash</code>:  <b>Hash value</b> is a hashed value of <code>{Sign key}<b>:</b>{Selldone-Sign-Id}</code> with Bcrypt algorithm.</li>
            <li><code>Authorization</code>: <b> Authorization</b> is the access token was received from your service in the user authentication step. </li>
        </ul>

        <p class="mt-2">
            Headers <code>Selldone-Sign-Id</code> and <code>Selldone-Sign-Hash</code> are used to verify request is sent by Selldone. The Header <code>Authorization</code> is used to understand this request is for which account on your service.
        </p>

        <h4 class="mt-5"> <v-icon class="me-1">{{ProviderWebhooks.notify_shop.icon}}</v-icon> {{ProviderWebhooks.notify_shop.title}}</h4>
        <v-subheader>{{ ProviderWebhooks.notify_shop.description }}</v-subheader>
        <link-box-copy :value="SD_CONFIG.notify_shop" message="Past it on your SD provider > Webhook tab." class="my-3" ></link-box-copy>


        <h4 class="mt-5"> <v-icon class="me-1">{{ProviderWebhooks.sync_category.icon}}</v-icon> {{ProviderWebhooks.sync_category.title}}</h4>
        <v-subheader>{{ ProviderWebhooks.sync_category.description }}</v-subheader>
        <link-box-copy :value="SD_CONFIG.sync_category" message="Past it on your SD provider > Webhook tab." class="my-3" ></link-box-copy>



        <h4 class="mt-5"> <v-icon class="me-1">{{ProviderWebhooks.sync_product.icon}}</v-icon> {{ProviderWebhooks.sync_product.title}}</h4>
        <v-subheader>{{ ProviderWebhooks.sync_product.description }}</v-subheader>
        <link-box-copy :value="SD_CONFIG.sync_product" message="Past it on your SD provider > Webhook tab." class="my-3" ></link-box-copy>



        <h4 class="mt-5"> <v-icon class="me-1">{{ProviderWebhooks.create_order.icon}}</v-icon> {{ProviderWebhooks.create_order.title}}</h4>
        <v-subheader>{{ ProviderWebhooks.create_order.description }}</v-subheader>
        <link-box-copy :value="SD_CONFIG.create_order" message="Past it on your SD provider > Webhook tab." class="my-3" ></link-box-copy>


        <h4 class="mt-5"> <v-icon class="me-1">{{ProviderWebhooks.confirm_order.icon}}</v-icon> {{ProviderWebhooks.confirm_order.title}}</h4>
        <v-subheader>{{ ProviderWebhooks.confirm_order.description }}</v-subheader>
        <link-box-copy :value="SD_CONFIG.confirm_order" message="Past it on your SD provider > Webhook tab." class="my-3" ></link-box-copy>

        <h4 class="mt-5"> <v-icon class="me-1">{{ProviderWebhooks.get_order.icon}}</v-icon> {{ProviderWebhooks.get_order.title}}</h4>
        <v-subheader>{{ ProviderWebhooks.get_order.description }}</v-subheader>
        <link-box-copy :value="SD_CONFIG.get_order" message="Past it on your SD provider > Webhook tab." class="my-3" ></link-box-copy>

        <h4 class="mt-5"> <v-icon class="me-1">{{ProviderWebhooks.cancel_order.icon}}</v-icon> {{ProviderWebhooks.cancel_order.title}}</h4>
        <v-subheader>{{ ProviderWebhooks.cancel_order.description }}</v-subheader>
        <link-box-copy :value="SD_CONFIG.cancel_order" message="Past it on your SD provider > Webhook tab." class="my-3" ></link-box-copy>




    </div>
</template>

<script>

import LinkBoxCopy from "../components/LinkBoxCopy";
import ProviderWebhooks from "../enums/ProviderWebhooks";
export default {
    name: "Webhooks",
    components: {LinkBoxCopy},
    data: () => ({
        ProviderWebhooks:ProviderWebhooks,

        SD_CONFIG:  window.SD_CONFIG?window.SD_CONFIG:{},

    }),

    computed: {},

    created() {

    },


    mounted() {

    },

    methods: {},
};
</script>
<style>

</style>
