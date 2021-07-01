<template>

    <swiper
        :style="{'--swiper-navigation-color': '#fff','--swiper-pagination-color': '#fff'}"
        :slides-per-view="1"
        :space-between="50"
        :autoplay="true"
        navigation
        :pagination="{ clickable: true }"
        :loop="true"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
    >
        <swiper-slide> <img src="https://picsum.photos/405/384" alt="property-img"> </swiper-slide>
        <swiper-slide><img src="https://picsum.photos/405/384" alt="property-img"></swiper-slide>
        <swiper-slide><img src="https://picsum.photos/405/384" alt="property-img"></swiper-slide>
    </swiper>

</template>

<script>

// import Swiper core and required modules
import SwiperCore, { Navigation, Pagination, Autoplay  } from 'swiper';

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/swiper-bundle.min.css';
//   import 'swiper/swiper.scss';
//   import 'swiper/components/navigation/navigation.scss';
//   import 'swiper/components/pagination/pagination.scss';
//   import 'swiper/components/scrollbar/scrollbar.scss';

// install Swiper modules
SwiperCore.use([Navigation, Pagination, Autoplay ]);

export default {

    components: {
        Swiper,
        SwiperSlide,
    },

    methods: {
        onSwiper(swiper) {
            // console.log(swiper);
        },
        onSlideChange() {
            // console.log('slide change');
        },
    },
};

</script>

<style>
    .swiper-pagination-bullet {
        background-color: #000;
    }
    .swiper-pagination-bullet-active {
        background-color: #fff;
    }
    /* .swiper-button-prev {
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%234c71ae'%2F%3E%3C%2Fsvg%3E") !important;
    }

    .swiper-button-next {
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%234c71ae'%2F%3E%3C%2Fsvg%3E") !important;
    } */
</style>
