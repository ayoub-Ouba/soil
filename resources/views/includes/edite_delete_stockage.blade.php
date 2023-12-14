<?php $state = array("admin", "confirmateur","manager","printer");?>
<!-- Edit -->
<div class="modal fade" id="edit{{$st->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b><span class="employee_id">Edit Storage</span></b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('Stockage.update', $st->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                            <label for="user_rol">State</label>
                            <select class="form-control" name="type_produit">
                                @foreach($types_products as $tp)
                                    <option {{$tp->id==$st->id_produit?'selected':''}} value="{{$tp->id}}">{{$tp->type_product}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="color">Color </label>
                        <input type="text" class="form-control"  id="color" name="color" value="{{$st->color}}"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="size">Size </label>
                        <input type="text" class="form-control"  id="size" name="size" value="{{$st->size}}"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock </label>
                        <input type="text" class="form-control" id="stock" name="stock" value="{{$st->Stock}}"
                            required />
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
<div class="modal fade" id="delete{{ $st->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
              <h4 class="modal-title "><span class="employee_id">Delete Product Type</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('Stockage.destroy', $st->id ) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">this storage</h2>
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
