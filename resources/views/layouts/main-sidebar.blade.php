<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    
                <!-- menu item Dashboard-->
                    <!-- <li>
    <a href="{{ url('/dashboard') }}">
        <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_sideBarTransl.Dashboard')}}</span>
        </div>
        <div class="clearfix"></div>
    </a>
</li> -->
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
                    <!-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#tannourine-menu">
                            <div class="pull-left"><i class='fas fa-prescription-bottle-alt'></i></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Tannourine_List')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="tannourine-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Tannourine.index')}}">{{trans('main_sideBarTransl.ViewTannourine_List')}}</a></li>
                        </ul>
                    </li> -->




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






                    <!-- Drivers Orders-->
                                        <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#drivers_orders-menu">
                            <div class="pull-left"><i class="fas fa-shopping-cart"></i></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.DriversOrders')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="drivers_orders-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('DriversOrders.index')}}">{{trans('main_sideBarTransl.ViewALLDrivers_Orders_List')}}</a></li>
                        </ul>
                    </li>



                    
                    <!-- Drivers Jars Calculates-->
                    <!-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#drivers_calcualte-menu">
                            <div class="pull-left"><i class="fas fa-shopping-cart"></i></i><span
                                    class="right-nav-text">{{trans('main_sideBarTransl.Load_Returned_Jars')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="drivers_calcualte-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('DriversCalcalateJarsOrders.index')}}">{{trans('main_sideBarTransl.View_ALL_Load_Returned_Jars')}}</a></li>
                        </ul>
                    </li> -->



                    


                




                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================