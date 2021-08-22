@extends('layouts.dashboard')
@section('message')
<?php if(isset($message)) { ?>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>
        </div>
    </div>
    <?php } ?>
@endsection
@section('content')
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
                            <th>Book ID</th>
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
                                    <td>{{$booking->id}}</td>
                                    <td>{{$booking->sportField->name}}</td>
                                    <td>{{$booking->sportField->sportsLocation->name}}</td>
                                    <td>{{$booking->sportField->price}}</td>
                                    <td>{{$booking->start_date}}</td>
                                    <td>{{$booking->end_date}}</td>
                                    <td>{{$booking->sportField->sportsLocation->sport_types}}</td>
                                    <?php
                                        $startTime = date('c',strtotime($booking->start_time));
                                        $startTime = substr($startTime, 0, -9);
                                        $endTime= date('c',strtotime($booking->end_time));
                                        $endTime = substr($endTime, 0, -9);
                                    ?>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('modal')

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
                   <form id="editForm" method="POST" action="/booking/1">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Booking</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="test"></div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Court Locations</label>
                            <select name="sport_field_id"  id="editSportFieldId" class="custom-select" required>
                                <option value="">Select Sport Field</option>
                                 @foreach($sportFields as $row)
                                    <option value="{{$row->id}}"> {{$row->name}} </option>
                                @endforeach
                            </select>
                              <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type = "text" id="updateId" name="id">
                        </div>

                        <div class="form-group">
                            <label for="editStartime">Start Date</label>
                            <input type="datetime-local" class="form-control" name="start_date" id="editStartDate">
                        </div>
                        <div class="form-group">
                            <label for="editEndtime">End Date</label>
                            <input type="datetime-local" class="form-control" name="end_date" id="editEndDate">
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
                <div class="modal-body">Are You Sure You Want To Remove Booking <div id="removeMessage"></div></div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="/booking/1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
                    <button type="submit" id="deleteButton" class="btn btn-primary delete-button">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')

    <style>
    .form-control.bg-light{
        pointer-events: none;
}
    </style>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            var editId = '';

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
        });

    </script>
@endsection
