<template>
<div class="ml-auto mr-auto my-5 w-1/2">
    <ul id="progress-bar" class="font-semibold">
        <li :class="[step == 1 ? 'active' : '']" class="progress-step inline list-none text-center">
            Details
        </li>
        <li :class="[step == 2 ? 'active' : '']" class="progress-step inline list-none text-center">
            Features
        </li>
        <li :class="[step == 3 ? 'active' : '']" class="progress-step inline list-none text-center">
            Media
        </li>
    </ul>
</div>
<div class="flex justify-center items-center h-3/4">
    <div class="rounded-2xl bg-white p-6" :class="[animation, step == 3 ? 'w-1/2' : '']">
        <!-- Details -->
        <section v-show="step == 1">
            <div class="text-xl mb-3">Property Details</div>
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="city" class="block font-medium text-gray-700 text-sm">City <span
                            class="text-red-600">*</span></label>
                    <input v-model="form.city" type="text" id="city"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="text-red-600 text-sm" v-if="v$.form.city.$error">{{ v$.form.city.$errors[0].$message }}
                    </span>
                </div>
                <div class="col-span-1">
                    <label for="town" class="block font-medium text-gray-700 text-sm">Town <span
                            class="text-red-600">*</span></label>
                    <input v-model="form.town" type="text" id="town"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="text-red-600 text-sm" v-if="v$.form.town.$error">{{ v$.form.town.$errors[0].$message }}
                    </span>
                </div>
                <div class="col-span-2">
                    <label for="address" class="block font-medium text-gray-700 text-sm">Street address <span
                            class="text-red-600">*</span></label>
                    <input v-model="form.address" type="text" id="address"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="text-red-600 text-sm" v-if="v$.form.address.$error">{{ v$.form.address.$errors[0].$message }}
                    </span>
                </div>
                <div class="col-span-2">
                    <label for="gps_location" class="block font-medium text-gray-700 text-sm">GPS location</label>
                    <div class="flex rounded-md">
                        <input v-model="form.gpsLocation" readonly type="text" id="gps_location"
                            class="block bg-gray-100 w-full mt-1 rounded-l-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        <button
                            @click="getLocation"
                            class="bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 border mt-1 border-gray-300 border-l-0 inline-flex justify-center items-center px-3 rounded-r-md shadow-sm text-gray-500 text-sm font-medium">
                            Click to add location
                        </button>
                        <span class="text-red-600 text-sm" v-if="gpsLocationError">{{ gpsLocationError }}
                        </span>
                    </div>
                </div>
                <div class="col-span-1 col-start-1">
                    <label for="contact-number" class="block font-medium text-gray-700 text-sm">Contact number <span
                            class="text-red-600">*</span></label>
                    <input v-model="form.contactPhoneNumber" type="tel" id="contact-number"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="text-red-600 text-sm"
                        v-if="v$.form.contactPhoneNumber.$error">{{ v$.form.contactPhoneNumber.$errors[0].$message }}
                    </span>
                </div>
                <div class="col-span-1">
                    <label for="email" class="block font-medium text-gray-700 text-sm">Contact Email <span
                            class="text-red-600">*</span></label>
                    <input v-model="form.contactEmail" type="email" id="email"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    <span class="text-red-600 text-sm" v-if="v$.form.contactEmail.$error">{{ v$.form.contactEmail.$errors[0].$message }}
                    </span>
                </div>
                <div class="col-span-2 flex justify-end">
                    <button @click="nextStep"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Next
                    </button>
                </div>
            </div>
        </section>
        <!-- Features -->
        <section v-show="step == 2">
            <div class="text-xl mb-3">Property Features</div>
            <div class="grid gap-6" :class="[property[form.type]?.[0] ? 'grid-cols-2' : 'grid-cols-1']">
                <div class="col-span-1">
                    <label for="type" class="block font-medium text-gray-700 text-sm">Type <span
                            class="text-red-600">*</span></label>
                    <select 
                        v-model="form.type" 
                        @change="typeOnChange"
                        id="type"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">-- Select property type --</option>
                        <option v-for="(item, index) in property" :key="index" 
                            :value="index">
                            {{ index }}
                        </option>
                    </select>
                    <span class="text-red-600 text-sm" v-if="v$.form.type.$error">{{ v$.form.type.$errors[0].$message }}
                    </span>
                </div>
                <div v-if="property[form.type]?.[0]" class="col-span-1"></div>
                <template v-for="(item, index) in property[form.type]" :key="index">
                    <div v-if="item['input_type'] == 'number'" class="col-span-1">
                        <label for="address" class="block font-medium text-gray-700 text-sm">{{ item['feature'] }}</label>
                        <input type="number"
                            v-model="form.inputFeatures[item['feature']]"
                            class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>
                </template>
                <template v-for="(item, index) in property[form.type]" :key="index">
                    <div v-if="item['input_type'] == 'checkbox'" class="col-span-1 flex items-center">
                        <input type="checkbox"
                            v-model="form.checkedFeatures"
                            :value="item['feature']"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" />
                        <span class="ml-2">{{ item['feature'] }}</span>
                    </div>
                </template>
                <template v-for="(item, index) in property[form.type]" :key="index">
                    <div v-if="item['input_type'] == 'radio'" class="col-span-1 flex items-center">
                        <input  type="radio"
                            v-model="form.pickedFeatures"
                            :value="item['feature']"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"> 
                       <span class="ml-2">{{ item['feature'] }}</span>
                    </div>
                </template>
                <div class="col-span-2 col-start-1">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                    Other Features
                    </label>
                    <div class="mt-1">
                    <textarea id="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" 
                        @input="autoGrowTextarea"
                        v-model="form.description"
                        placeholder="Add any other features we might have missed"></textarea>
                    </div>
                </div>
                <div class="col-span-1 col-start-1">
                    <div>
                        <label for="price"
                            class="block font-medium text-gray-700 text-sm">{{ 'Rent (GH&#8373; / month)' }}
                            <span class="text-red-600">*</span></label>
                        <input type="number" step="any" id="address"
                            v-model="form.rent"
                            class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        <span class="text-red-600 text-sm" v-if="v$.form.rent.$error">{{ v$.form.rent.$errors[0].$message }}
                        </span>
                    </div>
                    <div class="col-span-1 col-start-1 inline-flex items-center mt-2">
                        <input type="checkbox"
                            v-model="form.negotiable"
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
        <!-- Upload Media -->
        <section v-show="step == 3">
            <div>
                <div class="text-xl mb-3">Upload Media</div>
                <div>
                    <label class="block font-medium text-gray-700">
                        Upload photos or videos
                    </label>
                    <file-pond
                        name="filepond"
                        ref="filepond"
                        label-idle="Drop files here or <span class='filepond--label-action'>Browse</span>"
                        allow-multiple="true"
                        allow-reorder="true"
                        :accepted-file-types="['image/*', 'video/*']"
                        :server = "{
                            url: '/filepond',
                            process: '/process',
                            revert: '/revert',
                            restore: '/restore',
                            load: '/load',
                            fetch: '/fetch',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        }"
                        @processfile="onFilePondProcessFile"
                    />
                    <ul class=" list-disc list-inside text-red-600 text-sm" v-if="mediaError">
                        <li>{{ mediaError }}</li>
                    </ul>
                </div>
                <div class="input-errors ml-3 my-3 text-red-600 text-sm">
                    <ul class="mt-3 list-disc list-inside">
                        <li v-for="error of v$.form.$errors" :key="error.$uid">{{ error.$message +' on "'+ error.$property +'"'  }}</li>
                    </ul>
                </div>
                <div class="mt-7 col-span-2 flex justify-between">
                    <button @click="previousStep"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Previous
                    </button>
                    <button
                        @click="submitForm"
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

