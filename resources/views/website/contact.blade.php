@extends('layouts.website.app')
@section('content')
<section dir="rtl" class="md:h-screen flex py-36 w-full items-center bg-[url({{asset('storage/covers/about.png')}})] bg-center bg-no-repeat bg-cover">
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="container relative">
        <div class="lg:flex justify-center mt-12">
            <div class="lg:w-11/12 bg-white dark:bg-slate-900 rounded-md shadow-lg dark:shadow-gray-800 overflow-hidden">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                    <div class="lg:col-span-7 md:col-span-6 p-5">
                        <img src="{{asset('storage/settings/'.$data->logo)}}" alt="">
                    </div>
                    
                    <div class="lg:col-span-5 md:col-span-6">
                        <div class="p-6">
                            <h3 class="mb-6 text-center text-2xl leading-normal font-medium">نحن هنا لنستمع ونبني مستقبلًا أفضل معًا</h3>
                            <p class="text-slate-400 text-center">نحن نرحب بكل رسالة تصلنا. سواء كنت ترغب في تقديم استفسار أو توجيه رسالة تعبير عن رضاك أو اقتراح لتحسين خدماتنا، فإننا نهتم بكل كلمة تصلنا. فريقنا المتفاني والمتمرس في الاستماع سيكون سعيدًا بتقديم المساعدة والإجابة على جميع استفساراتك. نحن نؤمن بأهمية التواصل الفعال ونسعى جاهدين لتقديم تجربة مميزة لكل زائر يتصل بنا. فلا تتردد في الاتصال بنا والسماح لنا بمساعدتك وتلبية احتياجاتك. نحن هنا لتحقيق رضاك وبناء علاقة تعاونية طويلة الأمد معكم</p>
                            
                            <div class="flex items-center mt-6">
                                <i data-feather="mail" class="w-6 h-6 me-4"></i>
                                <div class="">
                                    <h5 class="title font-bold mb-0">البريد الإلكتروني </h5>
                                    <a href="mailto:{{$data->email}}" class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 duration-500 ease-in-out">{{$data->email}}</a>
                                </div>
                            </div>
                            
                            <div class="flex items-center mt-6">
                                <i data-feather="phone" class="w-6 h-6 me-4"></i>
                                <div class="">
                                    <h5 class="title font-bold mb-0">الهاتف</h5>
                                    <a href="tel:{{$data->phone}}" class="btn btn-link text-cyan-600 hover:text-cyan-600 after:bg-cyan-600 duration-500 ease-in-out">{{$data->phone}}</a>
                                </div>
                            </div>
                            
                         

                            <ul class="list-none mt-6">
                                <li class="inline"><a href="{{$data->facebook_url}}" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md hover:border-cyan-600 hover:text-white hover:bg-cyan-600"><i data-feather="facebook" class="h-4 w-4"></i></a></li>
                                <li class="inline"><a href="{{$data->instegram_url}}" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md hover:border-cyan-600 hover:text-white hover:bg-cyan-600"><i data-feather="instagram" class="h-4 w-4"></i></a></li>
                                <li class="inline"><a href="{{$data->twitter_url}}" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md hover:border-cyan-600 hover:text-white hover:bg-cyan-600"><i data-feather="twitter" class="h-4 w-4"></i></a></li>
                            </ul><!--end icon-->
                        </div>
                      
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->


@endsection