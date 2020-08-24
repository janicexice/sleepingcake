<!-- Navigation Start-->
<header>
        <div class="logo">
            <h1 class="logo-text"><span>{{ $website->subtitle }}</span></h1>
        </div>

        
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li class="nav-item @yield('nav_home') px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('home') }}">HOME</a>
            </li>
            <li class="nav-item @yield('nav_health') px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('health') }}">LIVING HEALTHY</a>
                <ul>
                    <li><a href="{{ route('health.hobbies') }}">良好習慣</a></li>
                    <li><a href="{{ route('health.diet') }}">健康飲食</a></li>
                    <li><a href="{{ route('health.test') }}">好眠檢測</a></li>
                </ul>
            </li>
            <li class="nav-item @yield('nav_supplement') px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('supplement') }}">SUPPLEMENTS</a>
                <ul>
                    <li><a href="{{ route('supplements.vitamins') }}">維生素</a></li>
                    <li><a href="{{ route('supplements.nutritions') }}">營養補充品</a></li>
                </ul>
            </li>
            <li class="nav-item @yield('nav_drug') px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('drug') }}">DRUGS</a>
                <ul>
                    <li><a href="{{ route('drugs.treatments') }}">藥物治療</a></li>
                    <li><a href="{{ route('drugs.drug_introduction') }}">藥物介紹</a></li>
                </ul>
            </li>

            <!-- <li><a href="#">Sign Up</a></li>
            <li><a href="#">Login</a></li> -->
            <!-- <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    User
                    <i class="fa fa-chevron-down" style="font-size=.8em;"></i>
                </a>
                
            </li> -->

        </ul>
    </header>