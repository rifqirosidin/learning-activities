<aside class="main-sidebar fixed offcanvas  shadow bg-primary text-white no-b">
    <section class="sidebar">
        <div class=" mt-3 mb-3 ml-3">
            <h4 class="font-weight-bold">Learning Activity</h4>
        </div>
        <ul class="sidebar-menu hover-dark">
            <li class="header"><strong>Pages</strong></li>
            <li class="treeview"><a href="{{ route('learning-activities.index') }}" class="{{ request()->routeIs('learning-activities.index') ? 'sidebar-menu-active': '' }}">
                    <i class="icon icon-note-list blue-text s-18"></i>
                    <span>Learning Activity</span>
                </a>
            </li>
            <li class="treeview"><a href="{{ route('methods.index') }}" class="{{ request()->routeIs('method') ? 'sidebar-menu-active': '' }}">
                    <i class="icon icon-book-bookmark blue-text s-18"></i>
                    <span>Method</span>
                </a>
            </li>
{{--            <li class="treeview">--}}
{{--                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form').submit()">--}}
{{--                    <i class="icon icon-exit_to_app blue-text s-18"></i>--}}
{{--                    <span>Logout</span>--}}
{{--                </a>--}}
{{--                <form action="{{ route('logout') }}" method="post" id="form">--}}
{{--                    @csrf--}}
{{--                </form>--}}
{{--            </li>--}}
        </ul>
    </section>
</aside>

<div class="has-sidebar-left">
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                <div class="search-bar">
                    <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                           placeholder="start typing...">
                </div>
                <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                   aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
            </div>
        </div>
    </div>
    <div class="sticky">
        <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
            <div class="relative">
                <div class="d-flex">
                    <div>
                        <a href="#"  data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                            <i></i>
                        </a>
                    </div>
                    <div class="d-none d-md-block">
                        <h1 class="nav-title text-white">Dashboard</h1>
                    </div>
                </div>
            </div>
            <!--Top Menu Start -->
        </div>
    </div>

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
           <main>
               @yield('content')
           </main>
        </div>
    </div>
</div>
