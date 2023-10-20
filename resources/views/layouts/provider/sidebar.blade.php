<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{auth()->user()->image != null ? asset('storage/user/'.auth()->user()->image) : asset('assets/admin/images/person.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{auth()->user()->name}}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">القائمة</li>

                    <li>
                        <a href="{{route('dashboard')}}" class="waves-effect">
                            <span>لوحه التحكم</span>
                            <i class="ri-dashboard-line"></i>
                        </a>
                    </li>


                    <li>
                        <a href="{{route('profile')}}" class="waves-effect">
                            <span>الحساب</span>
                            <i class="ri-dashboard-line"></i>
                        </a>
                    </li>


                    <li>
                        <a href="{{route('website.service.index')}}" class="waves-effect">
                            <span>الخدمات</span>
                            <i class="ri-dashboard-line"></i>
                        </a>
                    </li>

             
                    
             
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>