<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

    {{-- Datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" ref="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.css" />
    
    {{-- Local CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

</head>

<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('/images/gate seal.png') }}" alt="" srcset="">
                </span>

                <div class="text logo-text">
                    <span class="name">Brgy. Gate</span>
                    <span class="profession">HCIMS</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link link {{ (request()->segment(1) == 'dashboard') ? 'nav-active' : '' }}" data-tippy-content="Dashboard" data-tippy-arrow="false">
                        <a href="/dashboard">
                            <i class='bx bx-grid-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link link {{ (request()->segment(1) == 'residents') ? 'nav-active' : '' }}" data-tippy-content="Residents" data-tippy-arrow="false">
                        <a href="{{ route('residents.index') }}">
                            <i class='bx bx-group icon'></i>
                            <span class="text nav-text">Residents</span>
                        </a>
                    </li>

                    <li class="nav-link link {{ (request()->segment(1) == 'checkup-forms') ? 'nav-active' : '' }}" data-tippy-content="Check-up Forms" data-tippy-arrow="false">
                        <a href="{{ route('checkup-forms.index') }}">
                            <i class='bx bx-file icon'></i>
                            <span class="text nav-text">Check-up Forms</span>
                        </a>
                    </li>

                    <li class="nav-link link {{ (request()->segment(1) == 'users') ? 'nav-active' : '' }}" data-tippy-content="Users" data-tippy-arrow="false">
                        <a href="{{ route('users.index') }}">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Users</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <div class="sidebar-card">
                    <li class="">
                        <i class='bx bx-user icon' id="profile-pic"></i>
                        <span class="text nav-text">
                            <span class="user-name"><strong>{{ Auth::user()->username }}</strong></span>
                            <br>
                            <span class="user-name">Admin</span>
                        </span>
                    </li>

                    <li class="t_link" data-tippy-content="Manage Account" data-tippy-arrow="false">
                        <a href="{{ route('users.manage') }}">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">Account</span>
                        </a>
                    </li>

                    <li class="t_link" data-tippy-content="Logout" data-tippy-arrow="false">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    {{-- <li class="mode">
                        <div class="sun-moon">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Dark mode</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li> --}}
                </div>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <nav>
            <div class="nav">
                <div class="container">
                    
                </div>
            </div>
        </nav>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>

    </section>

    {{-- @yield('content') --}}

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    {{-- Datatables Js --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    
    {{-- FullCalendar --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.js"></script>

    {{-- Chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Tippy --}}
    <script src="https://unpkg.com/tippy.js@6"></script>
    
    <script>
        $(document).ready(function() {
            $(".btn-close").addClass("shadow-none");

            //DataTable
            $('#users-tbl').DataTable({
                scrollX: true,
                fixedColumns: {
                    left: 0,
                    right: 1
                }
            });

            $('#pregnant-tbl').DataTable({
                scrollX: true,
                fixedColumns: {
                    left: 0,
                    right: 1
                }
            });

            $('#senior-tbl').DataTable({
                scrollX: true,
                fixedColumns: {
                    left: 0,
                    right: 1
                }
            });

            $('#baby-tbl').DataTable({
                scrollX: true,
                fixedColumns: {
                    left: 0,
                    right: 1
                }
            });

            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust()
                    .responsive.recalc();
            }); 
            
            //Sidebar
            const body = document.querySelector('body'),
                sidebar = body.querySelector('nav'),
                toggle = body.querySelector(".toggle"),
                searchBtn = body.querySelector(".search-box"),
                modeSwitch = body.querySelector(".toggle-switch"),
                modeText = body.querySelector(".mode-text");
            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            });
            searchBtn.addEventListener("click", () => {
                sidebar.classList.remove("close");
            });
            
        });
    </script>

    <script>
        tippy('.btn-edit', {
            content: 'Global content',
            theme: 'edit',
            animation: 'myAnimation',
        });
        tippy('.btn-delete', {
            content: 'Global content',
            theme: 'delete',
            animation: 'myAnimation',
        });
        tippy('.link', {
            content: 'Global content',
            theme: 'myTheme',
            animation: 'myAnimation2',
            placement: 'right',
        });
        tippy('.t_link', {
            content: 'Global content',
            theme: 'myTheme',
            animation: 'myAnimation2',
            placement: 'right',
        });
    </script>

    @yield('page-scripts')
    
</body>

</html>