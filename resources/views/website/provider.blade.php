@extends('layouts.website.app')
@section('css')
<link rel="stylesheet" href="{{asset('assets/website/search.css')}}">
@endsection
@section('content')
<section style="background-image: url('{{asset('storage/covers/about.png')}}');padding-top:4.5rem; padding-bottom: 2.5rem "
class="relative table w-full bg-no-repeat bg-center bg-cover" >
<div class="absolute  inset-0 bg-black opacity-75"></div>
<div class="container relative mt-4">
    <div class="grid grid-cols-1 pb-2 text-center mt-10">
        <div class="mx-auto">
            <img src="{{asset('storage/user/'.$data->image)}}" class="rounded-full" style="width:200px;height: 200px; " alt="">
        </div>
      
        <h3 class="mb-6  mt-6 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">{{$data->name}}</h3>

        <p class="text-slate-300 text-lg max-w-xl mx-auto">
          {{$data->category->name}}
        </p>
      

    </div>
    <!--end grid-->
</div>
<!--end container-->     
</section>
<!--end section-->
<div class="relative">
    <div class="shape absolute sm:-bottom-px -bottom-[20px] start-0 end-0 overflow-hidden z-1 text-white dark:text-slate-900">
        <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->


<!-- End Section-->

<!-- Start -->
<section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800">
<div class="container relative">    
    <div class="grid grid-cols-1 justify-center gap-[30px]" dir="rtl">
        <div class="group" >
            <div class="relative flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
              <div class="p-6">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">
                    عن موسسة {{$data->name}}
                </h3>
                    {!! $data->description !!}
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                    <div class="md:col-span-5 ">
                        <div class="flex items-center mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-6 h-6 me-4"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <div class="">
                                <h5 class="title font-bold mb-0">البريد الإلكتروني </h5>
                                <a href="mailto:{{$data->email}}" class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 duration-500 ease-in-out">{{$data->email}}</a>
                            </div>
                            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone w-6 h-6 me-4 mx-3"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <div class="">
                                <h5 class="title font-bold mb-0">الهاتف</h5>
                                <a href="tel:{{$data->phone}}" class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 duration-500 ease-in-out">{{$data->phone}}</a>
                            </div>

                        </div>

                        <div class="flex items-center mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512" class="feather feather-phone w-6 h-6 me-4 "><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg>
                            <div class="">
                                <h5 class="title font-bold mb-0">الموقع الالكتروني</h5>
                                <a href="{{$data->url}}" class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 duration-500 ease-in-out">{{$data->url}}</a>
                            </div>
                        </div>

                        <div class="flex items-center mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="feather feather-phone w-6 h-6 me-4 mx-2 "><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 476.1L192 421.2V35.9L384 90.8V476.1zm32-1.2V88.4L543.1 37.5c15.8-6.3 32.9 5.3 32.9 22.3V394.6c0 9.8-6 18.6-15.1 22.3L416 474.8zM15.1 95.1L160 37.2V423.6L32.9 474.5C17.1 480.8 0 469.2 0 452.2V117.4c0-9.8 6-18.6 15.1-22.3z"/></svg>
                            <div class=" mx-3">
                                <h5 class="title font-bold mb-0">المنطقة</h5>
                                <a  class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 duration-500 ease-in-out">{{$data->city->name}}</a>
                            </div>
                            <div class="">
                                <h5 class="title font-bold mb-0">موعيد العمل</h5>
                                <a  class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 duration-500 ease-in-out">
                                    {{$data->date_open}} - {{$data->date_close}}
                                </a>
                            </div>

                           
                        </div>
                    </div>
                    <div class="md:col-span-7">
                        <iframe src="https://maps.google.com/maps?q={{$data->lat}},{{$data->lng}}&hl=es;z=14&amp;output=embed" width="100%" height="100%" style="border:0;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
                    </div>
    
                </div>
                
              </div>
            </div>
           
        </div>

    
  
        <div class="group">
          <!-- Content for the first column (col-md-3) -->
          <div class="relative flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="p-6">
              <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                خدمات
              </h5>
            </div>

            @foreach ($data->services as $item  )
            <div class="flex transition-all duration-500 hover:scale-105 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-3 rounded-md bg-white dark:bg-slate-900">
                <div
                    class="flex  w-16 h-16 bg-cyan-600/5 text-cyan-600 rounded-lg text-2xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="m5.306 6.758l.347 3.122l-.476.042a2.389 2.389 0 0 0-2.154 2.028a24.113 24.113 0 0 0 0 7.1a2.39 2.39 0 0 0 2.154 2.028l1.134.1c1.22.107 2.444.161 3.668.162c.175 0 .266-.212.154-.346a7.002 7.002 0 0 1 3.947-11.35a.416.416 0 0 0 .333-.357l.28-2.529a4.89 4.89 0 0 0 0-1.095l-.022-.205a4.7 4.7 0 0 0-9.342 0l-.023.205a4.96 4.96 0 0 0 0 1.095ZM10.374 2.8A3.2 3.2 0 0 0 6.82 5.624l-.023.205a3.46 3.46 0 0 0 0 .764l.352 3.164a42.166 42.166 0 0 1 5.702 0l.352-3.164a3.46 3.46 0 0 0 0-.764l-.023-.205a3.2 3.2 0 0 0-2.806-2.825Z" clip-rule="evenodd"/><path fill="currentColor" d="M16.25 15a.75.75 0 0 0-1.5 0v1.773c0 .24.115.465.309.606l1 .727a.75.75 0 1 0 .882-1.213l-.691-.502V15Z"/><path fill="currentColor" fill-rule="evenodd" d="M15.5 22a5.5 5.5 0 1 0 0-11a5.5 5.5 0 0 0 0 11Zm0-1.5a4 4 0 1 0 0-8a4 4 0 0 0 0 8Z" clip-rule="evenodd"/></svg> --}}
                        <img src="{{asset('storage/services/'.$item->logo)}}" alt="">
                </div>
                <div class="flex-1 mx-3">
                    <h4 class="mb-0 text-lg font-medium">{{$item->title}}</h4>
                    <p>
                        {{$item->description}}
                    </p>
                </div>
            </div>    
            @endforeach
            

          </div>
        </div>
    </div>

</div>
<!--end contanier-->
</section>

@endsection