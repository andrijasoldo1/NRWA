import { createApp } from "vue";
import App from "./App.vue";
import "./assets/main.css"; 
import { createVuetify } from "vuetify"; 
import * as components from "vuetify/components"; 
import * as directives from "vuetify/directives"; 
import router from "../router"; 
import store from "../store.js"; 
import axios from "axios"; 
import GoogleLogin from 'vue3-google-login'; 

axios.defaults.baseURL = "http://127.0.0.1:8000/";
axios.defaults.withCredentials = true;

if (store.state.token) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${store.state.token}`;
}

const vuetify = createVuetify({
  components,
  directives,
});

const app = createApp(App);

app.use(vuetify);
app.use(router);
app.use(store);

const clientId = '305598747570-cf736399ppre5p58m3olubidbchucfrq.apps.googleusercontent.com';

app.use(GoogleLogin, {
  clientId: clientId,
  scope: 'email profile',
  prompt: 'consent'
});

app.mount("#app");
