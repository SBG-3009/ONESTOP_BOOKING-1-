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

       <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="mt-3 mb-2">
                <button data-toggle="modal" data-target="#createCourt" class="btn btn-info text-align-right">Create New Court</button>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                             @foreach($courts as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->sportsLocation->name }}</td>
                                        <?php
                                            $startTime = date('c',strtotime($row->start_time));
                                            $startTime = substr($startTime, 0, -9);
                                            $endTime= date('c',strtotime($row->end_time));
                                            $endTime = substr($endTime, 0, -9);
                                        ?>
                                    <td>
                                        <a
                                         data-info="{{$row}}"
                                         data-id="{{$row->id}}"
                                         data-start-time="{{$startTime}}"
                                         data-end-time="{{$endTime}}"
                                         data-toggle="modal"
                                         data-target="#viewCourt"
                                         class="btn btn-success btn-circle view-button">
                                            <i class="fas fa-file"></i>
                                        </a>

                                         <a data-info="{{$row}}"
                                         data-id="{{$row->id}}"
                                         data-start-time="{{$startTime}}"
                                         data-end-time="{{$endTime}}"
                                         data-toggle="modal"
                                         data-target="#editCourt"
                                         class="btn btn-info btn-circle edit-button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a
                                         data-info="{{$row}}"
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
@endsection


@section('modal')


     <!-- Create Modal-->
     <div class="modal fade" id="createCourt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
                <form method="post" action="/court">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Create Court</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                 <div class="form-group">
                         <label for="exampleInputEmail1">Court Locations</label>
                         <select name="sport_location_id" class="custom-select" required>
                             <option value="">Select Court Locations</option>
                              @foreach($sportsLocation as $row)
                                 <option value="{{$row->id}}"> {{$row->name}} </option>
                             @endforeach
                         </select>
                         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                     </div>
                     <div class="form-group">
                         <label for="name">Name</label>
                         <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                         <small id="nameHelp" class="form-text text-muted">Court Name</small>
                     </div>
                     <div class="form-group">
                         <label for="description">Description</label>
                         <input type="text" class="form-control" name="description" id="description" placeholder="Descriptions">
                     </div>
                    <div class="form-group">
                         <label for="price">Price</label>
                         <input type="text" class="form-control" name="price" id="price" placeholder="Enter a Price">
                     </div>
                     <div class="form-group">
                         <label for="startTime">Start Time</label>
                         <input type="datetime-local" class="form-control" name="start_time" id="startTime">
                     </div>
                     <div class="form-group">
                         <label for="endTime">End Time</label>
                         <input type="datetime-local" class="form-control" name="end_time" id="endTime">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
                     <button type="submit" class="btn btn-primary">Create</button>
                 </div>
              </form>
         </div>
     </div>
 </div>

  <!-- Update Modal-->
 <div class="modal fade" id="editCourt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                              @foreach($sportsLocation as $row)
                                 <option value="{{$row->id}}"> {{$row->name}} </option>
                             @endforeach
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


  <!-- View Modal-->
 <div class="modal fade" id="viewCourt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">View Court</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Court Locations</label>
                         <div id="viewSportLocation" class="form-control bg-light" disabled ></div>
                     </div>
                     <div class="form-group">
                         <label for="name">Name</label>
                         <div id="viewName" class="form-control bg-light" ></div>
                     </div>
                     <div class="form-group">
                         <label for="description">Descriptions</label>
                         <div id="viewDescription" class="form-control bg-light" ></div>
                     </div>
                    <div class="form-group">
                         <label for="priceHourly">Price Hourly</label>
                         <div id="viewPrice" class="form-control bg-light" ></div>
                     </div>
                     <div class="form-group">
                         <label for="startTime">Starting Hour</label>
                         <div id="viewStartTime" class="form-control bg-light" ></div>
                     </div>
                     <div class="form-group">
                         <label for="end_time">Ending Hour</label>
                         <div id="viewEndTime" class="form-control bg-light" ></div>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" data-dismiss="modal" class="btn btn-primary">Back</button>
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
@endsection
