@extends('layouts.master')
@section('css')
<!--Chartist Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('plugins/chartist/css/chartist.min.css') }}">
@endsection
@if(auth()->user()->state=='admin' || auth()->user()->state=='dropshiper' || auth()->user()->state=='manager')
    @section('breadcrumb')
    <div class="col-sm-6 text-left" >
        <h4 class="page-title">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Welcome to Attendance Management System</li>
        </ol>
    </div>
    @endsection

    @section('content')
   
    <div class="row">
            @if (auth()->user()->state=='admin' || auth()->user()->state=='manager')
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                        @if(auth()->user()->state=='manager')
                            <div class="float-left mini-stat-img mr-4">
                                <span class="ti-calendar" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Orders <br></h5>
                            <h4 class="font-500">{{count($commandes)}} </h4>
                            <span class="ti-clipboard" style="font-size: 71px"></span>
                        @else
                            <div class="float-left mini-stat-img mr-4">
                                <span class="ti-id-badge" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Users <br></h5>
                            <h4 class="font-500">{{count($users)}} </h4>
                            <span class="ti-user" style="font-size: 71px"></span>

                        @endif
                            
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="/users" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                            <p class="text-white-50 mb-0">More info</p>
                        </div>
                    </div>
                </div>
            </div>
            @else 
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <span class="fa fa-list" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Orders <br></h5>
                            <h4 class="font-500 ">{{count($comandesall)}}</h4>
                            <!-- <div class="d-flex"> -->
                                <span class="ti-calendar" style="font-size: 80px"></span>
                                <!-- <p class="pl-5">Orders done</p> -->
                            <!-- </div> -->
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="/orders" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                            <p class="text-white-50 mb-0">More info</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <span class="fas fa-paint-brush" style="font-size: 20px"></span>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Designs <br></h5>
                            <h4 class="font-500 ">{{count($designs)}}</h4>
                            <span class="ti-pencil-alt" style="font-size: 80px"></span>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="/design" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                            <p class="text-white-50 mb-0">More info</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <i class=" ti-check-box " style="font-size: 20px"></i>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">On Time <br> Today</h5>
                            <h4 class="font-500">0 <i class=" text-success ml-2"></i></h4>
                            <span class="peity-donut" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72">55</span>
                                
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">More info</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <i class="ti-alert" style="font-size: 20px"></i>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Late <br> Today</h5>
                            <h4 class="font-500">0<i class=" text-success ml-2"></i></h4>
                            <span class="peity-donut" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72">55</span>
                                
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">More info</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
{{-- 
        <div class="row">
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-5">Monthly Report</h4>
                        <div class="row">
                            <div class="col-lg-7">
                                <div>
                                    <div id="chart-with-area" class="ct-chart earning ct-golden-section"></div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <p class="text-muted mb-4">This month</p>
                                            <h4>124</h4>
                                            <p class="text-muted mb-5">It will be as simple as in fact it will be occidental.</p>
                                            <span class="peity-donut" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72">55</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <p class="text-muted mb-4">Last month</p>
                                            <h4>200</h4>
                                            <p class="text-muted mb-5">It will be as simple as in fact it will be occidental.</p>
                                            <span class="peity-donut" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72">3/5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
                <!-- end card -->
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h4 class="mt-0 header-title mb-4">Sales Analytics</h4>
                        </div>
                        <div class="wid-peity mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted">Online</p>
                                        <h5 class="mb-4">1,542</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}' data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wid-peity mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted">Offline</p>
                                        <h5 class="mb-4">6,451</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}' data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <p class="text-muted">Marketing</p>
                                        <h5>84,574</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}' data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        
--}}                      
        <!-- end row -->
    @endsection

