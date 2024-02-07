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
@section('button')
    <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add</a>
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
                                <th  data-priority="1" >ID</th>
                                <th  data-priority="2" >Client Name </th>
                                <th  data-priority="3"  style="width: 50px;" >Phone</th>
                                <th  data-priority="4" >Adress</th>
                                <th  data-priority="5" >Total</th>
                                <th  data-priority="9" >Commentaire</th>
                                <th  data-priority="7"  style="width: 20px;">Quantity</th>
                                <th  data-priority="1"  style="width: 50px;">Social Media</th>
                                <th  data-priority="8" >status</th><th  data-priority="9" >Date</th>
                                <th data-priority="10" >products </th>
                                <th data-priority="6" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <!-- <td></td> -->

                                @foreach ($commandes as $commande)
                                <tr>
                                    <td>{{$commande->id}} </td>
                                    <td>{{$commande->fullName}} </td><td> {{$commande->number}} </td><td>{{$commande->adress}}</td>
                                    <td>{{$commande->Total}} </td>
                                   
                                    <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell2' : '' }}">
                                @if($commande->commentaire != null)
                                    <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_2' : '' }}">
                                        {{$commande->commentaire}} 
                                    </div>
                                @else
                                    <div>no comment</div>
                                @endif
                            </td>

                                    <td>{{$commande->quantite}}</td><td>{{$commande->socialmedia}}</td> <td>{{$commande->status}}</td>
                                    <td>
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip" >Date Commande</div>
                                                    <div >{{$commande->datecommande}}</div> 
                                                </div>
                                        </div>
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip" >Date Validation</div>
                                                    <div >{{$commande->date_done}}</div> 
                                                </div>
                                        </div>
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip">Date Livraison</div>
                                                    <div >{{$commande->datelivraison}}</div> 
                                                </div>
                                        </div>
                                                <!-- <div class="myDIV"><span> Date Livraison</span>   <span >01/01/2023</span></div> -->
                                    </td>
                                    <td>
                                       
                                            @foreach ($commande->produits as $produit)
                                                <div class=" d-flex justify-content-between myDIV"> 
                                                    <div class=" mt-1">{{$produit->design->design_name}} / {{$produit->color}} / {{$produit->taille}} / {{$produit->type_product->type_product}} </div>
                                                    @if(auth()->user()->state=='dropshiper' && $commande->status == 'prepared')
                                                        <div class="hide ml-2">
                                                            <a href="#editP{{$produit->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> </a>
                                                            <a href="#deleteP{{$produit->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        
                                        
                                        
                                    </td>
                                    <td style="width: 100px;">
                                        @if ($commande->status == 'prepared')
                                        <a href="#edit{{$commande->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$commande->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                        <a href="#addnewP{{$commande->id}}" data-toggle="modal" class="btn btn-primary btn-sm btn-flat">Add product</a>
                                        {{-- @else
                                        <a href="#edit" data-toggle="modal" class="btn btn-secondary btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete" data-toggle="modal" class="btn btn-secondary btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                        <a href="#addnewP" data-toggle="modal" class="btn btn-secondary btn-sm btn-flat">Add product</a> --}}
                                        @endif
                                    </td>
                                </tr>
                                    
                                @endforeach
                                 
                        </tbody>
                    </table>
                </div>
             </div>
        </div>
    </div>
 </div> <!-- end col -->
</div> <!-- end row -->
@include('includes.add_commande')
@foreach ($commandes as $commande)
    @include('includes.add_produit')
    @include('includes.edit_delete_commande')
    @foreach ($commande->produits as $produit)
        @include('includes.edit_delete_produit')
    @endforeach
@endforeach




@endsection

@section('script')
<!-- Responsive-table-->

@endsection


