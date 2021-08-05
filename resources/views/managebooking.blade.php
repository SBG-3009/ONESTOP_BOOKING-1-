<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .th-action{
            width: 180px;
        }
        </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Court Badminton<sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/managebooking" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manage Booking</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <?php if(isset($message)) { ?>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="alert alert-primary" role="alert">
                                {{$message}}
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="mt-3 mb-2">
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                            <th>Court ID</th>
                                                            <th>Court Name</th>
                                                            <th>Location</th>
                                                            <th>Price</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Sport Type</th>
                                                            <th class="th-action">Actions</th>
                                                </tr>
                                            </thead>
                                           
                                            <tbody>
                                                 @foreach($bookings as $booking)
                                                    <tr>
                                                            <td>{{$booking['id']}}</td>
                                                            <td>{{$booking['name']}}</td>
                                                            <td>
                                                               
                                                            </td>
                                                            <td>{{$booking['price']}}</td>
                                                            <td>{{$booking['start_time']}}</td>
                                                            <td>{{$booking['end_time']}}</td>
                                                            <td>{{$booking['sport_types']}}</td>
                                                            <?php
                                                                $startTime = date('c',strtotime($booking->start_time));
                                                                $startTime = substr($startTime, 0, -9);
                                                                $endTime= date('c',strtotime($booking->end_time));
                                                                $endTime = substr($endTime, 0, -9);
                                                            ?>
                                                        <td>
                                                             <a data-info="{{$booking}}"
                                                             data-id="{{$booking->id}}"
                                                             data-start-time="{{$startTime}}"
                                                             data-end-time="{{$endTime}}"
                                                             data-toggle="modal"
                                                             data-target="#editBooking"
                                                             class="btn btn-info btn-circle edit-button">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a
                                                             data-info="{{$booking}}"
                                                             data-toggle="modal"
                                                             data-target="#deleteCourt"
                                                             class="btn btn-danger btn-circle">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

     <!-- Update Modal-->
    <div class="modal fade" id="editBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                   <form id="editForm" method="POST" action="/court/1">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Court</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Court Locations</label>
                            <select name="sport_location_id" id="editSportLocationId" class="custom-select" required>
                                <option value="">Select Court Locations</option>
                            </select>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                              <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type = "hidden" id="updateId" name="id">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="editName" aria-describedby="nameHelp" placeholder="Enter Name">
                            <small id="nameHelp" class="form-text text-muted">Court Name</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Descriptions</label>
                            <input type="text" class="form-control" name="description" id="editDescription" placeholder="Descriptions">
                        </div>
                       <div class="form-group">
                            <label for="price">Price Hourly</label>
                            <input type="text" class="form-control" name="price" id="editPrice" placeholder="Descriptions">
                        </div>
                        <div class="form-group">
                            <label for="editStartime">Start Time</label>
                            <input type="datetime-local" class="form-control" name="start_time" id="editStartTime">
                        </div>
                        <div class="form-group">
                            <label for="editEndtime">End Time</label>
                            <input type="datetime-local" class="form-control" name="end_time" id="editEndTime">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                 </form>
            </div>
        </div>
    </div>



      <!-- Delete Modal-->
    <div class="modal fade" id="deleteCourt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remove Court</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are You Sure You Want To Remove Court <div id="removeMessage"></div></div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="/court/1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
                    <button type="submit" id="deleteButton" class="btn btn-primary delete-button">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>


<style>
.form-control.bg-light{
    pointer-events: none;
}
</style>

<script>
    $(document).ready(function(){
        var editId = '';
        $('.edit-button').click(function(){
            var info = $(this).data('info');
            editId = info.id;
            document.getElementById('editForm').action = '/court/'+ editId;
            var startTime = $(this).data('start-time');
            var endTime = $(this).data('end-time');
            $('#editSportLocationId').val(info.sport_location_id);
            $('#editName').val(info.name);
            $('#editDescription').val(info.description);
            $('#editPrice').val(info.price);
            $('#editStartTime').val(startTime);
            $('#editEndTime').val(endTime);
        });

        $('#editStartTime').on('event',function(){
                var value = $(this).val();
                console.log(value)

        });

        $('.view-button').click(function(){
            var info = $(this).data('info');
            editId = info.id;
            var startTime = $(this).data('start-time');
            var endTime = $(this).data('end-time');
            $('#viewSportLocationId').html(info.sports_location_id);
            $('#viewSportLocation').html(info.sports_location.name);
            $('#viewName').html(info.name);
            $('#viewDescription').html(info.description);
            $('#viewPrice').html(info.price);
            $('#viewStartTime').html(startTime);
            $('#viewEndTime').html(endTime);
        });

        $('.btn-danger').click(function(){
            var info = $(this).data('info');
            $('#removeMessage').html(''+ info.name);
            document.getElementById('deleteForm').action = '/court/'+ info.id;
        });
    });
</script>
</body>

</html>
