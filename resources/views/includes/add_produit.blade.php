<!-- Add -->
{{-- @isset($commande --}}
    

<div class="modal fade" id="addnewP{{ $commande->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <h4 class="modal-title"><b>Add produit</b></h4>
            <span id="commandeIdPlaceholder"></span>            
            <div class="modal-body">{{ $commande->id }}

                <div class="card-body text-left">

                    <form method="POST" action="produit/{{$commande->id}}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="color">Color</label>
                            <select class="form-control" name="color" id="color">
                                <option value="black">Black</option>
                                <option value="white">White</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="taille">Taille</label>
                            <select class="form-control" name="taille" id="taille">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXl</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="type">
                                @foreach ($types_produits as $type)
                                    <option value="{{$type->id}}">{{$type->type_product}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="design">Designs</label>
                            <select class="form-control" name="design" id="design">
                                @foreach ($designs as $design)
                                    <option value="{{$design->id}}">{{$design->design_name}}</option>
                                @endforeach
                            </select>
                        </div> 
                        
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- @endisset --}}