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
{{-- <section id="register-page" class="relative bg-top sm:bg-left-top">
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="relative z-10 font-sans bg-transparent text-gray-900 dark:text-gray-100 antialiased">
        <div
            class="min-h-screen flex flex-col justify-center items-center py-36  bg-transparent dark:bg-gray-900">
            <div>
                <a href="index.html">
                    <img src="{{asset('storage/images/logo.png') }}" alt="بوابة العافية">
                </a>
            </div>
    
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white/50 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST" action="{{route('register.provider')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                            الاسم
                        </label>
                        <input
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                             id="name" type="text" name="name" required="required" autofocus="autofocus"
                            autocomplete="name">
                    </div>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                            البريد الإلكتروني
                        </label>
                        <input
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            id="email" type="email" name="email" required="required" autofocus="autofocus"
                            autocomplete="username">
                    </div>
                    @error('email')
                       <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                           الهاتف 
                        </label>
                        <input
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            id="phone" type="tel" name="phone" required="required" autofocus="autofocus"
                            autocomplete="username">
                    </div>
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                     @enderror
                    
                     
                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="address">
                           العنوان 
                        </label>
                        <input
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            id="address" type="text" name="address" required="required" autofocus="autofocus"
                            autocomplete="username">
                    </div>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                     @enderror
                    

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                           المنطقة 
                        </label>
                       <select name="country_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="">
                        <option value="" selected>اختر المنطقة</option>
                        @foreach ($countries as $item )
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @endforeach
                       </select>
                       @error('country_id')                           
                            <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                           المدينة 
                        </label>
                       <select name="city_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="">
                        <option value="" selected>اختر المدينة</option>
                        @foreach ($cities as $item )
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @endforeach
                       </select>
                       @error('city_id')                           
                            <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>


                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                           الجهة 
                        </label>
                       <select name="entity_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="">
                        <option value="" selected>اختر جهة</option>
                        @foreach ($entity as $item )
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @endforeach
                       </select>
                       @error('entity_id')                           
                            <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                           التصنيف 
                        </label>
                       <select name="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="">
                        <option value="" selected>اختر جهة</option>
                        @foreach ($category as $item )
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @endforeach
                       </select>
                       @error('category_id')                           
                            <span class="text-danger">{{$message}}</span>
                       @enderror
                    </div>
    
                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                            كلمة المرور
                        </label>
                        <input
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            id="password" type="password" name="password" required="required"
                            autocomplete="current-password">
                    </div>
                    @error('password')                           
                        <span class="text-danger">{{$message}}</span>
                    @enderror
    
                    <div class="mb-3">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                            اعادة كلمة المرور 
                        </label>
                        <input
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                            id="password" type="password" name="password_confirmation" required="required"
                            autocomplete="current-password">
                    </div>
    
                    <div class="flex items-center space-x-6 py-10">
                        <div class="shrink-0 px-2">
                          <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c" alt="Current profile photo" />
                        </div>
                        <label class="block">
                          <span class="sr-only">اختر صورة لحسابك</span>
                          <input type="file" name="image" onchange="loadFile(event)" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"/>
                        </label>
                      </div>
                  
    
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 px-3 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{route('website.login')}}">
                             لديك حساب
                        </a>
    
                        <button type="submit"
                            class="btn bg-[#e6007e] hover:scale-105 hover:bg-[#fec700] hover:text-[#e6007e] border-[#fec700] hover:border-[#fec700] text-white rounded-md mr-4">
                            تسجيل الدخول
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> --}}
<section class="flex flex-col md:flex-row  items-center mt-5 " >

    <div class="relative bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <div class="absolute inset-0 bg-black/70"></div>
     
        <img src="{{asset('storage/images/slider/1.jpg')}}" alt="" class="w-full h-full object-cover">
    </div>
  
    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
          flex items-center justify-center">
  
    <div class="w-full h-100" >
  
  
        <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">انشيء حساب موسسة جديد</h1>
  
        <form class="mt-6" action="{{route('register.provider')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="mb-3">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                    الاسم
                </label>
                <input
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                     id="name" type="text" name="name" required="required" autofocus="autofocus"
                    autocomplete="name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                        البريد الإلكتروني
                    </label>
                    <input
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        id="email" type="email" name="email" required="required" autofocus="autofocus"
                        autocomplete="username">
                    @error('email')
                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
                       الهاتف 
                    </label>
                    <input
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        id="phone" type="tel" name="phone" required="required" autofocus="autofocus"
                        autocomplete="username">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
                        كلمة المرور
                    </label>
                    <input
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        id="password" type="password" name="password" required="required"
                        autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
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

                <div class="flex items-center space-x-6 py-2">
                    <div class="shrink-0 px-2">
                      <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c" alt="Current profile photo" />
                    </div>
                    <label class="block">
                      <span class="sr-only">اختر صورة لحسابك</span>
                      <input type="file" name="image" onchange="loadFile(event)" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"/>
                    </label>
                </div>
                    <button type="submit"
                    class="btn bg-[#e6007e] hover:scale-105 hover:bg-[#fec700] hover:text-[#e6007e] border-[#fec700] hover:border-[#fec700] text-white rounded-md  px-4 py-3 mt-6 w-full block">
                    سجل الان
                </button>
        </form>
  
        <hr class="my-3 border-gray-300 w-full">
  

        <p class="mt-4">لديك حساب ؟   <a href="{{route('website.login')}}" class="text-blue-500 hover:text-blue-700 font-semibold">سجل دخولك الان
                </a></p>
  
  
    </div>
    </div>
  
</section>

@endsection
@section('js')
    <script>
        var loadFile = function(event) {
            
            var input = event.target;
            var file = input.files[0];
            var type = file.type;

           var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        $(document).ready(function() {
            const list = document.getElementById("topnav").classList;
            list.add('nav-sticky')
        });
</script>
@endsection
