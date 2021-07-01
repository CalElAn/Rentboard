@extends('layouts.main-layout')

@section('main-content')
<div class="w-full h-screen bg-no-repeat bg-cover bg-center pt-32" style="background-image: url('/images/home-background.png');">
    <div class="flex flex-col gap-9 h-1/2 justify-center">
        <div class="flex justify-center text-4xl font-bold text-white">
            Discover Your New Home
        </div>
        <div class="flex justify-center">
            <div class="bg-white flex items-center rounded-full shadow-xl w-5/12">
                <input class="border-0 rounded-l-full w-full pl-12 py-4 px-6 text-gray-700 leading-tight focus:outline-none" id="search" type="text" placeholder="Where do you want to live?">

                <div class="p-4">
                    <button class="rounded-full p-2 focus:outline-none w-12 h-12 flex items-center justify-center">
                        <svg class="text-main-colour" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex justify-center text-opacity-50 text-white text-sm">
            Houses and apartments for rent
        </div>
    </div>
</div>
<div class="bg-main-colour py-30 flex flex-col h-60 justify-center text-center text-white w-full">
    <p class="text-4xl font-bold pb-3">A home for every renter</p>
    <p class="text-xl">There is no such thing as a home that fits all. Are you looking</p>
    <p class="text-xl">for something particular in your next rental?</p>
    <p class="text-xl">Rent easy with us.</p>
</div>
<div class="h-screen bg-main-gray">
    <div class="pt-10 pb-16 flex justify-center text-4xl font-bold">
        Explore Rentals in Accra
    </div>
    <div id="app" class="flex justify-center">
        <div class="flex h-96 w-3/5 rounded-2xl bg-card-gray">
            <property-media-carousel class="h-full rounded-2xl w-1/2"></property-media-carousel>
            <div class="flex flex-col gap-2 h-full justify-center rounded-r-2xl w-1/2 px-5">
                @isset($property)
                <div class="flex justify-between">
                    {{$property->propertyType->type}} in {{$property->town}}

                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
                <hr class="w-1/6 border-2 bg-gray-400">
                <div>
                    {{$property->address}}
                </div>
                <hr class="w-1/6 border-2 bg-gray-400">
                <div>
                    <ul class="list-disc list-inside">
                        @foreach ($property->features as $key)
                            <li>{{$key->name}}</li>
                        @endforeach
                        {{-- <li>2 Bedrooms</li>
                        <li>1 Washroom</li>
                        <li>Kitchen</li>
                        <li>Dining room</li>
                        <li>Living room</li>
                        <li>Porch</li>
                        <li>Furnished</li>
                        <li>Walled</li> --}}
                    </ul>
                </div>
                <hr class="w-1/6 border-2 bg-gray-400">
                <div class="flex justify-between">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        {{$property->reviews->average('rating')}} ({{$property->reviews->count()}} reviews)
                    </div>
                    <div>
                        GH&#8373 {{$property->rent}} / month
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>
    <div class="flex justify-center py-auto">
        <a class="px-8 py-3 my-10 bg-main-green text-white rounded-full" href="#">
            View More
        </a>
    </div>
</div>
@endsection