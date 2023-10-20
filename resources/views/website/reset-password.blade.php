@extends('layouts.website.app')
@section('css')
<style>
    
    #register-page{
      font-family: 'Almarai', sans-serif;
        background-image:url('{{asset('storage/images/slider/1.jpg')}}') ;
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
                <form method="POST" action="{{route('reset.password.post',$token)}}">
                    @csrf
                    <div>
                        <div class="mb-3">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                                كلمة المرور
                            </label>
                            <input
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                id="password" type="password" name="password" required="required"
                                autocomplete="current-password">
                        </div>
        
                        <div class="mb-3">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                                اعادة كلمة المرور 
                            </label>
                            <input
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                id="password" type="password" name="password_confirmation" required="required"
                                autocomplete="current-password">
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="btn bg-[#e6007e] hover:scale-105 hover:bg-[#fec700] hover:text-[#e6007e] border-[#fec700] hover:border-[#fec700] text-white rounded-md mr-4">
                            حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
