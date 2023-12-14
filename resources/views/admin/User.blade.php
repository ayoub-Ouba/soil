@extends('layouts.master')

@section('css')
@endsection
@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Users</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Employees</a></li> -->
            <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
    
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
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th data-priority="1">ID</th>
                                                        <th data-priority="2">Full Name</th>
                                                        <th data-priority="3">Number</th>
                                                        <th data-priority="4">Email</th>
                                                        <th data-priority="5">State</th>
                                                        <th data-priority="6">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $users as $user)
                                                            <tr>
                                                                <td>{{$user->id}}</td>
                                                                <td>{{$user->fullName}}</td>
                                                                <td>{{$user->Number}}</td>
                                                                <td>{{$user->email}}</td>
                                                                <td>{{$user->state}}</td>
                                                                <td>
                                                                    <a href="#edit{{$user->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                                                    <a href="#delete{{$user->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
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
    @foreach ($users as $user)
        @include('includes.edit_delete_employee')
    @endforeach          
    @include('includes.add_user')
    @include('includes.add_design')

@endsection


@section('script')
<!-- Responsive-table-->

@endsection