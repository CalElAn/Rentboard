require('./bootstrap');

// require('alpinejs');

import { createApp } from 'vue';

import VueFinalModal from 'vue-final-modal'

import PropertyMediaCarousel from './components/PropertyMediaCarousel.vue';
import AddProperty from './components/AddProperty.vue';
import LoginModal from './components/LoginModal.vue';
import SignUpModal from './components/SignUpModal.vue';
import Navbar from './components/Navbar.vue';
import SearchBar from './components/SearchBar.vue';

import { SearchIcon } from '@heroicons/vue/outline'


window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const app = 
    createApp({
        components: {
            PropertyMediaCarousel,
            AddProperty,
            LoginModal,
            SignUpModal,
            Navbar,
            SearchBar,
            // SearchIcon,
        },

        data() {
            return {
                isUserAuthenticated: isUserAuthenticatedVar,
                authenticatedUser: authenticatedUserVar,

                isScrollYPastSearchBar: false,
                isScrollYPastMainHeader: false,

                showWelcomeText: false,
            }
        },

        methods: {

            showLoginModal(event) {
                event?.showWelcomeText ? this.showWelcomeText = true : ''
                this.$vfm.show('LoginModal')
            },

            showSignUpModal() {
                this.$vfm.show('SignUpModal')
            },

            onUserHasBeenAuthentiacted(user) {
                this.isUserAuthenticated = true
                this.authenticatedUser = user
            },
        },

        mounted() {
            if (this.$refs.mainHeader && document.getElementById('nav-bar'))
            {
                var mainHeaderOffsetHeight = this.$refs.mainHeader.offsetHeight;
                var mainHeaderOffsetTop = this.$refs.mainHeader.offsetTop;
                var navBarHeight = document.getElementById('nav-bar').offsetHeight;
                var thisVar = this;

                window.addEventListener(
                    'scroll',
                    _.throttle(function () {
                        if (window.scrollY >= mainHeaderOffsetTop + navBarHeight - (window.scrollY + mainHeaderOffsetHeight) ) {
                            thisVar.isScrollYPastMainHeader = true
                        } else {
                            thisVar.isScrollYPastMainHeader = false
                        }
                    }, 300)
                );
            }
        }
    });

app.component('SearchIcon', SearchIcon);

app.use(VueFinalModal());

app.mount('#app');