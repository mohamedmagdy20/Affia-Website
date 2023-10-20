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
        <h3 class="py-12 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">جميع الموسسات</h3>
    </div>
    <!--end grid-->
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
            <button type="submit" class="btn bg-[#009ba4] hover:bg-cyan-700 rounded border-[#fec700] hover:border-cyan-700 text-white mt-6 mx-2" style="width: 150px">ابحث</button>
        </div>


    </div>
    </form>
</div>
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
<section id="specific">
    <div class="container py-10">
        {{-- <div class="flex"> --}}

            <h3 class="text-right mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold"><span class="text-cyan-600">لدينا أروع مقدمي الخدمات</span></h3>
            {{-- </div> --}}
        <div class="grid grid-cols-1 justify-center">
            <div class="transition-all duration-500 ease-in-out ">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-6 gap-[24px]">
                    @foreach ($data as $item )
                    <div class="group" >
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
@endsection