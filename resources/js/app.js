require('./bootstrap');

import { createApp } from 'vue';

import PropertyMediaCarousel from './components/PropertyMediaCarousel.vue';


createApp({
    components: {
        PropertyMediaCarousel
    }
}).mount('#app');