<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div class="py-16">


        <v-select v-model="selected_api" :items="APIs" style="max-width: 420px" solo return-object item-value="url"
                  item-text="title" prepend-inner-icon="api" >

        </v-select>

        <api-box v-if="selected_api" :url="selected_api.url" :params="selected_api.params"
                 :is-get="selected_api.method==='GET'" :is-post="selected_api.method==='POST'"
                 :title="selected_api.title" :subtitle="selected_api.subtitle">

        </api-box>


    </div>
</template>

<script>

import ApiBox from "../components/ApiBox";

export default {
    name: "APIs",
    components: {
        ApiBox

    },
    data: () => ({
        busy_get_shops: false,
        response: null,
        error: null,


        selected_api: null,


        service_url: window.SD_CONFIG.service_url,

    }),

    computed: {
        APIs() {
            return [
                {
                    method: 'GET',
                    title: "Get shops list",
                    subtitle: "You can use this endpoint to get the list of connected shops.",
                    params: {offset: 0, limit: 10},
                    url: this.service_url + "/shops"
                },

                {
                    method: 'GET',

                    title: "List of products",
                    subtitle: "Get list of connected products in an specific shop.",
                    params: {offset: 0, limit: 10},
                    url: this.service_url + "/shops/{shop_id}/products"
                },

                {
                    method: 'GET',

                    title: "List of orders",
                    subtitle: "Get list of fulfillments in an specific shop.",
                    params: {offset: 0, limit: 10},
                    url: this.service_url + "/shops/{shop_id}/orders"
                },


                {
                    method: 'POST',

                    title: "Update products",
                    subtitle: "Update all product in all shops by mpn.",
                    params: {quantity: Math.floor(Math.random() * 50)},
                    url: this.service_url + "/products/{mpn}"
                },

                {
                    method: 'POST',

                    title: "Update variants",
                    subtitle: "Update all product variants in all shops by mpn.",
                    params: {quantity: Math.floor(Math.random() * 50)},
                    url: this.service_url + "/variants/{mpn}"
                },


                {
                    method: 'GET',

                    title: "Get shops by token",
                    subtitle: "Get shop info by its access_token. Access token must be unique for each shop. The access token structure is based on the Auth mode of this provider.",
                    params: {access_token:window.SD_CONFIG.user.access_token},
                    url: this.service_url + "/shops/token"
                },
            ]
        }

    },

    created() {
        this.selected_api = this.APIs[0]
    },


    mounted() {

    },

    methods: {},
};
</script>
<style>

</style>
