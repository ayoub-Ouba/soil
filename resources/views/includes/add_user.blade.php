<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h4 class="modal-title"><b>Add User</b></h4>
           
            <div class="modal-body">
                <div class="card-body text-left">
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                    <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                 />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  id="email" name="email"
                                 />
                        </div>
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text" class="form-control"  id="number" name="number" maxlength='10'
                                 />
                        </div>
                        <div class="form-group">
                            <label for="user_rol">State</label>
                            <select class="form-control" name="user_role" id="user_rol">
                                <option value="admin">Admin</option>
                                <option value="confirmateur">Confirmator</option>
                                <option value="manager">Manager</option>
                                <option value="dropshiper">Dropshiper</option>
                                <option value="printer1">printer 1</option>
                                <option value="printer2">printer 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control"  id="pass" name="password" 
                                 />
                        </div>
                        <div class="form-group">
                            <label for="cpass">Confirmation Password</label>
                            <input type="password" class="form-control"  id="cpass" name="password_confirmation" />
                        </div>
                        <div class="form-group ">
                            <label for="photo_profile">photo_profile</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo_profile"  name="photo_profile">
                                <label class="custom-file-label" for="customFileLang">Select photo</label>
                            </div>
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