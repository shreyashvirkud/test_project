
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Project</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- template css -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins/select2/select2-bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('template/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template/css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet">

    <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element">
                                <img alt="image" class="rounded-circle" src="{{ asset('template/img/profile_small.jpg') }}"/>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="block m-t-xs font-bold">{{ auth()->user()->name }}</span>
                                    <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                    <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                    <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                        <form action="{{ route('logout') }}" id="logout-form" method="post">@csrf</form>


                                        
                                    
                                    
                                    </li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                IN+
                            </div>
                        </li>
                        @can('user-list')
                        <li>
                            <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span class="nav-label">Manage Users</span>
                            </a>
                        </li>
                        @endcan
                        @can('role-list')
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                        @endcan
                        @can('designation-list')
                        <li><a class="nav-link" href="{{ route('designations.index') }}">Manage Designation</a></li>
                        @endcan
                        @can('candidate-list')
                        <li><a class="nav-link" href="{{ route('candidates.index') }}">Manage Candidates</a></li>
                        @endcan

                    </ul>
    
                </div>
            </nav>
    
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                </nav>
                </div>
                        <div class="row  border-bottom white-bg dashboard-header">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                    </div>
                    
                    <div class="footer">
                        <div class="float-right">
                            10GB of <strong>250GB</strong> Free.
                        </div>
                        <div>
                            <strong>Copyright</strong> Example Company &copy; 2014-2019
                        </div>
                    </div>
                </div>
        </div>

        
        <!-- Toast notification -->

    
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('template/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('template/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('template/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('template/js/inspinia.js') }}"></script>
    <script src="{{ asset('template/js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('template/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('template/js/plugins/select2/select2.full.min.js') }}"></script>

    <!-- Clock picker -->
    <script src="{{ asset('template/js/plugins/clockpicker/clockpicker.js') }}"></script>
   

    <!-- Toastr -->
    <script src="{{ asset('template/js/plugins/toastr/toastr.min.js') }}"></script>

<script>
    
    $(document).ready(function(){
       
        $(".select2_demo_3").select2({
                theme: 'bootstrap4',
                placeholder: "Select a TL",
                allowClear: true
            });
            $(".select2_status").select2({
                theme: 'bootstrap4',
                placeholder: "Select a Status",
                allowClear: true
            });
            $(".select2_designation").select2({
                theme: 'bootstrap4',
                placeholder: "Select a Designation",
                allowClear: true
            });
        
        
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

</script>
    
                
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.3/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jan 2021 11:57:34 GMT -->
</html>