<div class="main-grid">
            <div class="agile-grids">
                <div class="table-heading">
                    <h2>Add Court</h2>
                </div>
                <!-- Form start Start -->
                <div class="panel panel-widget forms-panel">
                    <div class="forms" >
                        <div class=" form-grids form-grids-right">
                            <div class="widget-shadow " data-example-id="basic-forms">
                                <div class="form-title">
                                    <h4 class="text-center">Add Court Information:</h4>
                                </div>
                                <div class="form-body">
                                    <form class="form-horizontal" method="POST" action="{!! route('SportField.edit',$SportField->id) !!}" id="">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Court Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" id="name" value="{{$SportField->name}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="price" class="form-control" id="name" value="{{$SportField->gpice}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Location</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sports_location_id" class="form-control" id="name" value="{{$SportField->category}}" required>
                                            </div>
                                        </div>
            
                                        <br>
                                        <input class="btn btn-primary" type="submit" value="Update">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>