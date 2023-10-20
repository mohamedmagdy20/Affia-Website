@extends('layouts.website.app')
@section('css')
<link rel="stylesheet" href="{{asset('assets/website/search.css')}}">
@endsection
@section('content')
<section class="swiper-slider-hero relative block h-screen" id="home">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($headers as $item )
                
            <div class="swiper-slide flex items-center overflow-hidden" data-aos="fade-up" data-aos-once="true">
                <div class="slide-inner slide-bg-image flex items-center bg-center;"
                    data-background="{{asset('storage/headers/'.$item->logo)}}">
                    <div class="absolute inset-0 bg-black/70"></div>
                    <div class="container relative">
                        <div class="grid grid-cols-1">
                            <div class="text-center">
                                <h1 data-aos="fade-right"
                                    class="font-semibold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5">
                                   {{$item->title}}<br> معنا</h1>
                                <p data-aos="fade-left" class="text-white/70 text-lg max-w-xl mx-auto">
                                    {{$item->description}}
                                </p>
                                <div class="flex w-full justify-center items-center gap-3">
                                    <div class="mt-6">
                                        <a href="#" class="">
                                            <button type="submit"
                                                class="btn bg-[#e6007e] hover:scale-105 hover:bg-[#fec700] hover:text-[#e6007e] border-[#fec700] hover:border-[#fec700] text-white rounded-md">
                                                تواصل معنا
                                            </button>
                                        </a>
                                    </div>
                                    <div class="mt-6">
                                        <a href="#"
                                            class="btn bg-transparent hover:scale-105 hover:bg-[#fec700] hover:text-[#e6007e] border-[#fec700] hover:border-[#fec700] text-white rounded-md">اعرف
                                            المزيد</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end grid-->
                    </div>
                    <!--end container-->
                </div><!-- end slide-inner -->
            </div> <!-- end swiper-slide
            @endforeach -->

        </div>
        <!-- end swiper-wrapper -->

        <!-- swipper controls -->
        <!-- <div class="swiper-pagination"></div> -->
        <div class="swiper-button-next rounded-full text-center"></div>
        <div class="swiper-button-prev rounded-full text-center"></div>
    </div>
    <!--end container-->
    <div class="realtive overflow-hidden" >
        <form action="{{route('all')}}" method="GET" class="mb-3" dir="rtl">
        <div class="search-box rounded">
               
            <div class="search-content mb-3" >
                <label for="">اسم مؤسسة</label>
                <input type="text" name="name" class="mx-4 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 " placeholder="اكتب اسم الموسسة هنا">
             </div>
            <div class="search-content mb-3">
                <label for="">منطقة</label>
                <select name="country" class=" mx-4 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" id="">
                    <option value="">اختر المنطقة</option>
                    @foreach ($country as $item )
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-content mb-3">
                <label for="">مدينة</label>
                <select name="city" class="mx-4 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" id="">
                    <option value="">اختر المدينة</option>
    
                    @foreach ($city as $item )
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
    
           
            <div class="search-content mb-3">
                <button class="btn bg-[#009ba4] hover:bg-cyan-700 rounded border-[#fec700] hover:border-cyan-700 text-white mt-6 mx-2" style="width: 150px">ابحث</button>
            </div>
    
    
        </div>
        </form>
    </div>
</section>

    
   
