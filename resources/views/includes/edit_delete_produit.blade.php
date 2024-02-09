<?php $state = array("admin", "confirmateur","manager","printer");?>
<!-- Edit -->
@isset($commande)
    

@isset($produit)

<div class="modal fade" id="editP{{$produit->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title"><b><span class="employee_id">Edit Product</span></b></h4>
            <div class="modal-body text-left">
                <form class="form-horizontal" method="POST" action="{{ route('produit.update', $produit->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <select class="form-control" name="color" id="color">
                            <option value="black" {{ $produit->color == 'black' ? 'selected' : '' }}>Black</option>
                            <option value="white" {{ $produit->color == 'white' ? 'selected' : '' }}>White</option>
                        </select>
                    </div>
                    @php
                        $T=["S","M","L","XL","XXL"];
                    @endphp
                        
                    <div class="form-group">
                        
                        <label for="taille">Size</label>
                        <select class="form-control" name="taille" id="taille">
                            @foreach ($T as $t)
                                @if($t == $produit->taille)
                                    <option value={{$t}} selected>{{$t}}</option>
                                @else
                                    <option value={{$t}}>{{$t}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" id="type">
                            @foreach ($types_produits as $type)
                                @if($type->id == $produit->id_type)
                                    <option value="{{$type->id}}" selected>{{$type->type_product}}</option>
                                @else
                                    <option value="{{$type->id}}">{{$type->type_product}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="design">Design</label>
                        <select class="form-control" name="design" id="design">
                            @foreach ($designs as $design)
                                @if($design->id == $produit->id_design)
                                    <option value="{{$design->id}}" selected>{{$design->design_name}}</option>
                                @else
                                <option value="{{$design->id}}">{{$design->design_name}}</option>
                                @endif
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
<div class="modal fade" id="deleteP{{ $produit->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="align-items: center">
              <h4 class="modal-title "><span class="employee_id">Delete Product</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('produit.destroy', $produit->id ) }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_employee_name">This Product</h2>
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
@endisset