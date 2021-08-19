<!DOCTYPE html>
<html lang='en'>


  <head>
    <meta charset='utf-8' />
    <link href="{{ asset('fullcalendar-scheduler/lib/main.css')}}" rel='stylesheet'/>
    <script src="{{ asset('bootstrap-4.0.0/dist/js/jquery-3.0.0.slim.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap-4.0.0/dist/css/bootstrap.min.css')}}"/>
    <script src="{{ asset('fullcalendar-scheduler/lib/main.min.js')}}"></script>
    <script src="{{ asset('bootstrap-4.0.0/dist/js/bootstrap.min.js')}}"></script>
    
    
        <script>
        <?php
    $resources = isset($resources) ? $resources : [];
    $type = isset($type) ? $type : '';
?>;
        var resources = <?php echo $resources; ?>;
        var type = '<?php echo $type ?>';
        var newResources = [];
        resources.forEach((e,i)=> {
            newResources[i] = {
                id: e.id,
                title: e.name
            }
        })
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          
    selectable: true,
    initialView: 'resourceTimelineWeek',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'resourceTimelineWeek,timeGridDay'
    },
    
    
    resources: 
    newResources,
    dateClick: function(info) {
      alert('selected ' + info.dateStr + ' on resource ' + info.resource.id + 'name'+ info.resource.title);
    },

    resources: 
    newResources,
    dateClick: function(info) {
      alert('clicked ' + info.dateStr + ' on resource ' + info.resource.id + 'name'+ info.resource.title);
    },
    select: function(info) {
      $('#title').html(info.resource.title);
      $('#user').val(info.user);
      $('#type').val(type);
      $('#sportFieldId').val(info.resource.id);
      $('#startTime').val(info.startStr);
      $('#endTime').val(info.endStr);
      $('#name').val(info.resource.title);
      $('#startTime').val(info.startStr);
      $('#endTime').val(info.endStr);
      $("#exampleModal").modal('show');
     alert('selected ' + info.startStr + ' to ' + info.endStr + ' on resource ' + info.resource.id+ 'name'+ info.resource.title);
    }
  });
  
  calendar.render();
});
    </script>
  </head>
  <body>
  @if (isset($message))
<div class="alert alert-primary" role="alert">
  {{$message}}
</div>
@endif
<form action = "/scheduleA" method = "post">
      <br><p><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<select name="id" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
 @if(count($dropdown) > 0)
    @foreach($dropdown as $row)
    <option value="{{$row->id}}"> {{$row->name}}</option>
     @endforeach
 @endif 
</select>
<input name="type" type ='text' value = "{{$type}}"/>
<input type = 'submit' value = "Select Location"/>
</form>
    <div id='calendar'></div>
   
   
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action = "/schedule/store" method = "post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
      <table>
      <tr>
      <td>User</td>
      <td><input id="user" type='text' name='users_id' /></td>
      </tr>
      <tr>
      <td>Court</td>
      <td><input id="name" type='text' name='name' /></td>
      </tr>
      <tr>
      <tr>
      <td>Sport_field_id</td>
      <td><input id="sportFieldId" type='text' name='sport_field_id' /></td>
      </tr>
      <tr>
        <td>Sport Types</td>
        <td><input id="type" type='text' name='type' /></td>
        </tr>
      <tr>
      <td>Start_time</td>
      <td><input id="startTime"type='text' name='start_date' /></td>
      </tr>
      <tr>
      <td>End_time</td>
      <td><input id="endTime" type='text' name='end_date' /></td>
      </tr>
      <td colspan = '2'>
      <input type = 'submit' value = "Add student"/>
    </td>
    </tr>
    </table>
</form>
      </div>
     

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  </body>
</html>