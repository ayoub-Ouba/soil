<?php $state = array("admin", "confirmateur","manager","printer");?>
<!-- Edit -->
@isset($commande)

{{-- {{ list($socialmediaType, $socialmediaValue) = explode(" : ", $commande->socialmedia);}} --}}

<div class="modal fade" id="edit{{ $commande->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b><span class="employee_id">Edit Order</span></b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('orders.update', $commande->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="full_name" class="control-label">Client Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{$commande->fullName}}" required>
                    </div>
                    <?php
                        $SM = explode(" : ", $commande->socialmedia, 2);
                    ?>
                    <div class="form-group">
                        <label for="socialmedia">Social media</label>
                        <select class="form-control" name="socialmedia" id="socialmedia">
                            <option value="Facebook" {{($SM[0]=="Facebook")?'selected':''}}>Facebook</option>
                            <option value="Instagram" {{($SM[0]=="Instagram")?'selected':''}}>Instagram</option>
                            <option value="Snapchat" {{($SM[0]=="Snapchat")?'selected':''}}>Snapchat</option>
                            <option value="TikTok" {{($SM[0]=="TikTok")?'selected':''}}>TIKtok</option>
                        </select>
                        <input type="text" class="form-control" id="socialmediaV" name="socialmediaV" value="{{$SM[1]}}" required />
                    </div>
                    <div class="form-group">
                        <label for="number" class="control-label">Phone Number</label>
                        <input type="tel" class="form-control" id="number" name="number" value="{{$commande->number}}" required>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" value="{{$commande->city}}" id="city" name="city" required />
                    </div>

                    <div class="form-group">
                        <label for="adresse">Address</label>
                        <input type="text" class="form-control" value="{{$commande->adress}}" id="adresse" name="adresse" required />
                    </div>

                    <div class="form-group">
                        <label for="total">Total Amount</label>
                        <input type="number" class="form-control" value="{{$commande->Total}}" id="total" name="total" required />
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" class="form-control" id="comment" cols="30" rows="5" >{{$commande->commentaire}}</textarea>
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
              <h4 class="modal-title "><span class="employee_id">Delete Order</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('orders.destroy', $commande->id ) }}">
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