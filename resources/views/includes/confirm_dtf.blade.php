
<div class="modal fade" id="confirm_dtf{{ $produit->id }}">
 <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header " style="align-items: center">
              <h4 class="modal-title "><span class="employee_id">Print Product</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <form  action="{{'printed1/'. $produit->id }}" method="POST">
                 @csrf
                <div class="text-center">
                    <h6>Are you sure you print the product</h6>

                </div>
           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> No</button>
                <button type="submit" class="btn btn-success btn-flat"></i> Yes</button>
                </form>
            </div>
        </div>
    </div>    
    </div>



