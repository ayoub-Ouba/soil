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

                    <form method="POST" action="{{ route('design.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="design_name">Design Name</label>
                            <input type="text" class="form-control" placeholder="Enter Design Name" id="design_name" name="design_name"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="design_front" class="control-label">Front Design</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_front" accept="application/pdf,image/png"  name="design_front" required>
                                <label class="custom-file-label" for="customFileLang" >Select Your Design</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="design_back" class="control-label">Back Design</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_back" accept="application/pdf,image/png" lang="es" name="design_back">
                                <label class="custom-file-label" for="customFileLang">Select Your Design</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="design_3" class="control-label">Design 3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_3" accept="application/pdf,image/png" lang="es" name="design_3">
                                <label class="custom-file-label" for="customFileLang">Select Your Design</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="design_4" class="control-label">Design 4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="design_4" accept="application/pdf,image/png" lang="es" name="design_4">
                                <label class="custom-file-label" for="customFileLang">Select Your Design</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="version_design">Version Design</label>
                            <select class="form-control" name="version_design" id="version_design">
                                <option value="black">Black</option>
                                <option value="white">White</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Add
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