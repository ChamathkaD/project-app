@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Role Create</h1>
@endsection

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Change Password</h2>
        </div>

        @if(session('error'))
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
              <div class="max-w-4xl mx-auto">
                
          <div class="rounded-md bg-red-50 p-4">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" x-description="Heroicon name: solid/check-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
        </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-red-800">
                {{ session('error') }}
                </p>
              </div>
              <div class="ml-auto pl-3">
              
              </div>
            </div>
          </div>
        
              </div>
            </div>
          </div>
        @endif
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('update.password')}}" method="POST">
                @csrf
                <input type="hidden" name="token" value="">
               

                <div>
                    <div class="flex items-center justify-between">
                        <label for="current_password" class="block text-sm font-medium leading-6 text-gray-900">Current password</label>
                        
                    </div>
                    <div class="mt-2">
                        <input id="current_password" name="current_password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('current_password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="new_password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                        
                    </div>
                    <div class="mt-2">
                        <input id="new_password" name="new_password" type="password"  required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    
                  
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="new_password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm New Password</label>
                        
                    </div>
                    <div class="mt-2">
                        <input id="new_password_confirmation" name="new_password_confirmation" type="password"  required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    
                  
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Change Password</button>
                </div>
            </form>

           
        </div>
    </div>
    @endsection
