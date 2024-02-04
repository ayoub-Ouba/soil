@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Orders Done</h4>
        {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Orders Done</a></li>
        </ol> --}}
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
                            <th  data-priority="6" >Dropshiper</th>
                            <th  data-priority="6" >Dropshiper Comment</th>
                            <th  data-priority="2" >Client  </th>
                            <th  data-priority="3"  style="width: 50px;" >Number</th>
                            <th  data-priority="4" >City</th>
                            <th  data-priority="4" >Adress</th>
                            <th  data-priority="1"  style="width: 50px;">Social Media</th>
                    
                            <th  data-priority="7"  style="width: 20px;">Quantity</th>
                            <th  data-priority="5" >Total</th>
                           
                            <th  data-priority="9" style="width: 20px;">Date</th>
                            <th data-priority="9" >products </th>
                            <th data-priority="7" >audio uplaod 2</th>
                            <th data-priority="7" >confirmation</th>
                            <th data-priority="7" >Your Comment</th>
                            
                        </tr>
                    </thead>
                    <tbody class="">
                       
                    @foreach ($commandes as $commande)
                    {{-- @if($commande->status=="printed2" || $commande->status=="confirmed" ) --}}
                    <tr> 
                        <td>{{$commande->id}} </td>
                        <td > {{$commande->user->fullName}} </td>
                        <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell' : '' }}">
                            @if($commande->commentaire != null)
                                <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_1' : '' }}">
                                    {{$commande->commentaire}} 
                                </div>
                            @else
                                <div>no comment</div>
                            @endif
                        </td>
                        <td>{{$commande->fullName}} </td><td> {{$commande->number}} </td><td>{{$commande->city}}</td>
                        <td>{{$commande->adress}}</td>
                        
                       
                       
                        <td>{{$commande->socialmedia}}</td><td>{{$commande->quantite}}</td> <td>{{$commande->Total}} </td> 
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
                            </div><!-- <div class="myDIV"><span> Date Livraison</span>   <span >01/01/2023</span></div> -->
                        </td>
                        <td style="width: 70px;">
                            @foreach ($commande->produits as $produit)
                                <div class=" d-flex justify-content-between myDIV"> 
                                    <div class=" mt-1">{{$produit->design->design_name}} / {{$produit->color}} / {{$produit->taille}} / {{$produit->type_product->type_product}} </div>
                                </div>
                            @endforeach
                        </td>
                        <td >
                            @if ($commande->audio2 == null)
                                <form action="/uploadaudio2/{{$commande->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="audio_upload_2" accept="audio/*" required>
                                    <button type="submit">Save</button>
                                </form>
                            @else
                                <audio controls>
                                    <source src={{ asset('storage/audio_files2/'.$commande->audio1) }} type="audio/mp3">
                                    Your browser does not support the audio tag.
                                </audio>
                                {{-- {{$commande->audio1}} --}}
                            @endif
                            
                        </td>
                        <td >
                            <div class="form-check form-switch ml-3" >
                                <input style="width: 50px;height:20px;" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked2" name="confirmation2"  
                                    onclick="event.preventDefault();document.getElementById('confirmation2').submit();" 
                                {{$commande->confirmation2==1?'checked':''}} >
                                
                                <label class="form-check-label" for="flexSwitchCheckChecked2"></label>
                                <form id="confirmation2" action="{{ 'confirmationfinal_order/'. $commande->id}}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </td>
                        @if($commande->commentaire_confirmateur2==null)
                            <td>
                            <div class="form-group">
                            <!-- <label for="comment">Comment</label> -->
                            <form action="{{ 'commentaire2/'. $commande->id}}" method="post">
                                @csrf
                            
                                    <textarea name="comment" class="form-control " id="comment" cols="40" rows="2" placeholder="Your comment" ></textarea>
                                    <div class="text-center mt-2">
                                        <button type="submit" class="btn btn-primary  btn-sm">
                                                Submit
                                        </button>
                                    </div>
                            </form>
                            </div>
                        
                            </td>
                        @else
                            <td class="{{ strlen($commande->commentaire_confirmateur2) > 28 ? 'comment-cell' : '' }}">
                                <div class="{{ strlen($commande->commentaire_confirmateur2) > 28 ? 'comment_pr_1' : '' }}">
                                    {{$commande->commentaire_confirmateur2}}
                                </div>
                        </td>
                        {{-- @endif --}}
                    </tr>
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

@endsection

@section('script')
<!-- Responsive-table-->

@endsection


