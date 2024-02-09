<?php $state = array("admin", "confirmateur","manager","printer1" ,"printer2","dropshiper");?>
<!-- Edit -->
<div class="modal fade" id="edit{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b><span class="employee_id">Edit User</span></b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="fullname" class="col-sm-3 control-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullName }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="number" class="col-sm-3 control-label">Number</label>
                        <input type="text" class="form-control" id="number" name="number"
                            value="{{ $user->Number }}"  maxlength="10">
                    </div>
                    <div class="form-group">
                            <label for="user_rol">State</label>
                            <select class="form-control" name="user_role" id="user_rol">
                                @foreach($state as $st)
                                    <option {{ ($user->state == $st)? 'selected' : ''}} > {{$st}}</option>
                                @endforeach
                            </select>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
                    Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
              <h4 class="modal-title "><span class="employee_id">Delete User</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('users.destroy', $user->id) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{$user->fullName}}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
