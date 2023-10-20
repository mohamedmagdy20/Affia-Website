<nav id="topnav" class="defaultscroll is-sticky ">
    <div class="container relative  flex flex-row-reverse items-center justify-between ">

        <!-- Logo container-->
        <a class="logo w-[45vw] sm:w-[15vw] md:w-[15vw]  " href="{{route('home')}}">
            <img src="{{asset('storage/images/logo.png')}}" class="inline-block "
                alt="{{asset('storage/images/logo.png')}}">
        </a>



        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light ">
                <li><a href="{{route('home')}}" class="sub-menu-item">الرئيسية</a></li>
                <li><a href="{{route('about')}}" class="sub-menu-item">من نحن </a></li>
                @if (auth()->check())
                @if (auth()->user()->user_type == 'provider')
                <li class="has-submenu parent-parent-menu-item">
                    <a href="{{route('dashboard')}}">لوحة التحكم</a>
                </li>                    
                @endif      
                @endif
              

                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">مقدمي الخدمات</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{route('all')}}" class="sub-menu-item">عرض الكل</a>
                    </ul>
                </li>






                <li><a href="{{route('contact')}}" class="sub-menu-item">إتصل بنا</a></li>
            </ul>
            <!--end navigation menu-->
        </div>
        <!--end navigation-->
        <!-- End Logo container & Login button-->

        <div class="flex gap-x-5">

            <!--Login button End-->
            <div class="menu-extras ">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>


            </div>


            <ul class="buy-button flex justify-center items-center list-none mb-0">
                <li class="inline mb-0">
                    @if (auth()->check())
                    <a href="{{route('website.logout')}}"
                        class="btn btn-icon rounded-full bg-[#009ba4] hover:bg-[#fec700] border-cyan-600/10 hover:border-cyan-600 text-white hover:text-white">
                        <svg class="h-5 w-5 text-red-100"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />  <path d="M7 12h14l-3 -3m0 6l3 -3" /></svg>
                          
                          
                    </a>    
                    @else
                    <a href="{{route('website.login')}}"
                        class="btn btn-icon rounded-full bg-[#009ba4] hover:bg-[#fec700] border-cyan-600/10 hover:border-cyan-600 text-white hover:text-white"><i
                            data-feather="log-in" class="h-4 w-4"></i></a>
                    @endif
                  
                </li>

                <li class="inline  ps-1 mb-0">
                    <div class="relative" x-data="{ open: false }" @click.away="open = false"
                        @close.stop="open = false">
                        <div @click="open = ! open">
                            <button
                                class="btn btn-icon rounded-full bg-[#e6007e] hover:bg-[#fec700] border-cyan-600 hover:border-cyan-700 text-white">
                                <i class="h-4 w-4" data-feather="user-plus"></i>
                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-left left-0 "
                            style="display: none;" @click="open = false">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-700">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    كيف تريد أن تسجل معنا
                                </div>


                                <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                                    href="{{route('register.provider.view')}}">مقدم خدمة</a>





                                <div class="border-t border-gray-200 dark:border-gray-600"></div>
                                <!-- Authentication -->


                                <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                                    href="{{route('register.user.view')}}">مستخدم عادي</a>
                            </div>
                        </div>
                    </div>
                </li>



            </ul>
            <!-- End mobile menu toggle-->

        </div>

        <!--Login button Start-->
    </div>
    <!--end container-->
</nav>