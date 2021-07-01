<div class="pt-8 px-20 flex justify-between absolute top-0 w-full">
    <img src="/images/logo.png" alt="{{env('APP_NAME')}} logo">
    <div class="text-white flex w-1/3">
        <div class="flex justify-center w-1/2">
            <a class="py-1 pl-14" href="/add-property">
                Add a property
            </a>
        </div>
        <navbar-dropdown 
            v-if="isUserAuthenticated" 
            :authenticated-user="authenticatedUser"
        ></navbar-dropdown>
        <div v-else class="flex justify-evenly w-1/2">
            <a @@click="showLoginModal" class="px-4 py-1 border border-main-colour rounded-full" href="#">
                Log In 
            </a>
            <a @@click="showSignUpModal" class="px-4 py-1 bg-main-colour rounded-full" href="#">
                Sign Up
            </a>
        </div>
    </div>
</div>
