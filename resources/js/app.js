import './bootstrap';


import { createApp } from 'vue/dist/vue.esm-bundler';
import axios from 'axios'
import VueAxios from 'vue-axios'
import { VMaskDirective } from 'v-slim-mask'
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import Chess from "./components/chess/Chess.vue"


if (document.getElementById("global_app")) {
    const global_app = createApp({
        components: {
            Chess
        },
        setup() { }
    })

    global_app.use(VueAxios, axios)
    global_app.directive('mask', VMaskDirective)
    global_app.mount("#global_app");
}

if (document.querySelector('.flat_gallery_swiper')) {
    new Swiper('.flat_gallery_swiper', {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        spaceBetween: 12,
        loop: true,
        navigation: {
            nextEl: '.flat_gallery_swiper .swiper-button-next',
            prevEl: '.flat_gallery_swiper .swiper-button-prev',
        },
        pagination: {
            el: '.flat_gallery_swiper .swiper-pagination',
            clickable: true,
        },
    });
}
