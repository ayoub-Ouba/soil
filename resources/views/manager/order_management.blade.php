@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Orders</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Orders</a></li>
        </ol>
    </div>
@endsection

@section('content')
@include('includes.flash')
<!--Show Validation Errors here-->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!--End showing Validation Errors here-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <!-- <th  data-priority="1" style="width: 20px;">Id</th> -->
                                <th  data-priority="1" >Id</th>
                                <th  data-priority="2" >Dropshiper  </th>
                                <th  data-priority="3" >Dropshiper Comment</th>
                                <th  data-priority="4" >Printer Dtf</th>
                                <th  data-priority="5" >Printer 2</th>
                                <th  data-priority="6" >Confirmator</th>
                                <th  data-priority="7" >Confirmator Comment 1</th>
                                <th  data-priority="8" >Confirmator Comment 2</th>
                                
                                <th  data-priority="10"  >Customer information</th>
                                <th  data-priority="9" >Status</th>
                                <!-- <th  data-priority="9"  >Number</th> -->
                                <th  data-priority="11"  >Addres</th>
                                <th  data-priority="12"  >Quantity</th>
                                <th  data-priority="13" >Total  (Dh)</th>
                                <th data-priority="14" >products </th>
                                <th  data-priority="15" >Date time</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($commandes as $commande)
                                <?php $adress=$commande->city.': '.$commande->adress;?>
                                <tr>
                                    <td><div  id="id_commande_{{$commande->id}}" value="{{$commande->id}}">{{$commande->id}}<div> </td>
                                    <td>{{$commande->user->fullName}} </td>
                                    <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell2' : '' }}">
                                        @if($commande->commentaire != null)
                                            <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_2' : '' }}">
                                                {{$commande->commentaire}} 
                                            </div>
                                        @else
                                            <div>no comment</div>
                                        @endif
                                    </td>
                                    @foreach ($users as $user)
                                     @if($user->id==$commande->id_printed1)
                                        <td>{{$user->fullName}}</td>
                                    @endif
                                    @endforeach
                                   
                                    @foreach ($users as $user)
                                     @if($user->id==$commande->id_printed2)
                                        <td>{{$user->fullName}}</td>
                                    @endif
                                    @endforeach
                                    
                                     @foreach ($users as $user)
                                     @if($user->id==$commande->id_confirmateur)
                                        <td>{{$user->fullName}}</td>
                                    @endif
                                    @endforeach
                                    <td class="{{ strlen($commande->commentaire_confirmateur1) > 28 ? 'comment-cell2' : '' }}">
                                        @if($commande->commentaire_confirmateur1 != null)
                                            <div class="{{ strlen($commande->commentaire_confirmateur1) > 28 ? 'comment_pr_2' : '' }}">
                                                {{$commande->commentaire_confirmateur1}} 
                                            </div>
                                        @else
                                            <div>no comment</div>
                                        @endif
                                    </td>
                                    <td class="{{ strlen($commande->commentaire_confirmateur2) > 28 ? 'comment-cell2' : '' }}">
                                        @if($commande->commentaire_confirmateur2 != null)
                                            <div class="{{ strlen($commande->commentaire_confirmateur2) > 28 ? 'comment_pr_2' : '' }}">
                                                {{$commande->commentaire_confirmateur2}} 
                                            </div>
                                        @else
                                            <div>no comment</div>
                                        @endif
                                    </td>
                                    <td >
                                        <div class="xyz">{{$commande->fullName}} / {{$commande->socialmedia}} / N°: {{$commande->number}}</div>
                                    </td>
                                    <script>
                                        function handleChange(commandeId, val, textarea) {
    console.log("Command ID:", commandeId);
    console.log("Selected Value:", val);
    console.log("Textarea Element:", textarea);
    
    if (val === "rejected") {
        console.log("Changing visibility...");
        textarea.style.display = "block";
    }else{
        textarea.style.display = "none";
    }
}
                                    </script>
                                    <td class="w-100">
                                        <select class="form-control " style="width:200px" id="status_{{$commande->id}}" onchange="handleChange('{{$commande->id}}',this.value,document.getElementById('commentm_{{$commande->id}}'))">
                                            <option value="shipped">Shipped</option>
                                            <option value="rejected">Rejected</option>
                                            <option value="M">M</option>
                                        </select>
                                        <textarea name="comment"  id="commentm_{{$commande->id}}"  cols="27" rows="2" placeholder="Why??"  class="textarea_hidden" ></textarea>

                                        <div class="text-center">
                                            <!-- Pass the commande ID to the handleChange() function -->
                                            <button type="button" class="btn btn-primary btn-sm mt-2" >
                                                Submit
                                            </button>
                                        </div>

                                     </td>
                                     
                                    
                                     <td>
                                        <div class="{{ strlen($adress) > 28 ? 'comment_pr_2' : '' }}">
                                            <b>{{$commande->city}}:</b> {{$commande->adress}}
                                        </div>
                                    </td>
                                   
                                    <td>{{$commande->quantite}}</td> <td>{{$commande->Total}} dh </td>
                                   
                                    
                                    <td>
                                        @foreach ($commande->produits as $produit)
                                            <div class=" d-flex justify-content-between myDIV"> 
                                                <div class=" mt-1">{{$produit->design->design_name}} / {{$produit->color}} / {{$produit->taille}} / {{$produit->type_product->type_product}} </div>
                                                
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip" >Date Order</div>
                                                    <div >{{$commande->datecommande}}</div> 
                                                </div>
                                        </div>
                                        
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip" >Date Done Order</div>
                                                    <div >{{$commande->date_done}}</div> 
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="pagination_persone">{{$commandes->links()}}</div>
                </div>
             </div>
        </div>
    </div>
    
 </div> <!-- end col -->
</div> <!-- end row -->



@endsection

@section('script')
<!-- Responsive-table-->

@endsection


