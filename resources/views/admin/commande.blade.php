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
                                <th  data-priority="2" >Full Name</th>
                                <th  data-priority="3"  style="width: 50px;" >Number</th>
                                <th  data-priority="4" >Adress</th>
                                <th  data-priority="5" >Total</th>
                                <th  data-priority="6" >Comment</th>
                                <th  data-priority="7"  style="width: 20px;">Quantity</th>
                                <th  data-priority="1"  style="width: 50px;">SocialMehia</th>
                                <th  data-priority="8" >status</th><th  data-priority="9" >Date</th>
                                <th data-priority="9" >products</th>
                                <th data-priority="7" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <td>1</td> -->
                                 <td>ayoub oubakki</td><td> 0666511201 </td><td>Rue 35</td>
                                <td>3000 </td><td > xxxx </td><td>4</td><td>xxjnf</td> <td>prepared</td>
                                <td>
                                 <div class="wrapper">
                                        <div class="icon facebook">
                                             <div class="tooltip" >Date Commande</div>
                                             <div class=""> 01/01/2023</div> 
                                        </div>
                                </div>
                                <div class="wrapper">
                                        <div class="icon facebook">
                                             <div class="tooltip" >Date Validation</div>
                                             <div class="">01/01/2023</div> 
                                        </div>
                                </div>
                                <div class="wrapper">
                                        <div class="icon facebook">
                                             <div class="tooltip" > Date Livraison</div>
                                             <div class="">01/01/2023</div> 
                                        </div>
                                </div>
                                        <!-- <div class="myDIV"><span> Date Livraison</span>   <span >01/01/2023</span></div> -->
                                      
                                   
                                   
                                </td>
                                <td>
                                    <div class=" d-flex justify-content-between myDIV"> 
                                        <div class=" mt-1">Bronx boy/Blanc/M/hodies </div>
                                        @if(auth()->user()->state=='dropshiper')
                                        <div class="hide ">
                                            <a href="#edit{{1}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> </a>
                                            <a href="#delete{{1}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                                        </div>
                                        @endif
                                    </div>
                                    <div class=" d-flex justify-content-between myDIV"> 
                                        <div class=" mt-1">Bronx boy/Blanc/M/hodies </div>
                                        <div class="hide ">
                                            <a href="#edit{{1}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> </a>
                                            <a href="#delete{{1}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 100px;">
                                    <a href="#edit{{1}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                    <a href="#delete{{1}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                    <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat">Add product</a>
                                </td>
                            </tr>
                            
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
