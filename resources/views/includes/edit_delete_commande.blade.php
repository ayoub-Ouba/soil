<?php $state = array("admin", "confirmateur","manager","printer");?>
<!-- Edit -->
@isset($commande)
    

<div class="modal fade" id="edit{{ $commande->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b><span class="employee_id">Edit Commande</span></b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('commande.update', $commande->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="full_name" class="col-sm-3 control-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{$commande->fullName}}" required>
                    </div>

                    <div class="form-group">
                        <label for="number" class="col-sm-3 control-label">Number</label>
                        <input type="tel" class="form-control" id="number" name="number" value="{{$commande->number}}" required>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" value="{{$commande->adress}}" id="adresse" name="adresse" required />
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" value="{{$commande->city}}" id="city" name="city" required />
                    </div>

                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" value="{{$commande->Total}}" id="total" name="total" required />
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="text" class="form-control" value="{{$commande->comment}}" id="comment" name="comment" required />
                    </div>

                    <div class="form-group">
                        <label for="quantite">Quantite</label>
                        <input type="number" class="form-control" value="{{$commande->quantite}}" id="quantite" name="quantite" required />
                    </div>

                    <div class="form-group">
                        <label for="socialmedia">Social media</label>
                        <input type="text" class="form-control" value="{{$commande->socialmedia}}" id="socialmedia" name="socialmedia" required />
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
<div class="modal fade" id="delete{{ $commande->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
              <h4 class="modal-title "><span class="employee_id">Delete Commande</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('commande.destroy', $commande->id ) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">{{$commande->fullName}}</h2>
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
@endisset