// Import Vue FilePond
import vueFilePond from 'vue-filepond'

// Import FilePond styles
import 'filepond/dist/filepond.min.css'

// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'

// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview
)


//Vuelidate
import useVuelidate from '@vuelidate/core';
import { required, email, numeric } from '@vuelidate/validators';


export default {
    setup() {
        return {
            v$: useVuelidate()
        };
    },

    data() {
        return {
            step: 3,
            animation: '',

            csrfToken: csrfToken,

            gpsLocationError: '',
            mediaError: '',

            triggerSubmitAfterLogin: false,

            form: {
                city: '',
                town: '',
                address: '',
                gpsLocation: '',
                contactPhoneNumber: '',
                contactEmail: '',
                type: '',
                checkedFeatures: [],
                pickedFeatures: '',
                inputFeatures: {},
                description: '',
                rent: '',
                negotiable: false, //lalter check when submitted if I need to change true/false value to 0 or 1
                media: [],
            }
        };
    },

    components: {
      FilePond
    },

    validations() {
        return {
            form: {
                city: {
                    required,
                    $autoDirty: true
                },
                town: {
                    required,
                    $autoDirty: true
                },
                address: {
                    required,
                    $autoDirty: true
                },
                contactPhoneNumber: {
                    required,
                    $autoDirty: true
                },
                contactEmail: {
                    required,
                    email,
                    $autoDirty: true
                },
                type: {
                    required,
                    $autoDirty: true
                },
                rent: {
                    required,
                    $autoDirty: true,
                    numeric
                },
            }
        };
    },

    props: ['property', 'isUserAuthenticated', 'authenticatedUser'],

    watch: {
        isUserAuthenticated(newValue, oldValue) {
            if (newValue == true && this.triggerSubmitAfterLogin == true) {
                console.log('triggerSubmit')
                this.submitForm()
            }
        }
    },

    emits: ['showLoginModal'],

    methods: {
        nextStep() {
            this.animation = 'card-fade-out';

            setTimeout(() => {
                this.animation = 'card-slide-in-from-right';
                this.step++;
            }, 300);
        },

        previousStep() {
            this.animation = 'card-fade-out';

            setTimeout(() => {
                this.animation = 'card-slide-in-from-left';
                this.step--;
            }, 300);
        },

        getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(this.showPosition);
            } else {
                gpsLocationError = 'Geolocation is not supported by this browser.';
            }
        },

        showPosition(position) {
            this.form.gpsLocation = position.coords.latitude + ',' + position.coords.longitude;
        },

        typeOnChange() {
            this.form.checkedFeatures.length = 0;
            this.form.pickedFeatures = '';
            this.form.inputFeatures = {};
        }, 

        autoGrowTextarea(element) {
            element.target.style.height = "";
            element.target.style.height = (element.target.scrollHeight) + "px";
        },

        submitForm() {
            this.v$.$touch()

            this.form.media.length = 0;
            this.$refs.filepond.getFiles().forEach((value, key) => this.form.media.push(value.serverId))
            
            // if(this.form.media.length == 0)
            // {
            //     this.mediaError = 'At least one image or video is required';
            //     return
            // }

            // if (this.v$.$error) return

            if (!this.isUserAuthenticated) {
                this.triggerSubmitAfterLogin = true
                this.$emit('showLoginModal', {showWelcomeText: true})
                return
            }

            axios.post('/add-property', this.form)
                .then( (response) => {
                    if( response.status == 200 ) {  
                        window.location.replace('/'); //*should redirect to show property page
                    }
                })
                .catch( (error) => {
                    console.log(error)
                })  
        },

        keepTokenAlive() {
            axios.post('/keep-csrf-token-alive')
                .catch(function (error) {
                    console.log(error);
                    if (error.response.status == 419) 
                    {
                        location.reload();
                    }    
                })
        },

        onFilePondProcessFile() {
            this.mediaError = '';
        }
    },

    mounted() {
        setInterval(this.keepTokenAlive, 1000 * 60 * 60); // every 60 mins 
    },
}
</script>

<style>
.filepond--item {
    /* percentage over number of columns in grid divided by 2 */
    width: calc(50%/2 - 0.5em); 
}
</style>

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
		content: '';
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
		~ .progress-step {
			color: white;
		}

		~ .progress-step:before,
		~ .progress-step:after {
			background: white;
		}
	}
}

.card-slide-in-from-right {
	animation: slide-in-from-right-animation 0.4s ease-out;
}

@keyframes slide-in-from-right-animation {
	0% {
		transform: translateX(25%);
	}
	100% {
		transform: translateX(0%);
	}
}

.card-slide-in-from-left {
	animation: slide-in-from-left-animation 0.4s ease-out;
}

@keyframes slide-in-from-left-animation {
	0% {
		transform: translateX(-25%);
	}
	100% {
		transform: translateX(0%);
	}
}

.card-fade-out {
	animation: fade-out-animation 0.4s ease-in-out;
}

@keyframes fade-out-animation {
	0% {
		opacity: 1;
	}
	100% {
		opacity: 0;
	}
}
</style>
