            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{url('midone/dist/images/logo.svg')}}">
                    <span class="hidden xl:block text-white text-lg ml-3"> MN<span class="font-medium">T</span> </span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{url('dashboard')}}" class="side-menu {{ request()->is('dashboard') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('kluster')}}" class="side-menu {{ request()->is('kluster') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon"> <i data-feather="server"></i> </div>
                            <div class="side-menu__title"> Kluster </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('soal')}}" class="side-menu {{ request()->is('soal') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon"> <i data-feather="book"></i> </div>
                            <div class="side-menu__title"> Soal </div>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!-- END: Side Menu -->
