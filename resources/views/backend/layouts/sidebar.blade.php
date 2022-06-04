<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#">
                            <img src="{{ asset('backend') }}/global_assets/images/placeholders/placeholder.jpg"
                                width="38" height="38" class="rounded-circle" alt="">
                            {{-- {{ Auth::user()->name }} --}}
                        </a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-envelope font-size-sm"></i> &nbsp; {{ Auth::user()->email }}
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link ">
                        <i class="fa-solid fa-cheese"></i>
                        <span>
                            View Site
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->routeIs('admin.home')) nav-item-expanded nav-item-open @endif">
                    <a href="{{route('admin.home') }}" class="nav-link ">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard

                        </span>
                    </a>
                </li>

                <li
                    class="nav-item nav-item-submenu @if (request()->routeIs('category.index', 'category.create')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Category</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('category.index') }}"
                                class="nav-link
                            @if (request()->routeIs('category.index')) active @endif  ">Show
                                Category</a></li>
                        <li class="nav-item"><a href="{{ route('category.create') }}"
                                class="nav-link
                            @if (request()->routeIs('category.create')) active @endif  ">Add
                                Category</a></li>
                    </ul>
                </li>
                <li
                    class="nav-item nav-item-submenu @if (request()->routeIs('post.index', 'post.create')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Post</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('post.index') }}"
                                class="nav-link  @if (request()->routeIs('post.index')) active @endif ">Show Post</a></li>

                        <li class="nav-item"><a href="{{ route('post.create') }}"
                                class="nav-link @if (request()->routeIs('post.create')) active @endif ">Add Post</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                            class="icon-switch2"></i>{{ __('Logout') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <!-- /main -->
                <!-- /layout -->
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
