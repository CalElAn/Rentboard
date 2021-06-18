require('./bootstrap');

import { createApp } from 'vue';

import PropertyMediaCarousel from './components/PropertyMediaCarousel.vue';
import AddProperty from './components/AddProperty.vue';


createApp({
    components: {
        PropertyMediaCarousel,
        AddProperty
    }
}).mount('#app');