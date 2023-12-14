@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Designs</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Designs</a></li>
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
                            <th data-priority="1" class="text-center">Design Name</th>
                            <th data-priority="2" class="text-center">Design Front</th>
                            <th data-priority="3" class="text-center">Design Back</th>
                            <th data-priority="4" class="text-center"> Design 3 </th>
                            <th data-priority="5" class="text-center">Design 4</th>
                            <th data-priority="6" class="text-center"> Version Design </th>
                            <th data-priority="7" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach( $designs as $design)
                            <tr>
                                <td style="width: 100px;" class="text-center">{{$design->design_name}}</td>
                                <?php $designs_var=["design_front","design_back","design_3","design_4"]; ?>
                                @for($i=0;$i<count($designs_var);$i++)
                                @if($design->{$designs_var[$i]}!=null)
                                    <td >
                                      <!-- <div class="text-center"> <a href="{{ 'download/' . $design->{$designs_var[$i]} }}">
                                            <img src="{{ asset('images/' . $design->{$designs_var[$i]}) }}" alt="photo" width="100px" height="100px">
                                        </a>
                                     </div>
                                        <div class="xx">
                                            <a href="#edit{{$design->id}}" data-toggle="modal" class="btn btn-info btn-sm edit btn-flat ">
                                                <i class='fa fa-download '></i> Download </a>
                                        </div> -->
                                        <!-- <div class="xx">
                                            <img src="{{ asset('images/' . $design->{$designs_var[$i]}) }}" alt="Snow" >
                                            <button class="btn"> <i class='fa fa-download '></i></button>
                                        </div> -->
                                        <div class="container">
                                            <img src="{{ asset('images/' . $design->{$designs_var[$i]}) }}" alt="Avatar" class="image" style="width:80%;height:160px" >
                                            <div class="middle">
                                            <a href="{{ 'download/' . $design->{$designs_var[$i]} }}">
                                                 <div class="text"><i class='fa fa-download '></i> Download </div></a>
                                            </div>
                                        </div>
                                    </td>
                                   @else
                                   <td class="text-center">-----</td>
                                @endif
                                @endfor
                                <td style="width: 100px;" class="text-center">{{$design->version_design}}</td>
                                <td style="width: 100px;">
                                    <a href="#edit{{$design->id}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                    <a href="#delete{{$design->id}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
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
@foreach ($designs as $design)
        @include('includes.edit_delet_design')
    @endforeach         
@include('includes.add_design')
@endsection

@section('script')
<!-- Responsive-table-->

@endsection

