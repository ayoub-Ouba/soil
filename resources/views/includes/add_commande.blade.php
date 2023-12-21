<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <h4 class="modal-title"><b>Add commande</b></h4>
            <div class="modal-body">

                <div class="card-body text-left">

                    <form method="POST" action="{{ route('commande.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Order Name</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name" id="full_name" name="full_name" required />
                        </div>

                        <div class="form-group">
                            <label for="number">Number Customer</label>
                            <input type="tel" class="form-control" placeholder="Enter Number" id="number" name="number" required />
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" placeholder="Enter Adresse" id="adresse" name="adresse" required />
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" placeholder="Enter City" id="city" name="city" required />
                        </div>

                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" class="form-control" placeholder="Enter Total" id="total" name="total" required />
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <input type="text" class="form-control" placeholder="Enter Comment" id="comment" name="comment" required />
                        </div>
                    <!-- 
                        <div class="form-group">
                            <label for="quantite">Quantite</label>
                            <input type="number" class="form-control" placeholder="Enter Quantite" id="quantite" name="quantite" required />
                        </div> -->

                        <div class="form-group">
                            <label for="socialmedia">Social media</label>
                            <input type="text" class="form-control" placeholder="Enter Social media" id="socialmedia" name="socialmedia" required />
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