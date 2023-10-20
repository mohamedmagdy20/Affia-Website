@extends('layouts.website.app')
@section('css')
<link rel="stylesheet" href="{{asset('assets/website/search.css')}}">
@endsection
@section('content')
  <!-- End Navbar -->
  <section style="background-image: url({{asset('storage/settings/'.$data->logo)}})"
  class="relative table w-full py-36 lg:py-44  bg-no-repeat bg-center bg-cover">
  <div class="absolute  inset-0 bg-black opacity-75"></div>
  <div class="container relative">
      <div class="grid grid-cols-1 pb-8 text-center mt-10">
          <h3 class="mb-6 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">حول بوابة
              العافية</h3>

          <p class="text-slate-300 text-lg max-w-xl mx-auto">
             {{$data->title}}
          </p>
          <div class="mx-auto">
              <svg class="animate-pulse" xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 2048 2048">
                  <path fill="red"
                      d="M1504 128q113 0 212 42t172 116t116 173t43 212q0 58-12 115t-36 110h-463l-192-200l-320 320l-448-448l-320 328H49q-24-53-36-110T1 671q0-113 42-212t116-172t173-116t212-43q109 0 208 41t177 118l95 96l95-96q77-77 176-118t209-41zm-96 896h510l-14 16q-7 8-15 17l-865 864l-865-864q-8-8-15-16t-14-17h254l192-184l448 448l320-320l64 56z" />
              </svg>
          </div>

      </div>
      <!--end grid-->
  </div>
  <!--end container-->


