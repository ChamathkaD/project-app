@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Role Edit</h1>
@endsection

@section('content')

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">       
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit Role</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('put')
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900"></label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="name" value="{{ $role->name }}" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </form>

           
        </div>
@endsection