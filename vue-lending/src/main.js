import Vue from "vue";
import App from "./App.vue";
import store from "./store";
import "./assets/scss/main.scss";
import { i18n } from "./plugins/i18n";
import AOS from "aos";
import "aos/dist/aos.css";

var VueScrollTo = require("vue-scrollto");

// You can also pass in the default options
Vue.use(VueScrollTo, {
  container: "body",
  duration: 500,
  easing: "ease",
  offset: -200,
  force: true,
  cancelable: true,
  onStart: false,
  onDone: false,
  onCancel: false,
  x: false,
  y: true
});

Vue.config.productionTip = false;

new Vue({
  created() {
    AOS.init({});
  },
  i18n,
  store,
  render: h => h(App)
}).$mount("#app");
