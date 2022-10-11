import Vue from "vue";
import Router from "vue-router";
import Webhooks from "../pages/Webhooks";
import Home from "../pages/Home";
import APIs from "../pages/APIs";
import Auth from "../pages/Auth";
import Help from "../pages/Help";




Vue.use(Router);
let router = new Router({
  mode: "history",
  base: '',
  routes: [
    //█████████████████████████████████████████████████████████████
    //――――――――――――――――――――― Shop General Layout ―――――――――――――――――――――――
    //█████████████████████████████████████████████████████████████

    {
      path: "",
        name:'Home',

        component: Home,
      children: [

      ],
    },

      {
          path: "/webhooks",
          name:'Webhooks',
          component: Webhooks,
      },


      {
          path: "/apis",
          name:'APIs',

          component: APIs,
      },

      {
          path: "/auth",
          name:'Auth',

          component: Auth,
      },

      {
          path: "/help",
          name:'Help',

          component: Help,
      },



  ],
});




export default router;
