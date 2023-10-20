<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{asset('assets/admin/images/person.jpg')}}" alt="" class="avatar-md rounded-circle">
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
                        <a href="{{route('admin')}}" class="waves-effect">
                            <span>لوحه التحكم</span>
                            <i class="ri-dashboard-line"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.index')}}" class=" waves-effect">
                            <i class="fa fa-user"></i>
                            <span>المسئولين</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.user.index')}}" class=" waves-effect">
                            <i class="ri-account-circle-line"></i>
                            <span>المستخدمين</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.provider.index')}}" class=" waves-effect">
                            <i class="ri-account-circle-line"></i>
                            <span>الموسسات</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.service.index')}}" class=" waves-effect">
                            <i class="ri-pencil-ruler-2-line"></i>
                            <span>الخدمات</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.country.index')}}" class=" waves-effect">
                            <i class=" ri-pin-distance-fill"></i>
                            <span>المدن</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.city.index')}}" class=" waves-effect">
                            <i class=" ri-pin-distance-fill"></i>
                            <span>المناطق</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.category.index')}}" class=" waves-effect">
                            <i class="ri-product-hunt-line"></i>
                            <span>التصنيفات</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.entity.index')}}" class=" waves-effect">
                            <i class="ri-pencil-ruler-2-line"></i>
                            <span>الجهات</span>
                        </a>
                    </li>         

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i class="ri-vip-crown-2-line"></i>
                               <span>الموقع الالكترونية</span> 
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{route('admin.header.index')}}">لافتات</a></li>
                            <li><a href="{{route('admin.about.index')}}">من نحن</a></li>
                            <li><a href="{{route('admin.contact.index')}}">التواصل</a></li>
                        </ul>
                    </li>
                    
             
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>