<!-- home confirmateur -->
@elseif(auth()->user()->state=='confirmateur')
    
    @section('breadcrumb')
        <div class="col-sm-6">
            <h4 class="page-title text-left">Orders </h4>
           
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
                                <!-- <th  data-priority="1" style="width: 20px;">Id</th> -->
                                <th  data-priority="1" >ID</th>
                                <th  data-priority="2" >Dropshipper</th>
                                <th  data-priority="3" >Dropshipper Number</th>
                                <th  data-priority="4" >Dropshipper Comment</th>
                                <th  data-priority="5" >Customer  </th>
                                <th  data-priority="6" >Social Media</th>
                                <th  data-priority="7" >Phone Number</th>
                                <th  data-priority="8" >Address</th>
                                <th  data-priority="9" >Quantity</th>
                                <th  data-priority="10" >Total Amount</th>
                                <th  data-priority="11" >Products </th>
                                <th data-priority="12" > Date Order</th>
                                <th data-priority="13" >Audio upload</th>
                                <!-- <th data-priority="13" >Audio record</th> -->
                                <th data-priority="14" >Your Comment</th>
                                <th data-priority="15" >Confirmation</th>
                               
                            </tr>
                        </thead>
                        <tbody class="">
                        @foreach ($commandes as $commande)
                        @if($commande->status=="prepared" && count($commande->produits)!=0) 
                        <?php $adress=$commande->city.': '.$commande->adress;?>
                        <tr> 
                            <td>{{$commande->id}} </td>
                            <td > {{$commande->user->fullName}} </td>
                            <td > {{$commande->user->Number}} </td>
                            <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell' : '' }}">
                                @if($commande->commentaire != null)
                                    <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_1' : '' }}">
                                        {{$commande->commentaire}} 
                                    </div>
                                @else
                                    <div>no comment</div>
                                @endif
                            </td>
                            <td>{{$commande->fullName}} </td><td>{{$commande->socialmedia}}</td> <td> {{$commande->number}} </td>
                            <td> 
                                <div class="{{ strlen($adress) > 28 ? 'comment_pr_2' : '' }}">
                                    <b>{{$commande->city}}:</b> {{$commande->adress}}
                                </div>
                            </td>
                            <td>{{$commande->quantite}}</td> <td>{{$commande->Total}} DH </td> 
                            <td style="width: 70px;">
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
                                </div><!-- <div class="myDIV"><span> Date Livraison</span><span >01/01/2023</span></div> -->
                            </td>
                            {{-- audio upload --}}
                            
                            <td >
                                @if ($commande->audio1 == null)
                                <form action="/uploadaudio1/{{$commande->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="audio_upload_1" accept="audio/*" required>
                                    <button type="submit">Save</button>
                                </form>
                            @else
                                <audio controls>
                                    <source src="{{ asset('images/' . $commande->audio1) }}" type="audio/mp3">
                                    Your browser does not support the audio tag.
                                </audio>

                            @endif
                                
                            </td>
                            
                            <!-- <td > -->
                                <!-- {{-- audio record --}} -->
                                <!-- <div>
                                    <button type="button" id="startRecord_{{$commande->id}}" onclick="startRecording({{$commande->id}})">Start Recording</button>
                                    <button type="button" id="stopRecord_{{$commande->id}}" onclick="stopRecording({{$commande->id}})" disabled>Stop Recording</button>
                                    <audio id="audioPlayer_{{$commande->id}}" controls></audio>
                                    <button type="button" type="button" id="saveButton_{{$commande->id}}" onclick="saveRecording({{$commande->id}});">Save</button>
                                </div>  -->
                            <!-- </td> -->
                           
                            @if($commande->commentaire_confirmateur1==null)
                                <td>
                                    <div class="form-group">
                                    <!-- <label for="comment">Comment</label> -->
                                        <form action="{{ 'commentaire/'. $commande->id}}" method="post">
                                            @csrf
                                        
                                                <textarea name="comment"  class="mt-1" id="comment" cols="30" rows="2" placeholder="Your comment" ></textarea>
                                                <div class="mt-1">
                                                    <button type="submit" class="btn btn-primary  btn-sm">
                                                        Add
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </td>
                            @else
                                <td class="{{ strlen($commande->commentaire_confirmateur1) > 28 ? 'comment-cell' : '' }}">
                                    <div class="{{ strlen($commande->commentaire_confirmateur1) > 28 ? 'comment_pr_1' : '' }}">
                                        {{$commande->commentaire_confirmateur1}}
                                    </div>
                                </td>
                             @endif 
                             <td >
                            <div class="form-check form-switch ml-3" >
                                <input style="width: 50px;height:20px;" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="printer"   
                                    onclick="event.preventDefault(); document.getElementById('cnf{{ $commande->id}}').click();" {{$commande->confirmation==1?'checked':''}}/>
                                <a href="#confirm_cnf{{ $commande->id}}" data-toggle="modal" id="cnf{{ $commande->id}}"></a>
                            </div> 
                         </td>
                        </tr>
                        
                      
                        @endif
                        @endforeach
                        
                    </tbody>
                </table>
                {{-- <audio controls>
                    <source src="{{ asset('images/' . $commandes[0]->audio1) }}" type="audio/mp3">
                    Your browser does not support the audio tag.
                </audio>
                {{$commandes[0]->audio1}} --}}
                {{-- <audio controls>
                    <source src="{{ asset('images/' . $commandes[0]->audio1) }}" type="audio/mp3">
                    Your browser does not support the audio tag.
                </audio>
                <p>Dynamic File Path: {{ asset('images/' . $commandes[0]->audio1) }}</p> --}}

                
                
            </div>
            </div>
    </div>
</div>
 </div> 
</div> 
{{-- <script>
    function startRecording(id){
        console.log('startRecord_' + id);

        var startButton = document.getElementById('startRecord_' + id);
        var stopButton = document.getElementById('stopRecord_' + id);
        // console.log('Button element:', startButton);

        // // Disable the button
        startButton.disabled = true;
        console.log('Button disabled');

        console.log('Button element:', startButton);
    }
</script> --}}

{{-- <script src="{{ asset('js/recorder.js') }}"></script> --}}
{{-- <script src="{{ asset('js/record1.js') }}"></script> --}}

@foreach ($commandes as $commande)
        @include('includes.confirm_cnf')
   
@endforeach
@endsection

@section('script')

<!-- Responsive-table-->

@endsection

@elseif(auth()->user()->state=='printer1') 
@section('breadcrumb')
        <div class="col-sm-6">
            <h4 class="page-title text-left">Orders</h4>
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
                                <!-- <th  data-priority="1" style="width: 20px;">Id</th> -->
                                <th  data-priority="1" >Order</th>
                                <th  data-priority="2" >Front Design </th>
                                <th  data-priority="3" >Back Design </th>
                                <th  data-priority="4" >Design 3 </th>
                                <th  data-priority="5"  >Design 4</th>
                                <th  data-priority="8" >Type</th>
                                <th  data-priority="6" >Color</th>
                                <th  data-priority="7" >Size</th>
                                <th  data-priority="10" >Dropshipper</th>
                                <th  data-priority="9"class="comment" style="width: 50px;">Comment Dropshipper</th>
                                <th  data-priority="11" >Is Printed</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($commandes as $commande)
                        @if($commande->status=="confirmed")
                         @if($commande->id_printed1==null || $commande->id_printed1==auth()->user()->id)
                        @foreach ($commande->produits as $produit)
                        
                        <tr> 
                            <td>{{$produit->id_commande }}</td>
                            <?php $designs_var=["design_front","design_back","design_3","design_4"]; ?>
                            @for($i=0;$i<4;$i++)
                                @if($produit->design->{$designs_var[$i]}!=null)
                                    <td >
                                        <div class="container">
                                            <?php $extension = pathinfo($produit->design->{$designs_var[$i]}, PATHINFO_EXTENSION); ?>
                                            @if($extension!="pdf")
                                                <img src="{{ asset('images/' . $produit->design->{$designs_var[$i]}) }}" alt="Avatar" class="image" style="width:80%;height:160px" />
                                            @else
                                                <iframe src="{{ asset('images/' . $produit->design->{$designs_var[$i]}) }}"  alt="Avatar" class="image" style="width:80%;height:160px"></iframe>
                                            @endif
                                            <div class="middle">
                                            <a href="{{ 'download/' . $produit->design->{$designs_var[$i]} }}">
                                                 <div class="text"><i class='fa fa-download'></i>   </div></a>
                                            </div>
                                        </div>
                                    </td>
                                   @else
                                   <td class="text-center" >-----</td>
                                @endif
                            @endfor
                            <td>{{$produit->type_product->type_product }}</td>
                            <td>{{$produit->color }}</td>
                            <td>{{$produit->taille }}</td> 
                            <td>{{$produit->commande->user->fullName }}</td>                         
                            <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell' : '' }}">
                                @if($commande->commentaire != null)
                                    <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_1' : '' }}">
                                        {{$commande->commentaire}} 
                                    </div>
                                @else
                                    <div>no comment</div>
                                @endif
                            </td>
                            
                            
                           <td >
                            <!-- <div class="form-check form-switch ml-3">
                                    <input style="width: 50px; height: 20px;" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked{{$produit->id}}" name="printer"   
                                        onclick="event.preventDefault(); document.getElementById('dtf{{$produit->id}}').click();" {{$produit->print_design == 1 ? 'checked' : ''}} {{$produit->print_design == 1 ? 'disabled' : ''}}/>
                                    <a href="#confirm_dtf{{$produit->id}}" data-toggle="modal" id="dtf{{$produit->id}}"></a>
                                </div> -->
                                <div class="form-check form-switch ml-3" >
                                    <input style="width: 50px;height:20px;" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="printer"   
                                        onclick="event.preventDefault(); document.getElementById('dtf{{$produit->id}}').click();" {{$produit->print_design==1?'checked':''}} {{$produit->print_design==1?'disabled':''}}/>
                                    <a href="#confirm_dtf{{$produit->id}}" data-toggle="modal" id="dtf{{$produit->id}}"></a>
                                </div> 
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
    </div>
</div>
 </div> 
</div> 
@foreach ($commandes as $commande)
    @foreach ($commande->produits as $produit)
        @include('includes.confirm_dtf')
    @endforeach
@endforeach
@endsection


{{-- printer 2 --}}

@elseif(auth()->user()->state=='printer2') 
@section('breadcrumb')
        <div class="col-sm-6">
            <h4 class="page-title text-left">Orders</h4>
           
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
                        <thead class="">
                            <tr class="">
                                <th  data-priority="1" >Order</th>
                                <th  data-priority="2" >Front Design </th>
                                <th  data-priority="3" >Back Design </th>
                                <th  data-priority="4" >Design 3 </th>
                                <th  data-priority="5"  >Design 4</th>
                                <th  data-priority="8" >Type</th>
                                <th  data-priority="6" >Color</th>
                                <th  data-priority="7" >Size</th>
                                <th  data-priority="11" >Dropshipper</th>
                                <th  data-priority="12" >Comment Dropshipper</th>
                                <th  data-priority="9"  >Product Printed</th>
                                <th  data-priority="10" style="width:100px;">Product Done</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($commandes as $commande)
                        @if($commande->status=="printed1")
                        @if($commande->id_printed2==null || $commande->id_printed2==auth()->user()->id)
                        @foreach ($commande->produits as $produit)
                       
                        
                        <tr> 
                            <td> {{$produit->id_commande }} </td>

                            <?php $designs_var=["design_front","design_back","design_3","design_4"]; ?>
                            @for($i=0;$i<4;$i++)
                                @if($produit->design->{$designs_var[$i]}!=null)
                                    <td >
                                        <div class="container">
                                         
                                            <?php $extension = pathinfo($produit->design->{$designs_var[$i]}, PATHINFO_EXTENSION); ?>
                                            @if($extension!="pdf")
                                                <img src="{{ asset('images/' . $produit->design->{$designs_var[$i]}) }}" alt="Avatar" class="image" style="width:80%;height:160px" />
                                            @else
                                                <iframe src="{{ asset('images/' . $produit->design->{$designs_var[$i]}) }}"  alt="Avatar" class="image" style="width:80%;height:160px"></iframe>
                                            @endif
                                            <div class="middle">
                                            <a href="{{ 'download/' . $produit->design->{$designs_var[$i]} }}">
                                                 <div class="text"><i class='fa fa-download'></i>   </div></a>
                                            </div>
                                        </div>
                                    </td>
                                   @else
                                   <td class="text-center">-----</td>
                                @endif
                                @endfor

                            <td>{{$produit->type_product->type_product }}</td>
                            <td>{{$produit->color }}</td>
                            <td>{{$produit->taille }}</td>
                            <td>{{$produit->commande->user->fullName }}</td>
                            <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell2' : '' }}">
                                @if($commande->commentaire != null)
                                    <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_2' : '' }}">
                                        {{$commande->commentaire}} 
                                    </div>
                                @else
                                    <div>no comment</div>
                                @endif
                            </td>
                           <td >
                                <div class="form-check form-switch ml-3" style="width: 100px;" >
                                    <input style="width: 50px;height:20px;" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="printer"  
                                    {{$produit->print_design==1?'checked disabled':'disabled'}} >
                                </div>
                            </td>
                            <td >

                              
                                <div class="form-check form-switch ml-3" >
                                    <input style="width: 50px;height:20px;" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="printer"   
                                        onclick="event.preventDefault(); document.getElementById('dtf{{$produit->id}}').click();" {{$produit->print_design_v_fnl==1?'checked':''}} {{$produit->print_design_v_fnl==1?'disabled':''}}/>
                                    <a href="#confirm_hoodiprint{{$produit->id}}" data-toggle="modal" id="dtf{{$produit->id}}"></a>
                                </div> 
                            </td>

                                </tr>
                                @endforeach
                                @endif
                                @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
    </div>
</div>
 </div> 
</div> 
@foreach ($commandes as $commande)
    @foreach ($commande->produits as $produit)
        @include('includes.confirm_hoodiprint')
    @endforeach
@endforeach
@endsection





@section('script')
<!-- Responsive-table-->

@endsection
@endif

@section('script')
<!--Chartist Chart-->
<script src="{{ URL::asset('plugins/chartist/js/chartist.min.js') }}"></script>
<script src="{{ URL::asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>




<!-- peity JS -->
<script src="{{ URL::asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/dashboard.js') }}"></script>
@endsection

