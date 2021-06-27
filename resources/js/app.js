require('./bootstrap');

// require('alpinejs');

import { createApp } from 'vue';

import PropertyMediaCarousel from './components/PropertyMediaCarousel.vue';
import AddProperty from './components/AddProperty.vue';

window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

createApp({
    components: {
        PropertyMediaCarousel,
        AddProperty
    }
}).mount('#app');