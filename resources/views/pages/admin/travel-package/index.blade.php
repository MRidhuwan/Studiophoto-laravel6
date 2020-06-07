@extends('layout.admin')

@section('content')

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-brand">
                    <!-- Logo icon -->
                    <a href="{{ route('dashboard')}}">
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="{{url('adm_dashboard/assets/images/big/logocv.png')}}" alt="homepage"
                                class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{url('adm_dashboard/assets/images/big/logocv.png')}}" alt="homepage"
                                class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        {{-- <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{url('adm_dashboard/assets/images/logo-text.png')}}" alt="homepage"
                        class="dark-logo" />
                        <!-- Light Logo text -->
                        <img src="{{url('adm_dashboard/assets/images/logo-light-text.png')}}" class="light-logo"
                            alt="homepage" />
                        </span> --}}
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right ">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="javascript:void(0)">
                            <form>
                                <div class="customize-input">
                                    <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                        type="search" placeholder="Search" aria-label="Search">
                                    <i class="form-control-icon" data-feather="search"></i>
                                </div>
                            </form>
                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{url('adm_dashboard/assets/images/users/d1.jpg')}}" alt="user"
                                class="rounded-circle" width="40">
                            <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">
                                    {{ Auth::user()->name }}
                                </span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                            <form action="{{ url('logout')}}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit"> <i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</button>
                            </form>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard')}}"
                            aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                class="hide-menu">Dashboard</span></a></li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('travel-package.index')}}"
                            aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                class="hide-menu">Paket Photo
                            </span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('gallery.index')}}"
                            aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                                class="hide-menu"> Gallery</span></a></li>

                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                            href="{{ route('transaction.index')}}" aria-expanded="false"><i data-feather="calendar"
                                class="feather-icon"></i><span class="hide-menu">Transaksi</span></a></li>


                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Table Data Paket Photo</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}"
                                        class="text-muted">Home</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Paket Photo</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Table Paket Photo</h4>
                            <h4><a href="{{ route('travel-package.create')}}"
                                    class=" customize-input float-right btn btn-info">
                                    <i class="fas fa-plus"> </i> Add Paket Photo</a>
                            </h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-fixed">
                                <thead>
                                    <tr class="table-info text-info">
                                        <th>id</th>
                                        <th>title</th>
                                        <th>slug</th>
                                        <th>location</th>
                                        <th>about</th>
                                        <th>feature_event</th>
                                        <th>language</th>
                                        <th>foods</th>
                                        <th>departure_date</th>
                                        <th>duration</th>
                                        <th>type</th>
                                        <th>price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->title}}</td>
                                        <td>{{ $item->slug}}</td>
                                        <td>{{ $item->location}}</td>
                                        <td>{{ $item->about}}</td>
                                        <td>{{ $item->feature_event}}</td>
                                        <td>{{ $item->language}}</td>
                                        <td>{{ $item->foods}}</td>
                                        <td>{{ $item->departure_date}}</td>
                                        <td>{{ $item->duration}}</td>
                                        <td>{{ $item->type}}</td>
                                        <td>{{ $item->price}}</td>
                                        <td>
                                            <a href="{{ route('travel-package.edit', $item->id)}}"
                                                class="btn btn-info btn-circle">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('travel-package.destroy', $item->id)}}" method="post"
                                                class="">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-circle">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">
                                            <button type=" button" class="btn btn-lg btn-danger" data-toggle="popover"
                                                title="" data-content="Belum ada Data ?"
                                                data-original-title="Warning">Data
                                                Empty</button></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

        <!-- End Page wrapper  -->

        <!-- footer -->
        <!-- ============================================================== -->
        @include('includes.admin.footer')
        <!-- ============================================================== -->
        <!-- End footer -->
    </div>
</div>
@endsection
