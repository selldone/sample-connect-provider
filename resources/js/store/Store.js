import Vue from "vue";
import Vuex from "vuex";
import {ConnectMode} from "../enums/ConnectMode";


Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        mode: ConnectMode.Migration,
        return_utl:   localStorage.getItem("sd-config-return-url"),
    },

    mutations: {
        setMode(state, mode) {
            state.mode = mode;
        },

    },
    getters: {
        getMode(state) {
            return state.mode;
        },

    },

    actions: {},
});
