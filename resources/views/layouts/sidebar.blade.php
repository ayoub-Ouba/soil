      <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Index</li>
                            <li class="">
                                <a href="/home" class="waves-effect {{ request()->is("admin") || request()->is("admin/*") ? "mm active" : "" }}">
                                    <i class="ti-home"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            

                            <!-- <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Commandes <span class="float-right menu-arrow">
                                   </span> </span></a>
                               
                            </li> -->
                        <!-- <li>
                                    <a href="/employees" class="waves-effect {{ request()->is("employees") || request()->is("/employees/*") ? "mm active" : "" }}"><i class="dripicons-view-apps"></i><span>Employees List</span></a>
                                </li> -->
                            <li class="">
                                <a href="/orders" class="waves-effect {{ request()->is("commandes") || request()->is("type_employes/*") ? "mm active" : "" }}">
                                    <i class="ti-calendar"></i> <span> Orders</span>
                                </a>
                            </li>

                            <li class="menu-title">Management</li>
                            <!-- <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i><span> Utilisateurs <span class="float-right menu-arrow">
                                    </span> </span></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/employees" class="waves-effect {{ request()->is("employees") || request()->is("/employees/*") ? "mm active" : "" }}"><i class="dripicons-view-apps"></i><span>Employees List</span></a>
                                    </li>
                                    <li class="">
                                        <a href="/type_employes" class="waves-effect {{ request()->is("type_employes") || request()->is("type_employes/*") ? "mm active" : "" }}">
                                            <i class="ti-calendar"></i> <span> Types employes</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li> -->
                           

                            <!-- <li class="">
                                <a href="/schedule" class="waves-effect {{ request()->is("schedule") || request()->is("schedule/*") ? "mm active" : "" }}">
                                    <i class="ti-stamp"></i> <span> Articles </span>
                                </a>
                            </li> -->
                            @if(auth()->user()->state=='dropshiper')

                                <li class="">
                                    <a href="/design" class="waves-effect {{ request()->is("Design") || request()->is("Design/*") ? "mm active" : "" }}">
                                    <i class="ti-pencil-alt"></i> <span> Design </span>
                                    </a>
                                </li>
                                @endif
                            @if(auth()->user()->state=='admin')
                            <li class="">
                                <a href="/users" class="waves-effect {{ request()->is("check") || request()->is("check/*") ? "mm active" : "" }}">
                                <i class="ti-user"></i> <span> Users </span>
                                </a>
                            </li>

                            <li class="">
                                <a href="/Types_products" class="waves-effect {{ request()->is("Design") || request()->is("Design/*") ? "mm active" : "" }}">
                                <i class="ti-user"></i> <span>Types of products </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="/Stockage" class="waves-effect {{ request()->is("Design") || request()->is("Design/*") ? "mm active" : "" }}">
                                <i class="ti-server"></i> <span>Storage </span>
                                </a>
                            </li>
                            @endif
                           
                            <li class="">
                                <a href="/leave" class="waves-effect {{ request()->is("leave") || request()->is("leave/*") ? "mm active" : "" }}">
                                    <i class="dripicons-backspace"></i> <span> Leave </span>
                                </a>
                            </li>
                            
                          
                            
                           

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
