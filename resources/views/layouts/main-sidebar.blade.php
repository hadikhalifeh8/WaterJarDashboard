<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    
                <!-- menu item Dashboard-->
                    <li>
    <a href="{{ url('/dashboard') }}">
        <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_sideBarTransl.Dashboard')}}</span>
        </div>
        <div class="clearfix"></div>
    </a>
</li>
                    <!-- Towns  -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#towns-menu">
                            <div class="pull-left"><i class="fas fa-city"></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Towns_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="towns-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Towns.index')}}">{{trans('main_sideBarTransl.ViewTowns_List')}}</a></li>
                        </ul>
                    </li>

                    <!-- Districts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#districts-menu">
                            <div class="pull-left"><i class="fa fa-area-chart"></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Districts_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="districts-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Districts.index')}}">{{trans('main_sideBarTransl.ViewDistricts_List')}}</a></li>

                        </ul>
                    </li>

                    <!-- Serepta-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#serepta-menu">
                            <div class="pull-left"><i class="fa fa-bars"></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Serepta_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="serepta-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Serepta.index')}}">{{trans('main_sideBarTransl.ViewSerepta_List')}}</a></li>
                        </ul>
                    </li>


                    <!-- Tannourine-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#tannourine-menu">
                            <div class="pull-left"><i class='fas fa-prescription-bottle-alt'></i></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Tannourine_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="tannourine-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Tannourine.index')}}">{{trans('main_sideBarTransl.ViewTannourine_List')}}</a></li>
                        </ul>
                    </li>




                   <!-- Drivers-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#drivers-menu">
                            <div class="pull-left"><i class="fas fa-truck"></i></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Drivers_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="drivers-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Drivers.index')}}">{{trans('main_sideBarTransl.ViewDrivers_List')}}</a></li>
                        </ul>
                    </li>



                    <!-- Customers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#customers-menu">
                            <div class="pull-left"><i class="fas fa-user-alt"></i></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Customers_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="customers-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Customers.index')}}">{{trans('main_sideBarTransl.ViewCustomers_List')}}</a></li>
                        </ul>
                    </li>



                    <!-- Orders-->
                      <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders-menu">
                            <div class="pull-left"><i class="fas fa-shopping-cart"></i></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Orders_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('CustomerOrders.index')}}">{{trans('main_sideBarTransl.ViewOrders_List')}}</a></li>
                        </ul>
                    </li>



                    


                


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>

                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>

                    <!-- Exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_trans.Exams')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Onlinec lasses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Settings-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">{{trans('main_trans.Users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================