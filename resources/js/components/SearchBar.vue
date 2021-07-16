<template>
    <transition name="fade">
    <div 
        v-show="!isScrollYPastSearchBar"
        :class="[isSearchBarFocused ? 'grid-cols-9' : 'grid-cols-8', isSearchBarInNavbar ? 'my-5' : '']"
        class="bg-white grid items-center rounded-full shadow-3xl w-1/2"
        id="search-bar"
        ref="searchBar"
        >
        <!-- Types Popover -->
        <Popover v-slot="{ open }" class="search-bar-item col-span-2 relative">
            <PopoverButton 
                @click="isSearchBarFocused=true" 
                :class="open ? 'bg-white shadow-3xl' : 'hover:bg-gray-300'"
                class="w-full inline-flex items-center px-3 py-5 rounded-full group ">
                <span class="w-3/4">Types</span>
                <ChevronDownIcon :class="open ? '' : 'text-opacity-70'"
                    class="w-1/4 h-5 ml-2" aria-hidden="true" />
            </PopoverButton>
            <transition enter-active-class="transition duration-200 ease-out" enter-from-class="translate-y-1 opacity-0"
                enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-150 ease-in"
                leave-from-class="translate-y-0 opacity-100" leave-to-class="translate-y-1 opacity-0">
                <PopoverPanel
                    @click="isSearchBarFocused=true"
                    class="absolute z-10 w-max px-4 mt-5 transform -translate-x-1/2 left-full">
                    <div class="overflow-hidden rounded-3xl shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="relative grid gap-4 bg-white p-7 grid-cols-2">
                            <div class="col-span-1 flex items-center">
                                <input
                                    v-model="selectAllPropertyTypes"
                                    type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                                <span class="ml-2 font-semibold">-- Select {{selectAllPropertyTypes ? 'none' : 'all'}} --</span>
                            </div>
                            <div class="col-span-1"></div>
                            <div v-for="(item, index) in propertyTypes" :key="index" class="col-span-1 flex items-center">
                                <input type="checkbox"
                                    v-model="form.types"
                                    :value="item['type']"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                                <span class="ml-2">{{ item['type'] }}</span>
                            </div>
                        </div>
                    </div>
                </PopoverPanel>
            </transition>
        </Popover>
        <!-- Location Input box -->
        <div 
            :class="[isInputFocused ? '' : 'group hover:bg-gray-300']"
            class="col-span-3 rounded-full place-self-stretch  inline-flex items-center focus-within:shadow-3xl">
            <div style="height:32px; width:1px; background: #ddd; display:inline;"></div>
            <input
                @focus="isInputFocused=true, isSearchBarFocused=true"
                @blur="isInputFocused=false"
                class="tracking-tighter text-center border-0 py-5 pl-3 pr-0 w-full text-gray-700 rounded-full focus:ring-0 focus:outline-none group-hover:bg-gray-300"
                type="text"
                placeholder="Where would you like to live?">
            <LocationMarkerIcon class="h-5 pl-1 pr-3"/>
            <div style="height:32px; width:1px; background: #ddd; display:inline;"></div>
        </div>
        <!-- Price Range Popover -->
        <Popover v-slot="{ open }" class="col-span-2 relative">
            <PopoverButton 
                @click="isSearchBarFocused=true" 
                :class="open ? 'bg-white shadow-3xl' : 'hover:bg-gray-300'"
                class="w-full inline-flex items-center px-3 py-5 rounded-full group">
                <span class="w-3/4">Price range</span>
                <ChevronDownIcon :class="open ? '' : 'text-opacity-70'"
                    class="w-1/4 h-5 ml-2" aria-hidden="true" />
            </PopoverButton>
            <transition enter-active-class="transition duration-200 ease-out" enter-from-class="translate-y-1 opacity-0"
                enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-150 ease-in"
                leave-from-class="translate-y-0 opacity-100" leave-to-class="translate-y-1 opacity-0">
                <PopoverPanel
                    class="absolute z-10 w-max px-4 mt-5 transform -translate-x-1/2 left-1/2">
                    <div class="overflow-hidden rounded-3xl shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="bg-white pb-7 pt-14 px-12 w-80 relative">
                            <Slider 
                                :min="0"
                                :max="500"
                                :format="sliderFormat"
                                v-model="form.priceRange" 
                            />
                        </div>
                    </div>
                </PopoverPanel>
            </transition>
        </Popover>
        <!-- Search Button -->
        <div 
            :class="[isSearchBarFocused ? 'col-span-2' : 'col-span-1']"
            class="p-2 pr-3 place-self-stretch">
            <button class="rounded-full focus:outline-none w-full h-full bg-main-colour hover:bg-main-colour-darker flex items-center justify-evenly">
                <search-icon 
                    :class="[isSearchBarFocused ? 'ml-4 mr-2' : '']"
                    class="text-white w-6"/>
                <span
                    :class="[isSearchBarFocused ? '' : 'hidden']" 
                    class="font-semibold mr-6 text-lg text-white tracking-wide">Search</span>
            </button>
        </div>
    </div>
    </transition>
</template>

<script>
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'

import Slider from '@vueform/slider'

import { ChevronDownIcon } from '@heroicons/vue/solid'
import { LocationMarkerIcon } from '@heroicons/vue/solid'

export default {
    components: {
        Popover, 
        PopoverButton, 
        PopoverPanel, 
        ChevronDownIcon,
        LocationMarkerIcon,
        Slider,
    },

    props: ['propertyTypes', 'isSearchBarInNavbar'],

    emits: ['onScrollYPastSearchBar', 'onScrollYNotPastSearchBar'],

    data () {
        return {
            csrfToken: csrfToken,
            isSearchBarFocused: false,
            isInputFocused: false,
            isScrollYPastSearchBar: false,

            sliderFormat: {
                prefix: 'GH&#8373;',
                decimals: 0,
            },

            form: {
                types: [],
                priceRange: [0, 500]
            },
        }
    },
    
    computed: {
        selectAllPropertyTypes: {
            get: function () {
                return this.form.types ? this.propertyTypes.length == this.form.types.length : false;
            },
            set: function (value) {
                    var selectedTypes = [];

                    if (!value) { 
                        this.form.types = []
                        return
                    }

                    this.propertyTypes.forEach( (item) => { selectedTypes.push(item.type) });

                    this.form.types = selectedTypes   
            }
        }
    },

    methods: {
        onSearchBarNotFocused(event) {

            if (!this.$refs.searchBar.contains(event.target)) {
                //the click was outside the specifiedElement, do something
                this.isSearchBarFocused = false;
                // console.log('clicked mf')
            }
        },
    },

    mounted() {
        document.addEventListener('click', this.onSearchBarNotFocused);

        if(!this.isSearchBarInNavbar) {
            var searchBarOffsetTop = this.$refs.searchBar.offsetTop;
            var searchBarOffsetHeight = this.$refs.searchBar.offsetHeight;
            var navBarHeight = document.getElementById('nav-bar').offsetHeight;
            var thisVar = this;
    
            window.addEventListener(
                'scroll', 
                _.throttle( function() {
                    if (window.scrollY >= searchBarOffsetTop + navBarHeight - (window.scrollY) ) {
                        thisVar.isScrollYPastSearchBar = true
                        thisVar.$emit('onScrollYPastSearchBar')
                    } else {
                        thisVar.isScrollYPastSearchBar = false
                        thisVar.$emit('onScrollYNotPastSearchBar')
                    }
                }, 300)
            );
        }    
    }
}
</script>

<style src="@vueform/slider/themes/default.css"></style>

