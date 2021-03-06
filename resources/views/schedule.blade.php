<!DOCTYPE html>
<html lang='en'>


<head>
    <meta charset='utf-8' />
    <link href="{{ asset('fullcalendar-scheduler/lib/main.css') }}" rel='stylesheet' />
    <script src="{{ asset('bootstrap-4.0.0/dist/js/jquery-3.0.0.slim.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.0.0/dist/css/bootstrap.min.css') }}" />
    <script src="{{ asset('fullcalendar-scheduler/lib/main.min.js') }}"></script>
    <script src="{{ asset('bootstrap-4.0.0/dist/js/bootstrap.min.js') }}"></script>

    <style>
        body {
            background: linear-gradient(to bottom, #F1F2B5 0%, #135058 100%);
        }
    </style>
    <script>
        <?php
        $resources = isset($resources) ? $resources : [];
        $type = isset($type) ? $type : '';
        ?>;
        var resources = <?php echo $resources; ?>;
        var type = '<?php echo $type; ?>';
        var newResources = [];
        // console.log('resourcess', resources);
        resources.forEach((e, i) => {
            // console.log('e', e);

            newResources[i] = {
                id: e.id,
                title: e.name
            }
        })

        function getRow(id){
            return resources.find((e) => id == e.id);
        }

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
                resources: newResources,
                events: [
                {
                    resourceId:'28',
                    start: '2021-08-22T12:00:00+08:00',
                    end: '2021-08-22T13:00:00+08:00',
                    display: 'background', title:'Booked',
                },
                {
                    resourceId:'28',
                    start: '2021-08-22T14:00:00+08:00',
                    end: '2021-08-22T16:00:00+08:00',
                    display: 'background', title:'Booked',
                }
            ],
                // dateClick: function(info) {
                //     alert('selected ' + info.dateStr + ' on resource ' + info.resource.id + 'name' +
                //     '     Price'+ info.resource.price + '    Title:'+info.resource.title);

                // },
                resources: newResources,
                dateClick: function(info) {
                    // alert('clicked ' + info.dateStr + ' on resource ' + info.resource.id + 'name' + 
                    // '     Price'+ info.resource.price + '    Title:'+
                    //     info.resource.title);
                    // console.log('71 info', info);

                    var getObj = getRow(info.resource.id);
                    // console.log(getObj);
                },
                select: function(info) {
                    var getObj = getRow(info.resource.id);
                    var dateStart = new Date(info.startStr);
                        var dateEnd = new Date(info.endStr);
                        var hours = Math.floor(Math.abs(dateEnd-dateStart) / (60 * 60 * 1000))
                         console.log('hours', hours);
                        var dateStart = new Date(info.startStr);
                        var dateEnd = new Date(info.endStr);
                      console.log(dateEnd - dateStart);

                    var price = getObj.price * hours;
                    $('#title').html(info.resource.title);
                    $('#user').val(info.user);
                    $('#type').val(type);
                    $('#sportFieldId').val(info.resource.id);
                    $('#total').val(price);
                    $('#startTime').val(info.startStr);
                    $('#endTime').val(info.endStr);
                    $('#name').val(info.resource.title);
                    $('#startTime').val(info.startStr);
                    $('#endTime').val(info.endStr);
                    $("#exampleModal").modal('show');
                    // alert('selected ' + info.startStr + ' to ' + info.endStr + ' on resource ' + info
                    //     .resource.id + 'name' + info.resource.title);
                    // var hours = Math.abs(info.endStr-info.startStr) / 36e5;
                        
                }
            });
            calendar.render();
        });
    </script>
</head>

<body>

<a class="btn btn-info" href="{{ route('logout') }}"
onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
 {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

    @if (isset($message))
        <div class="alert alert-primary" role="alert">
            {{ $message }}
        </div>
    @endif
    <form action="/scheduleA" method="post">
        <br>
        <p><input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <select name="id" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @if (count($dropdown) > 0)
                    @foreach ($dropdown as $row)
                        <option value="{{ $row->id }}"> {{ $row->name }}</option>
                    @endforeach
                @endif
            </select>
            <input name="type" type="hidden" value="{{ $type }}" />
            <input type='submit' value="Select Location" />
    </form>
    <div id='calendar'></div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="/schedule/store" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name='users_id' value="{{Auth::user()->id}}"/>
                        <input id="sportFieldId" type='hidden' name='sport_field_id' />
                        <table>
                            <tr>
                                <td>Court</td>
                                <td><input id="name" type='text' name='name' /></td>
                            </tr>
                            <tr>
                                <td>Sport Types</td>
                                <td><input id="type" type='text' name='type' /></td>
                            </tr>
                            <tr>
                                <td>Start_time</td>
                                <td><input id="startTime" type='text' name='start_date' /></td>
                            </tr>
                            <tr>
                                <td>End_time</td>
                                <td><input id="endTime" type='text' name='end_date' /></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input id="total" type='text' name='total' /></td>
                            </tr>
                            <td colspan='2'>
                                <input type='submit' value="Book Now"/>
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
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
