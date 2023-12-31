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
                                <th  data-priority="2" >Order Name </th>
                                <th  data-priority="3"  style="width: 50px;" >Number</th>
                                <th  data-priority="4" >Adress</th>
                                <th  data-priority="5" >Total</th>
                                <th  data-priority="6" >Commentaire</th>
                                <th  data-priority="7"  style="width: 20px;">Quantity</th>
                                <th  data-priority="1"  style="width: 50px;">Social Media</th>
                                <th  data-priority="8" >status</th><th  data-priority="9" >Date</th>
                               
                                    <th data-priority="9" >products </th>
                                
                                <th data-priority="7" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <!-- <td></td> -->

                                @foreach ($commandes as $commande)
                                <tr>
                                    <td>{{$commande->fullName}} </td><td> {{$commande->number}} </td><td>{{$commande->adress}}</td>
                                    <td>{{$commande->Total}} </td><td > {{$commande->comment}} </td><td>{{$commande->produits->count()}}</td><td>{{$commande->socialmedia}}</td> <td>{{$commande->status}}</td>
                                    <td>
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip" >Date Commande</div>
                                                    <div class="">{{$commande->datecommande}}</div> 
                                                </div>
                                        </div>
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip" >Date Validation</div>
                                                    <div class="">{{$commande->datevalidation}}</div> 
                                                </div>
                                        </div>
                                        <div class="wrapper">
                                                <div class="icon facebook">
                                                    <div class="tooltip">Date Livraison</div>
                                                    <div class="">{{$commande->datelivraison}}</div> 
                                                </div>
                                        </div>
                                                <!-- <div class="myDIV"><span> Date Livraison</span>   <span >01/01/2023</span></div> -->
                                    </td>
                                    <td>
                                       
                                            @foreach ($commande->produits as $produit)
                                                <div class=" d-flex justify-content-between myDIV"> 
                                                    <div class=" mt-1">{{$produit->design->design_name}} / {{$produit->color}} / {{$produit->taille}} / {{$produit->type_product->type_product}} </div>
                                                    @if(auth()->user()->state=='dropshiper')
                                                        <div class="hide ml-2">
                                                            <a href="#editP{{$produit->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> </a>
                                                            <a href="#deleteP{{$produit->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        
                                        
                                        
                                    </td>
                                    <td style="width: 100px;">
                                        <a href="#edit{{$commande->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$commande->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                        <a href="#addnewP{{$commande->id}}" data-toggle="modal" class="btn btn-primary btn-sm btn-flat">Add product</a>
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


@endsection

@section('script')
<!-- Responsive-table-->

@endsection


