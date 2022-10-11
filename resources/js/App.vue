<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <v-app>

        <v-main>
            <v-toolbar flat>

                <v-toolbar-items>
                    <v-btn text exact :to="{name:'Home'}" active-class="primary">
                        <v-icon class="me-1">home</v-icon>
                        Home
                    </v-btn>
                    <v-btn text exact :to="{name:'Auth'}" active-class="primary">
                        <v-icon class="me-1">token</v-icon>
                        Auth
                    </v-btn>
                    <v-btn text exact :to="{name:'Webhooks'}" active-class="primary">
                        <v-icon class="me-1">webhook</v-icon>
                        Webhooks
                    </v-btn>

                    <v-btn text exact :to="{name:'APIs'}" active-class="primary">
                        <v-icon class="me-1">api</v-icon>
                        APIs
                    </v-btn>

                    <v-btn text exact :to="{name:'Help'}" active-class="primary" >
                        <v-icon class="me-1">help</v-icon>
                        How to start?
                    </v-btn>
                </v-toolbar-items>
                <v-spacer></v-spacer>
                <v-toolbar-title class="d-flex align-center">
                    <img src="./../assets/images/logo.png" width="42" height="42" class="me-1">
                    <div class="flex-grow-1 " style="line-height: 1em;">
                       <div>
                           <b>Selldone | </b> Connect <span class="os">OS</span><br>
                       </div>
                        <small style="font-size: 12px">{{mode.title}}</small>
                    </div>
                </v-toolbar-title>
            </v-toolbar>


            <v-container>
                <router-view>

                </router-view>
            </v-container>
        </v-main>

        <v-footer  class="mt-16" color="#fff">
            <v-row no-gutters class="small" >
                <v-col cols="12" sm="6">
                    <v-btn small color="primary" target="_blank" text href="https://selldone.com"><v-icon left>drag_indicator</v-icon> Selldone</v-btn>
                </v-col>

                <v-col cols="12" sm="6">
                    Author, <v-btn small color="primary"  target="_blank" text  href="https://selldone.com/selldoners/2/@pajuhaan">M. Pajuhaan</v-btn >
                </v-col>
            </v-row>
        </v-footer>


    </v-app>
</template>

<script>

export default {
    name: "App",
    components: {},
    data: () => ({}),

    computed: {
        mode(){
            return this.$store.getters.getMode
        }
    },

    created() {

    },


    mounted() {

    },

    methods: {},
};
</script>
<style lang="scss">
.os {
    background-image: linear-gradient(to top, #c79081 0%, #dfa579 100%);
    background-size: cover;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
