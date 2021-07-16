<template>
<div 
    class="fixed top-0 z-10 pt-6 pb-3 transition-colors ease-linear duration-75 w-screen"
    :class="[isScrollYPastMainHeader ? 'text-black bg-white shadow-lg' : 'text-white']">
    <div
        ref="navBar"
        id="nav-bar"
        class="flex justify-between w-full font-semibold px-20">
    
        <!-- Logo -->
        <img src="/images/logo.png" :alt="appName + ' logo'">
    
        <!-- Mini Search Bar -->
        <transition name="fade">
        <div
            v-show="isScrollYPastSearchBar && showMiniSearchBar"
            class="bg-white rounded-full hover:shadow-xl shadow-lg w-1/4 ml-60">
            <button 
                @click="showMiniSearchBar=false"
                class="rounded-full pr-2 pl-6 py-1 border border-gray-300 focus:outline-none w-full h-full flex items-center justify-between">
                <span
                    class="font-medium text-black">Begin your search</span>
                <search-icon
                    class="text-white p-1 rounded-full w-7 h-7 bg-main-colour hover:bg-main-colour-darker"/>
            </button>
        </div>
        </transition>
    
        <!-- Button group & dropdown -->
        <div class=" flex w-1/3 items-center justify-evenly">
            <div class="flex justify-center w-1/2">
                <a class="py-1 pl-14 hover:text-opacity-80 hover:text-white" href="/add-property">
                    Add a property
                </a>
            </div>
            <div
                v-if="isUserAuthenticated"
                class="text-right">
                <Menu as="div" class="relative inline-block text-left">
                    <div>
                        <MenuButton
                            :class="[isScrollYPastMainHeader ? 'shadow-3xl' : '']"
                            class="inline-flex items-center justify-center w-max px-4 py-2 text-white font-semibold bg-main-colour rounded-full hover:bg-main-colour-darker focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
                            <img 
                                :src="authenticatedUser.profile_picture_path ? 'https://ui-avatars.com/api/?size=25&rounded=true&bold=true&name='+authenticatedUser.name : 'https://ui-avatars.com/api/?size=50&rounded=true&name='+authenticatedUser.name"
                                alt="Avatar" 
                                class="rounded-full h-7 mr-2 -ml-2">
                                <!-- Realized no need to display name since every sites doesnt -->
                                <!-- {{authenticatedUser.name}} --> 
                            <ChevronDownIcon class="w-5 h-5 ml-2 -mr-1 text-white hover:text-indigo-100"
                                aria-hidden="true" />
                        </MenuButton>
                    </div>
    
                    <transition enter-active-class="transition duration-100 ease-out"
                        enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100"
                        leave-to-class="transform scale-95 opacity-0">
                        <MenuItems
                            class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="px-1 py-1">
                                <MenuItem v-slot="{ active }">
                                <button :class="[active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                                    'group flex rounded-md items-center w-full px-2 py-2 text-sm',]">
                                    Edit
                                </button>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <button :class="[active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                                    'group flex rounded-md items-center w-full px-2 py-2 text-sm',]">
                                    Duplicate
                                </button>
                                </MenuItem>
                            </div>
                            <div class="px-1 py-1">
                                <MenuItem v-slot="{ active }">
                                <button :class="[active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                                    'group flex rounded-md items-center w-full px-2 py-2 text-sm',]">
                                    Archive
                                </button>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <button :class="[active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                                    'group flex rounded-md items-center w-full px-2 py-2 text-sm',]">
                                    Move
                                </button>
                                </MenuItem>
                            </div>
    
                            <div class="px-1 py-1">
                                <MenuItem v-slot="{ active }">
                                <form method="POST" action="/logout">
                                    <input type="hidden" name="_token" :value="csrfToken" />
                                    <button :class="[active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                                            'group flex rounded-md items-center w-full px-2 py-2 text-sm']">
                                        Log Out
                                    </button>
                                </form>
                                </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
            </div>
            <div v-else class="flex justify-evenly w-1/2">
                <a 
                    @click="$emit('showLoginModal')" 
                    class="px-4 py-1 border border-main-colour hover:bg-main-colour-darker rounded-full" href="#">
                    Log In
                </a>
                <a 
                    @click="$emit('showSignUpModal')" 
                    class="px-4 py-1 bg-main-colour hover:bg-main-colour-darker rounded-full" href="#">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
    <transition name="fade">
    <div 
        v-show="!showMiniSearchBar && isScrollYPastSearchBar"
        class="flex justify-center text-black">
        <search-bar
            :property-types="propertyTypes"
            :is-search-bar-in-navbar="true"
        ></search-bar>
    </div>
    </transition>
</div>

</template>

<script>
import SearchBar from './SearchBar.vue';

import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/solid'

export default {
    components: {
        SearchBar,
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
        ChevronDownIcon,
    },

    props: [
        'authenticatedUser', 
        'appName', 
        'isUserAuthenticated', 
        'isScrollYPastSearchBar', 
        'isScrollYPastMainHeader',
        'propertyTypes',
    ],

    data () {
        return {
            csrfToken: csrfToken,

            isScrollYPastNavbar: false,
            showMiniSearchBar: true
        }
    },

    mounted() {
        // var navBarOffsetTop = this.$refs.navBar.offsetTop
        var thisVar = this

        window.addEventListener(
            'scroll', 
            _.throttle( function() {
                if (!thisVar.showMiniSearchBar && window.scrollY) {
                    thisVar.showMiniSearchBar = true
                } else {
                    
                }
            }, 100)
        );
    }
}
</script>
