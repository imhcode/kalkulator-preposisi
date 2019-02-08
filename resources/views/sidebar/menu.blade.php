<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="{{ (\Request::route()->getName() == 'home') ? 'active' : ''}}"> <a class="waves-effect waves-dark" href="{{url('/dashboard')}}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="{{ (\Request::route()->getName() == 'user') ? 'active' : ''}}"> <a class="waves-effect waves-dark" href="{{url('/dashboard/users')}}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users</span></a>
                </li>
                <li class=""> <a class="waves-effect waves-dark" href="javascript();" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="hide-menu">Apps</span></a>
                    <ul>
                        <li class="{{ (\Request::route()->getName() == 'app.modulo') ? 'active' : ''}}"><a href="{{url('/dashboard/app/modulo')}}"> <i class="mdi mdi-checkbox-blank-circle-outline" style="width: 25px;display: inline-block;"></i>Modulo</a></li>
                        <li class="{{ (\Request::route()->getName() == 'app.table-kebenaran') ? 'active' : ''}}"><a href="{{url('/dashboard/app/table-kebenaran')}}"> <i class="mdi mdi-checkbox-blank-circle-outline" style="width: 25px;display: inline-block;"></i>Logika Preposisi</a></li>
                    </ul>
                </li>

                <li class="{{ (\Request::route()->getName() == 'history') ? 'active' : ''}}"> <a class="waves-effect waves-dark" href="{{url('/dashboard/history')}}" aria-expanded="false"><i class="mdi mdi-history"></i><span class="hide-menu">History</span></a>
                </li>
                <li class="{{ (\Request::route()->getName() == 'contact') ? 'active' : ''}}"> <a class="waves-effect waves-dark" href="{{url('/dashboard/contact')}}" aria-expanded="false"><i class="mdi mdi-contact-mail"></i><span class="hide-menu">Contact</span></a>
                </li>
                <li class="{{ (\Request::route()->getName() == 'logout') ? 'active' : ''}}"> <a class="waves-effect waves-dark" href="{{url('/dashboard/logout')}}" aria-expanded="false"><i class="mdi mdi-logout-variant"></i><span class="hide-menu">Log Out</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->

    <!-- End Bottom points-->
</aside>