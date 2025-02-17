import './bootstrap';


import {createApp} from 'vue/dist/vue.esm-bundler';
import axios from 'axios'
import VueAxios from 'vue-axios'
import { VMaskDirective } from 'v-slim-mask'

import Chess from "./components/chess/Chess.vue"


if (document.getElementById("global_app")) {
    const global_app = createApp({
        components:{
            Chess
        },
        setup() {}
    })

    global_app.use(VueAxios, axios)
    global_app.directive('mask', VMaskDirective)
    global_app.mount("#global_app");
}
