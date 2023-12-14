<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <h4 class="modal-title"><b>Add Design</b></h4>
            <div class="modal-body">

                <div class="card-body text-left">

                    <form method="POST" action="{{ route('Stockage.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="user_rol">Type of Product</label>
                            <select class="form-control" name="type_produit">
                                @foreach($types_products as $tp)
                                    <option value="{{$tp->id}}">{{$tp->type_product}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color">Color </label>
                            <input type="text" class="form-control"  id="color" name="color"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="size">Size </label>
                            <select  name="size" class="form-control">
                                <option value="S">S</option><option value="M">M</option>
                                <option value="L">L</option><option value="XL">XL</option><option value="XXL">XXL</option>
                               
                            </select>

                            
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock </label>
                            <input type="text" class="form-control" id="stock" name="stock"
                                required />
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