</section>
<!--end section-->
<div class="relative">
  <div
      class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-white dark:text-slate-900">
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
      <div class="grid grid-cols-1 pb-8 text-center">
          <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">لمذا نحن ؟ وما الجديد الذي نقدمه</h3>

          <p class="text-slate-400 max-w-xl mx-auto">
            {{$data->description}}
          </p>
      </div>
      <!--end grid-->

      <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px] mt-8">
          <div
              class="flex transition-all duration-500 hover:scale-105 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-3 rounded-md bg-white dark:bg-slate-900">
              <div
                  class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><circle cx="23.453" cy="24" r="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M15.139 19.695a25.803 25.803 0 0 1 9.968 11.283c2.243-4.282 12.507-19.643 19.44-25.42"/></svg>
              </div>
              <div class="flex-1">
                  <h4 class="mb-0 text-lg font-medium">وصول سهل وشامل</h4>
              </div>
          </div>

          <div
              class="flex transition-all duration-500 hover:scale-105 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-3 rounded-md bg-white dark:bg-slate-900">
              <div
                  class="flex items-center justify-center h-[45px] min-w-[45px]  bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12.4 22l2.175-2q2.675-2.5 3.55-3.813T19 13.376q0-.65-.175-1.225T18.3 11H20q.825 0 1.413.588T22 13v9h-9.6ZM2 22v-9q0-.825.575-1.413T4 11h1.675q-.325.525-.5 1.137T5 13.375q0 1.5.838 2.813T9.4 20l2.2 2H2Zm17-12q-1.275 0-2.138-.863T16 7q0-1.25.863-2.125T19 4q1.25 0 2.125.875T22 7q0 1.275-.875 2.138T19 10Zm-7-1q-1.475 0-2.488-1.012T8.5 5.5q0-1.45 1.012-2.475T12 2q1.45 0 2.475 1.025T15.5 5.5q0 1.475-1.025 2.488T12 9Zm-5 4.375q0 1.025 1 2.3t3.975 3.975q2.95-2.65 3.988-3.937T17 13.375q0-1-.675-1.688T14.7 11q-.575 0-1.075.275t-.875.675l-.775.8l-.75-.775q-.35-.375-.8-.675T9.3 11q-1.025 0-1.663.688T7 13.374ZM5 10q-1.275 0-2.138-.863T2 7q0-1.25.863-2.125T5 4q1.25 0 2.125.875T8 7q0 1.275-.875 2.138T5 10Z"/></svg>
              </div>
              <div class="flex-1">
                  <h4 class="mb-0 text-lg font-medium">تنوع الخدمات</h4>
              </div>
          </div>

          <div
              class="flex transition-all duration-500 hover:scale-105 shadow dark:text-white dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-3 rounded-md bg-white dark:bg-slate-900">
              <div
                  class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="currentColor"><path d="M7.665 10.237L9.198 8.95l1.285 1.532l3.064-2.571l1.286 1.532l-4.596 3.857l-2.572-3.064Z"/><path fill-rule="evenodd" d="M16.207 4.893a8.001 8.001 0 0 1 .662 10.565c.016.013.03.027.045.042l4.243 4.243a1 1 0 0 1-1.414 1.414L15.5 16.914a1.046 1.046 0 0 1-.042-.045A8.001 8.001 0 0 1 4.893 4.893a8 8 0 0 1 11.314 0Zm-1.414 9.9a6 6 0 1 0-8.485-8.485a6 6 0 0 0 8.485 8.485Z" clip-rule="evenodd"/></g></svg>
              </div>
              <div class="flex-1">
                  <h4 class="mb-0 text-lg font-medium">توفر المعلومات</h4>
              </div>
          </div>

          <div
              class="flex transition-all duration-500 hover:scale-105 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-3 rounded-md bg-white dark:bg-slate-900">
              <div
                  class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 21q-.825 0-1.413-.588T0 19V5q0-.825.588-1.413T2 3h20q.825 0 1.413.588T24 5v14q0 .825-.588 1.413T22 21H2Zm13.9-2H22V5H2v14h.1q1.05-1.875 2.9-2.938T9 15q2.15 0 4 1.063T15.9 19ZM9 14q1.25 0 2.125-.875T12 11q0-1.25-.875-2.125T9 8q-1.25 0-2.125.875T6 11q0 1.25.875 2.125T9 14Zm10 4l2-2l-1.5-2h-1.65q-.15-.45-.25-.963T17.5 12q0-.525.1-1.012t.25-.988h1.65L21 8l-2-2q-1.35 1.05-2.175 2.663T16 12q0 1.725.825 3.338T19 18ZM4.55 19h8.9q-.85-.95-2.013-1.475T9 17q-1.275 0-2.425.525T4.55 19ZM9 12q-.425 0-.713-.288T8 11q0-.425.288-.713T9 10q.425 0 .713.288T10 11q0 .425-.288.713T9 12Zm3 0Z"/></svg>
              </div>
              <div class="flex-1">
                  <h4 class="mb-0 text-lg font-medium">تواصل مع المقدمين</h4>
              </div>
          </div>


          <div
              class="flex transition-all duration-500 hover:scale-105 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-3 rounded-md bg-white dark:bg-slate-900">
              <div
                  class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M14.134 36V20.11h19.732M19.279 36h14.587V25.45"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m19.246 26.606l4.135 4.135l5.373-5.372m-8.934-9.282a4.087 4.087 0 1 1 8.174 0m0 0v4.023m-8.172-4.108v4.108"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M30.288 44.566a21.516 21.516 0 1 1 9.69-6.18"/></svg>
              </div>
              <div class="flex-1">
                  <h4 class="mb-0 text-lg font-medium">أمان البيانات</h4>
              </div>
          </div>

          <div
              class="flex transition-all duration-500 hover:scale-105 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-3 rounded-md bg-white dark:bg-slate-900">
              <div
                  class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="m5.306 6.758l.347 3.122l-.476.042a2.389 2.389 0 0 0-2.154 2.028a24.113 24.113 0 0 0 0 7.1a2.39 2.39 0 0 0 2.154 2.028l1.134.1c1.22.107 2.444.161 3.668.162c.175 0 .266-.212.154-.346a7.002 7.002 0 0 1 3.947-11.35a.416.416 0 0 0 .333-.357l.28-2.529a4.89 4.89 0 0 0 0-1.095l-.022-.205a4.7 4.7 0 0 0-9.342 0l-.023.205a4.96 4.96 0 0 0 0 1.095ZM10.374 2.8A3.2 3.2 0 0 0 6.82 5.624l-.023.205a3.46 3.46 0 0 0 0 .764l.352 3.164a42.166 42.166 0 0 1 5.702 0l.352-3.164a3.46 3.46 0 0 0 0-.764l-.023-.205a3.2 3.2 0 0 0-2.806-2.825Z" clip-rule="evenodd"/><path fill="currentColor" d="M16.25 15a.75.75 0 0 0-1.5 0v1.773c0 .24.115.465.309.606l1 .727a.75.75 0 1 0 .882-1.213l-.691-.502V15Z"/><path fill="currentColor" fill-rule="evenodd" d="M15.5 22a5.5 5.5 0 1 0 0-11a5.5 5.5 0 0 0 0 11Zm0-1.5a4 4 0 1 0 0-8a4 4 0 0 0 0 8Z" clip-rule="evenodd"/></svg>
              </div>
              <div class="flex-1">
                  <h4 class="mb-0 text-lg font-medium">توفير الوقت والجهد</h4>
              </div>
          </div>

      </div>
      <!--end grid-->

  </div>
  <!--end contanier-->
</section>
<!--end section-->
<!-- End -->

<!-- End -->
@endsection