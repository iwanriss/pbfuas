            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/indexAdmin')}}">subur.in</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> admin <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>

                        </form>
                        <a class="btn hvr-hover" style="text-decoration: none" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{url('/indexAdmin')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> User Profile</a>
                            </li>
                            
                            <li>
                                <a href="{{url('/dataCustomer')}}"><i class="fa fa-table fa-fw"></i> Data Customer</a>
                            </li>
                            <li>
                                <a href="{{url('/dataMitra')}}"><i class="fa fa-table fa-fw"></i> Data Mitra</a>
                            </li>
                            <li>
                                <a href="{{url('/TambahProduk')}}"><i class="fa fa-sitemap fa-fw"></i> Penjualan<span class="fa arrow"></span></a>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                            <a href="{{url('/pembelian')}}"><i class="fa fa-sitemap fa-fw"></i> Pembelian<span class="fa arrow"></span></a>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                            </li>

                    </div>
                </div>
            </nav>
