<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <div>

        <h3>{{ title }}</h3>
        <p>{{ subtitle }}</p>

        <div class="my-2">
            <code>
                <b>{{ isGet ? 'GET' : isPost ? 'POST' : '' }}</b>
                <span class="mx-2">{{ full_url }}</span>
            </code>
        </div>
        <v-text-field v-if="has_shop_id" dense v-model="shop_id" solo style="max-width: 420px"
                      prepend-inner-icon="storefront">
            <template v-slot:append>Shop ID</template>
        </v-text-field>
        <v-text-field v-if="has_mpn" dense v-model="mpn" solo style="max-width: 420px"
                      prepend-inner-icon="data_object">
            <template v-slot:append>Shop ID</template>
        </v-text-field>


        <v-btn @click="run()" :loading="busy" color="primary">
            <v-icon class="me-1">play_arrow</v-icon>
            Call Endpoint
        </v-btn>


        <div v-if="response || error" class="my-5">

            <div v-if="headers">
                <div class="my-2"><v-icon class="me-1">arrow_drop_down</v-icon> <b>Headers</b></div>
                <vue-json-pretty :data="headers" class="my-5"/>
            </div>


            <div v-if="params">
                <div class="my-2"><v-icon class="me-1">arrow_drop_down</v-icon><b>Request</b></div>
                <vue-json-pretty :data="params" class="my-5"/>
            </div>


            <div class="my-2"><v-icon class="me-1">arrow_drop_down</v-icon><b>Response</b></div>
            <vue-json-pretty :data="response" class="my-5" collapsedOnClickBrackets showIcon />
            <div v-if="error" class="my-5">
                <v-icon color="red" class="me-1">error</v-icon>
                <span v-html="error"></span>
            </div>
        </div>


    </div>
</template>

<script>

export default {
    name: "ApiBox",
    components: {},

    props: {
        title: {},
        subtitle: {},
        url: {
            required: true
        },
        isGet: {
            type: Boolean, default: false
        },
        isPost: {
            type: Boolean, default: false
        },


        params: {},


    },
    data: () => ({
        busy: false,
        response: null,
        error: null,
        headers: null,

        shop_id: 1,
        mpn:"1001",

    }),

    watch:{
        url(){
            // Reset:
            this.response = null;
            this.error = null;

        }
    },

    computed: {
        has_shop_id() {
            return this.url.includes('{shop_id}')
        },

        full_url() {
            let out = this.url;
            if (this.has_shop_id) out = out.replace('{shop_id}', this.shop_id)
            if (this.has_mpn) out = out.replace('{mpn}', this.mpn)
            return out
        },

        has_mpn() {
            return this.url.includes('{mpn}')
        },


    },

    created() {

    },


    mounted() {

    },

    methods: {
        run() {
            this.busy = true;
            this.response = null;
            this.error = null;


            let promise = null;

            if (this.isGet) {
                promise = axios.get(this.full_url, {params: this.params})
            } else if (this.isPost) {
                promise = axios.post(this.full_url, this.params)
            } else {
                this.error = 'Invalid method!';
            }


            promise.then(({data,config}) => {
                this.headers = config.headers;
                this.response = data;

            })
                .catch((e) => {
                    this.error = e + '<br>' + (e.response && e.response.data ? ('<pre>' + JSON.stringify(e.response.data, null, 2) + '</pre>') : '');
                    //console.error(e.response.data);
                }).finally(() => {
                this.busy = false;
            });


        }
    },
};
</script>
<style>

</style>
