window._ = require('lodash');
import { createApp } from 'vue';
import store from "./store";
import app from "./components/app.vue";

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


// get crf token from meta tag
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector(
    'meta[name="csrf-token"]'
).content

// get access token from cookie
// window.axios.defaults.headers.common['access_token'] = response.data.access_token;

// create vue app
const appInstance = createApp({});
appInstance.use(store);
appInstance.component('app', app);
appInstance.mount('#app');

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
