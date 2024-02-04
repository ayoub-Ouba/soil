@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">History</h4>        
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
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap "
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th  data-priority="1" >ID</th>
                            <th  data-priority="2" >Dropshiper</th>
                            <th  data-priority="3" >Client  </th>
                            <th  data-priority="4" >City</th>
                            <th  data-priority="5"  style="width: 20px;">Quantity</th>
                            <th  data-priority="6" >Total</th>
                            <th  data-priority="7" style="width: 20px;">Date</th>
                            <th data-priority="8" >products </th>
                        </tr>
                    </thead>
                    <tbody class="">
                       
                    @foreach ($commandes as $commande)
                    <tr> 
                        <td>{{$commande->id}} </td>
                        <td > {{$commande->user->fullName}} </td>
                        <td>{{$commande->fullName}} </td><td>{{$commande->city}}</td>
                        <td>{{$commande->quantite}}</td> <td>{{$commande->Total}} </td> 
                        <td >
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
                        </td>
                        <td style="width: 70px;">
                            @foreach ($commande->produits as $produit)
                                <div class=" d-flex justify-content-between myDIV"> 
                                    <div class=" mt-1">{{$produit->design->design_name}} / {{$produit->color}} / {{$produit->taille}} / {{$produit->type_product->type_product}} </div>
                                </div>
                            @endforeach
                        </td>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
</div>
</div>
</div> 
</div> 

@endsection

@section('script')
<!-- Responsive-table-->

@endsection