<section id="specific" class="relative gap-y-7 flex flex-wrap  overflow-y-visible items-center justify-center ">
        <h1
            class="w-full text-center font-extrabold text-transparent text-6xl bg-clip-text bg-gradient-to-r my-2 pt-6 pb-3 from-cyan-400 to-pink-600">
            احدث موسسات بوابة العافية</h1>

        <div class="container-fluid relative mt-8">
            <div class="grid grid-cols-1 mt-8">
                <div class="tiny-six-item">
                    @foreach ($latestServices as $service )      
                    <div class="tiny-slide">
                        <div class="mx-2">
                            <div class="group relative block overflow-hidden rounded-md transition-all duration-500">
                                <a href="{{route('show',$service->slug)}}" title="{{$service->name}}">
                                    <img src="{{asset('storage/user/'.$service->image)}}"
                                        class="transition-all duration-500 group-hover:scale-105"
                                        alt="{{$service->name}}">
                                    <div
                                        class="absolute inset-0 group-hover:bg-cyan-600 opacity-0 group-hover:opacity-70 transition-all duration-500">
                                    </div>
                                </a>
                            </div>
                            <div class="p-4 pb-0">
                                <a href="{{route('show',$service->slug)}}"
                                    class="btn btn-link hover:text-cyan-600 after:bg-cyan-600 text-xl duration-500 ease-in-out">
                                    {{$service->name}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="tiny-slide">
                        <div class="mx-2">
                            <div class="group relative block overflow-hidden rounded-md transition-all duration-500">
                                <a href="#" title="عيادة العناية الأولية">
                                    <img src="{{asset('storage/images/services/6.png')}}"
                                        class="transition-all duration-500 group-hover:scale-105"
                                        alt="عيادة العناية الأولية">
                                    <div
                                        class="absolute inset-0 group-hover:bg-cyan-600 opacity-0 group-hover:opacity-70 transition-all duration-500">
                                    </div>
                                </a>
                            </div>
                            <div class="p-4 pb-0">
                                <a href="#"
                                    class="btn btn-link hover:text-cyan-600 after:bg-cyan-600 text-xl duration-500 ease-in-out">
                                    عيادة العناية الأولية</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</section>
    <!-- End Section-->
    <!-- all our services -->
    <section>
        <div class="container py-12">

            <h1
            class="w-full text-center font-extrabold text-transparent text-6xl bg-clip-text bg-gradient-to-r my-2 pt-6 pb-8 from-cyan-400 to-pink-600">
            احدث خدمات بوابة العافية</h1>
            <div class="grid grid-cols-1 justify-center">
                <div class="transition-all duration-500 ease-in-out ">
                    <div class="grid lg:grid-cols-3 md:grid-cols-3 grid-cols-2 gap-[24px]">

                        
                        <!--Start feature content-->
                        @foreach ($category as $item )
                        <div
                            class="group hover:scale-105 p-6 md:px-4 rounded-lg shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 bg-white dark:bg-slate-900 text-center">
                            <div data-aos="fade-up" data-aos-once="true"
                                class="w-16 h-16 bg-cyan-600/5 text-cyan-600 rounded-lg text-2xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                                <img src="{{asset('storage/category/'.$item->logo)}}" alt="">
                            </div>
                            <a href="{{route('all')}}?category={{$item->id}}" class="title h5 text-lg font-medium hover:text-cyan-600">{{$item->name}}</a>
                        </div>    
                        @endforeach
                        
                        <!--end feature content-->
                        
                    </div>
                </div>
            </div>
            <!--end grid-->
        </div>
    </section>


    {{-- providers --}}
    <section>
        <div class="container py-10">
            {{-- <div class="flex"> --}}

                <h3 class="text-right mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold"><span class="text-cyan-600">لدينا أروع مقدمي الخدمات</span></h3>
                <a class="mb-4 btn bg-[#e6007e] hover:scale-105 hover:bg-[#fec700] hover:text-[#e6007e] border-[#fec700] hover:border-[#fec700] text-white rounded-md" href="{{route('all')}}">تصفح الكل</a>
                {{-- </div> --}}
            <div class="grid grid-cols-1 justify-center">
                <div class="transition-all duration-500 ease-in-out ">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-6 gap-[24px]">
                        @foreach ($services as $item )
                        <div class="group" data-aos="fade-down" data-aos-once="true"  data-aos-duration="500">
                            <div class="school">
                                <div class="top">
                                    <div class="body">
                                        <div class="img">
                                            <img src="{{asset('storage/user/'.$item->image)}}" class="h-auto max-w-xs mx-auto" alt="">

                                            {{-- <a href="/مدارس/مدارس-الشرق-الاوسط-العالمية"
                                                style="background:url('storage/icon/health_mind.png')"></a> --}}
                                        </div>
                                        <p class="p-3"><a href="{{route('show',$item->slug)}}">{{$item->name}}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <p class="p-2">
                                        <i class="icon-payment-dollar"></i>
                                        {{$item->category->name}}
                                    </p>
                                    <div class="booking-actions">
                                        <a href="{{route('show',$item->slug)}}" class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-full">
                                            <i class="icon-gesture-hand"></i>
                                            عرض</a>
    
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
    
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
    
        <!--end container-->

        <div class="container relative md:mt-4  mt-5">
            <div class="grid grid-cols-1 text-center">
                <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">ألم تجد الخدمة التي
                    تبحث عنها ؟ <br> تواصل معنا.</h3>

                <span class="text-slate-400 mb-4">إذا تأكدت من عدم وجود الخدمة التي تبحث عنها يمكنك التواصل معنا
                </span>
                <div class="mt-6">
                    <a href="contact-one.html"
                        class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-full"><i
                            class="uil uil-phone"></i> تواصل معنا</a>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End Section-->


@endsection