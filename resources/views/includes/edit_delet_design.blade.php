<?php $state = array("admin", "confirmateur","manager","printer");?>
<!-- Edit -->
<div class="modal fade" id="edit{{ $design->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b><span class="employee_id">Edit Design</span></b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('design.update', $design->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="design_name" class="col-sm-3 control-label">Design Name</label>
                        <input type="text" class="form-control" id="design_name" name="design_name" value="{{ $design->design_name }}"
                            required>
                    </div>
                    <div class="form-group">
                            <label for="design_front" class="control-label">Design Front</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_front"  name="design_front" value="{{ $design->design_front }}">
                                <label class="custom-file-label" for="customFileLang">Select Your Design</label>
                            </div>
                            @if($design->design_front!=null)
                            <div class="text-left">
                                <img src="{{ asset('images/' . $design->design_front)}}" alt="__" class="image" style="width:30%;height:100px" >
                            </div>
                            @else 
                            <div class="d-none"></div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="design_back" class="control-label">Design Back</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_back" lang="es" name="design_back" value="{{ $design->design_back }}">
                                <label class="custom-file-label" for="customFileLang">Select Your Design</label>
                            </div>
                            @if($design->design_back!=null)
                            <div class="text-left">
                                <img src="{{ asset('images/' . $design->design_back)}}" alt="__" class="image" style="width:30%;height:100px" >
                            </div>
                            @else 
                            <div class="d-none"></div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="design_3" class="control-label">Design 3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_3" lang="es" name="design_3" value="{{ $design->design_3 }}">
                                <label class="custom-file-label" for="customFileLang">Select Your Design</label>
                            </div>
                            @if($design->design_3!=null)
                            <div class="text-left">
                                <img src="{{ asset('images/' . $design->design_3)}}" alt="__" class="image" style="width:30%;height:100px" >
                            </div>
                            @else 
                            <div class="d-none"></div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="design_4" class="control-label">Design 4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_4" lang="es" name="design_4" value="{{ $design->design_4 }}">
                                <label class="custom-file-label" for="customFileLang">Select Your Design</label>
                            </div>
                            @if($design->design_4!=null)
                            <div class="text-left">
                                <img src="{{ asset('images/' . $design->design_4)}}" alt="__" class="image" style="width:30%;height:100px" >
                            </div>
                            @else 
                            <div class="d-none"></div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="version_design">Version Design</label>
                            <select class="form-control" name="version_design" id="version_design">
                                <option value="black" {{ $design->version_design == 'black' ? 'selected' : '' }}>Black</option>
                                <option value="white" {{ $design->version_design == 'white' ? 'selected' : '' }}>White</option>
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
<div class="modal fade" id="delete{{ $design->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
              <h4 class="modal-title "><span class="employee_id">Delete User</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('design.destroy', $design->id ) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{$design->design_name}}</h2>
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
