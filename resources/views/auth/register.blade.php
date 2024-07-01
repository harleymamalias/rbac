@extends('mainLayout')

@section('page-title','Account Registration')

@section('auth-content')
{{--
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
<section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center min-h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3"
            style="background-image: url('https://c0.wallpaperflare.com/preview/632/274/444/minimal-office-workspace-setup.jpg')">
        </div>

        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                    Register New User
                </h1>

                <p class="mt-4 text-gray-500 dark:text-gray-400">
                    Let’s get you all set up so you can verify your personal account and begin setting up your profile.
                </p>

                <form method="POST" action="{{ route('register') }}" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
                    @csrf

                    <div class="flex flex-col">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">First Name</label>
                        <input type="text" name="firstname" value="{{ old('firstname') }}" required
                            class="block w-full px-5 py-3 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                        @error('firstname')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Last Name</label>
                        <input type="text" name="lastname" value="{{ old('lastname') }}" required
                            class="block w-full px-5 py-3 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                        @error('lastname')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Username</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="block w-full px-5 py-3 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                        @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email</label>
                        <input type="email" name="email"
                            class="block w-full px-5 py-3 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                        <div class="flex items-center mt-2">
                            <input type="checkbox" name="generate_email" id="generate_email" class="form-check-input">
                            <label for="generate_email" class="ml-2 text-sm text-gray-600 dark:text-gray-200">Generate
                                Email Address</label>
                        </div>
                        @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Password</label>
                        <input type="password" name="password" required
                            class="block w-full px-5 py-3 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                        @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Confirm Password</label>
                        <input type="password" name="password_confirmation" required
                            class="block w-full px-5 py-3 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 mt-2 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-[#f9533b] rounded-lg hover:bg-[#f9533b] focus:outline-none focus:ring focus:ring-bg-[#f9533b] focus:ring-opacity-50">
                        Register
                    </button>

                    <button type="reset"
                        class="w-full px-6 py-3 mt-2 text-sm text-black transform bg-white border border-white rounded-lg dark:border-white dark:text-black hover:bg-blue-500 hover:text-white focus:outline-none focus:ring focus:ring-white focus:ring-opacity-50">
                        Clear
                    </button>
                </form>

                <div class="text-center mt-6">
                    <a href="{{ route('home') }}" class="text-blue-500 dark:text-blue-400 hover:underline">Return to
                        Landing Page</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection