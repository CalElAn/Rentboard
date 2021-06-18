<template>
<div class="ml-auto mr-auto my-5 w-1/2">
    <ul id="progress-bar" class="font-semibold">
        <li :class="[step==1 ? 'active' : '']" class="progress-step inline list-none text-center">Property details</li>
        <li :class="[step==2 ? 'active' : '']" class="progress-step inline list-none text-center">Features</li>
        <li :class="[step==3 ? 'active' : '']" class="progress-step inline list-none text-center">Upload media</li>
    </ul>
</div>
<div class="flex justify-center items-center h-3/4">
    <div class="rounded-2xl bg-white p-6" :class="[animation]">
        <div class="text-xl mb-3">Property Details</div>
        <section v-if="step == 1">
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="city" class="block font-medium text-gray-700 text-sm">City <span
                            class="text-red-600">*</span></label>
                    <input type="text" id="city"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div class="col-span-1">
                    <label for="town" class="block font-medium text-gray-700 text-sm">Town <span
                            class="text-red-600">*</span></label>
                    <input type="text" id="town"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div class="col-span-2">
                    <label for="address" class="block font-medium text-gray-700 text-sm">Street address <span
                            class="text-red-600">*</span></label>
                    <input type="text" id="address"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div class="col-span-2">
                    <label for="gps_location" class="block font-medium text-gray-700 text-sm">GPS location</label>
                    <input readonly type="text" id="gps_location"
                        class="bg-gray-100 block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div class="col-span-1 col-start-1">
                    <label for="contact-number" class="block font-medium text-gray-700 text-sm">Contact number <span
                            class="text-red-600">*</span></label>
                    <input type="tel" id="contact-number"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div class="col-span-1">
                    <label for="email" class="block font-medium text-gray-700 text-sm">Email <span
                            class="text-red-600">*</span></label>
                    <input type="email" id="email"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>
                <div class="col-span-2 flex justify-end">
                    <button @click="nextStep"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Next
                    </button>
                </div>
            </div>
        </section>
        <section v-if="step == 2">
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="type" class="block font-medium text-gray-700 text-sm">Type <span
                            class="text-red-600">*</span></label>
                    <select type="text" id="type"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option>one</option>
                        <option>two</option>
                        <option>three</option>
                    </select>
                </div>
                <div class="col-span-1"></div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Number of bedrooms</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Number of washrooms</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Porch</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Kitchen</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Dining room</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Living room</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Furnished</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Semi-furnished</span>
                </div>
                <div class="col-span-1 flex items-center">
                    <input type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="ml-2">Walled</span>
                </div>
                <div class="col-span-1 col-start-1">
                    <label for="address" class="block font-medium text-gray-700 text-sm">Price (GH&#8373 / month) <span
                            class="text-red-600">*</span></label>
                    <input type="number" step="any" id="address"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    <div class="col-span-1 col-start-1 inline-flex items-center mt-2">
                        <input type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                        <span class="ml-2">Negotiable</span>
                    </div>
                </div>
                <div class="col-span-2 flex justify-between">
                    <button @click="previousStep"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Previous
                    </button>
                    <button @click="nextStep"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Next
                    </button>
                </div>
            </div>
        </section>
        <section v-if="step == 3">
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Upload photos </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 flex justify-between">
                    <button @click="previousStep"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Previous
                    </button>
                    <button
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </div>
        </section>
    </div>
</div>
</template>

<script>
export default {

    data() {
        return {
            step: 1,
            animation: ''
        };
    },

    methods: {

        nextStep() {

            this.animation = 'card-fade-out';

            setTimeout(() => {
                this.animation = 'card-slide-in-from-right';
                this.step++;                
            }, 500);
        },

        previousStep() {

            this.animation = 'card-fade-out';

            setTimeout(() => {
                this.animation = 'card-slide-in-from-left';
                this.step--;
            }, 500);
        },
    },
};
</script>

<style lang="scss" scoped>
#progress-bar {
	overflow: hidden;
}

.progress-step {
    /*progress-bar text*/
	width: 33.33%;
	float: left;
	position: relative;
    color: rgb(79, 70, 229);

    /*progress-bar circle*/
    &:before {
        content: "";
        width: 15px;
        height: 15px;
        display: block;
        background: rgb(79, 70, 229);
        border-radius: 50%;
        /* top | right | bottom | left */
        margin: 0 auto 0px auto;
    }

    /*progress-bar connectors(lines)*/
    &:after {
        content: '';
        width: 100%;
        height: 3px;
        background: rgb(79, 70, 229);
        position: absolute;
        left: -50%;
        top: 6px;
        z-index: -1; /*put it behind the numbers*/
    }

    &:first-child:after {
        /*line not needed before the first step*/
        content: none; 
    }

    /*to style every sibling after li active*/
    &.active {
        ~.progress-step{
            color: white;
        }

        ~.progress-step:before, ~.progress-step:after {
            background: white;
        }
    }
}

.card-slide-in-from-right{
    animation: slide-in-from-right-animation .6s ease-in-out;
}

@keyframes slide-in-from-right-animation {
    0% { transform: translateX(25%); }
    100% { transform: translateX(0%); }
}

.card-slide-in-from-left{
    animation: slide-in-from-left-animation .6s ease-in-out;
}

@keyframes slide-in-from-left-animation {
    0% { transform: translateX(-25%); }
    100% { transform: translateX(0%); }
}

.card-fade-out {
    animation: fade-out-animation .6s ease-in-out;
}

@keyframes fade-out-animation {
    0% { opacity: 1; }
    100% { opacity: 0; }
}

</style>
