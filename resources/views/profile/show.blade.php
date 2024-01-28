@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Profile</h1>
@endsection

@section('content')

<div class="bg-white">
  @if(session('success'))
  <div class="bg-white">
      <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
          
    <div class="rounded-md bg-green-50 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-green-400" x-description="Heroicon name: solid/check-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
  </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-green-800">
          {{ session('success') }}
          </p>
        </div>
        
      </div>
    </div>
  
        </div>
      </div>
    </div>
  @endif

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
       <div class="max-w-3xl mx-auto">
        
        <form class="space-y-6" action="{{  route('profile.update') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('put')

      <div class="space-y-8">
      <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
        <!-- Profile Photo File Input -->
        <input type="file" class="hidden"
        name="photo"
                    wire:model="photo"
                    x-ref="photo"
                    x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                    " />

        <label for="photo" value="{{ __('Photo') }}" ></label>

        <!-- Current Profile Photo -->
        @if (Auth::user()->photo)
        <div class="mt-2 block rounded-full w-20 h-20 bg-cover bg-no-repeat" x-show="! photoPreview">
            <img src="{{ asset(Auth::user()->photo)}}" alt=" Photo" class="block rounded-full w-20 h-20 bg-cover bg-no-repeat">
        </div>
        @endif

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview">
            <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat"
                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
            </span>
        </div>

        <button class="inline-flex justify-center py-1 px-3 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
            {{ __('Select A New Photo') }}
        </button>
        <input-error for="photo" class="mt-2" />
    </div>


      <div class="pt-3">
        <div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Personal Information
          </h3>
          
        </div>

        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium text-gray-700">
             Name
            </label>
            <div class="mt-1">
              <input placeholder="Name" type="text" name="name" id="name" autocomplete="given-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ Auth::user()->name }}">
            </div>
            @error('name')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="sm:col-span-3">
            <label for="email" class="block text-sm font-medium text-gray-700">
               Email
            </label>
            <div class="mt-1">
              <input placeholder="Email" id="email" name="email" type="email" autocomplete="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md disabled:bg-gray-200 disabled:text-gray-400 disabled:cursor-not-allowed" value="{{ auth()->user()->email }}" disabled>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="address1" class="block text-sm font-medium text-gray-700">
             Address Line One
            </label>
            <div class="mt-1">
              <input placeholder="Address Line One" type="text" name="address1" id="address1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ Auth::user()->address->address1 }}">
            </div>
            @error('address1')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
            
          </div>
         

          <div class="sm:col-span-3">
            <label for="address2" class="block text-sm font-medium text-gray-700">
             Address Line Two
            </label>
            <div class="mt-1">
              <input placeholder="Address Line Two" type="text" name="address2" id="address2"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"value="{{ Auth::user()->address->address2 }}">
            </div>
            @error('address2')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
           
          </div>
          
          <div class="sm:col-span-2">
            <label for="distric" class="block text-sm font-medium text-gray-700">
              Distric
            </label>
            <div class="mt-1">
              <select id="distric" name="distric" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                <option>Polonnaruwa</option>
                <option>Mathara</option>
                <option>Kandy</option>
              </select>
            </div>
            @error('distric')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="sm:col-span-2">
            <label for="province" class="block text-sm font-medium text-gray-700">
              State / Province
            </label>
            <div class="mt-1">
              <select id="province" name="province" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                <option value="north_province">North Province</option>
                <option value="central_province">Cental Province</option>
                <option value="north_central_province">North Cental Province</option>
              </select>
            </div>
            @error('province')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="sm:col-span-2">
            <label for="postal-code" class="block text-sm font-medium text-gray-700">
              ZIP / Postal code
            </label>
            <div class="mt-1">
              <input placeholder=" ZIP / Postal code" type="text" name="postal_code" id="postal_code"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ Auth::user()->address->postal_code }}">
            </div>
            @error('postal-code')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="sm:col-span-3">
            <label for="country" class="block text-sm font-medium text-gray-700">
              Country
            </label>
            <div class="mt-1">
              <select id="country" name="country" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                <option value="u_s">United States</option>
                <option value="canada">Canada</option>
                <option value="mexico">Mexico</option>
              </select>
            </div>
            @error('country')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="sm:col-span-3">
            <label for="city" class="block text-sm font-medium text-gray-700">
              City
            </label>
            <div class="mt-1">
              <input type="text" name="city" id="city"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ Auth::user()->address->city }}">
            </div>   
            @error('city')
            <span class="text-red-500">{{ $message }}</span>
            @enderror    

          </div>


        </div>
        </div>
      
    

    <div class="pt-5">
      <div class="flex justify-end">
        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Cancel
        </button>
        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Save
        </button>
      </div>
    </div>
  </form>

      </div>
    </div>
  </div>
  
@endsection

