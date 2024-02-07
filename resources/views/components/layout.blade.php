<!doctype html>

<title>Laravel From Scratch Blog</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
@vite('resources/css/app.css')
@livewireScripts
@livewireStyles
<style>
    html{
        scroll-behavior: smooth;
    }
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body class="h-full" style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="flex items-center md:mt-0 mt-8">
                @guest()
                    <div class="flex space-x-2"><a href="/register" class="text-xs font-bold uppercase">Register</a>
                        <a href="/login" class="text-xs font-bold uppercase">Login</a></div>

                @else
                    <x-dropdown>
                        <x-slot:trigger>
                            <span class="text-xs font-bold uppercase cursor-pointer">Welcome back {{auth()->user()->name}}</span>
                        </x-slot:trigger>
                        @can('admin')
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">
                                Create post
                            </x-dropdown-item>
                        @endcan

                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>

                        <form id="logout-form" action="/logout" method="post">
                            @csrf
                        </form>
                    </x-dropdown>


                @endguest


                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>
                        @error('email')
                           <p class="text-red-500 text-xs"> {{ $message }}</p>
                        @enderror

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
@if(session()->has('success'))
    <p x-data="{show: true}"
       x-init="setTimeout(() => show= false, 4000)"
       x-show="show"
            class="bg-blue-500 bottom-5 capitalize fixed p-3 right-5 rounded-xl text-white  ">{{session('success')}}</p>
@endif
</body>
