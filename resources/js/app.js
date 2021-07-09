require('./bootstrap');

// require('alpinejs');

import { createApp } from 'vue';

import VueFinalModal from 'vue-final-modal'

import PropertyMediaCarousel from './components/PropertyMediaCarousel.vue';
import AddProperty from './components/AddProperty.vue';
import LoginModal from './components/LoginModal.vue';
import SignUpModal from './components/SignUpModal.vue';
import NavbarDropdown from './components/NavbarDropdown.vue';


window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')


const app = createApp({
                components: {
                    PropertyMediaCarousel,
                    AddProperty,
                    LoginModal,
                    SignUpModal,
                    NavbarDropdown
                },

                data() {
                    return {
                        isUserAuthenticated: isUserAuthenticatedVar,
                        authenticatedUser: authenticatedUserVar,

                        showWelcomeText: false,
                    }
                },

                methods: {

                    showLoginModal(event) {
                        event.showWelcomeText ? this.showWelcomeText = true : ''
                        this.$vfm.show('LoginModal')
                    },

                    showSignUpModal() {
                        this.$vfm.show('SignUpModal')
                    },

                    onUserHasBeenAuthentiacted(user) {
                        this.isUserAuthenticated = true
                        this.authenticatedUser = user
                    },
                }

            })

app.use(VueFinalModal())

app.mount('#app');