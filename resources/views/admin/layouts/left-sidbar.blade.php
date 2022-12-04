
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{  (!empty($user->profile_image)) ? url('upload/admin_images/'.$current_user->profile_image) : url('upload/no_image.jpg')  }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>لوحة التحكم</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.gov') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>حكومية</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.person') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>اشخاص</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.com') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>تجارية</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bank') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>بنوك</span>
                    </a>
                </li>






            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
