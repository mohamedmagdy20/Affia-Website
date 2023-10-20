@extends('layouts.website.app')
@section('css')
<style>
    
    #register-page{
      font-family: 'Almarai', sans-serif;
        background-image:url('storage/images/slider/1.jpg') ;
        /* background-size: 100vw; */
        background-repeat: no-repeat;
        object-fit: cover;
    }
</style>
@endsection
@section('content')
<section id="register-page" class="relative bg-top sm:bg-left-top">
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="relative z-10 font-sans bg-transparent text-gray-900 dark:text-gray-100 antialiased">
        <div
            class="min-h-screen flex flex-col justify-center items-center md:pt-15  bg-transparent dark:bg-gray-900">
            <div>
                <a href="{{route('home')}}">
                    <img src="{{asset('storage/images/logo.png') }}" alt="بوابة العافية">
                </a>
            </div>
    
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white/50 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{route('verify')}}">
                    @csrf
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                            ادخل كود التفعيل
                        </label>
                        <input
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            id="otp" type="text" name="otp" placeholder="XXXX" required="required" autofocus="autofocus"
                            autocomplete="username">
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 px-3 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{route('resend')}}?email={{$_GET['email']}}">
                            اعاده ارسال رمز تفعيل
                        </a>
    
                        <button type="submit"
                            class="btn bg-[#e6007e] hover:scale-105 hover:bg-[#fec700] hover:text-[#e6007e] border-[#fec700] hover:border-[#fec700] text-white rounded-md mr-4">
                             تفعيل
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
