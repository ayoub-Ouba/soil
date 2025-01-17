@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Orders Shiped</h4>
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
                            <th  data-priority="1" >ID</th>
                            <th  data-priority="2" >Dropshipper</th>
                            <th  data-priority="3" >Dropshipper Number </th>
                            <th  data-priority="4" >Dropshipper Comment </th>
                            <th  data-priority="5" >Customer  </th>
                            <th  data-priority="6" >Social Media</th>
                            <th  data-priority="7" >Phone Number</th>
                            <th  data-priority="8" >Address</th>
                            <th  data-priority="9" >Quantity</th>
                            <th  data-priority="10" >Total Amount</th>
                            <th  data-priority="11" >Products </th>
                            <th data-priority="12" > Date </th>
                            <th data-priority="13" >Audio upload 2</th>
                            <th data-priority="14" >Your Comment</th>
                            <th data-priority="15" >Confirmation</th>
                            
                        </tr>
                    </thead>
                    <tbody class="">
                       
                    @foreach ($commandes as $commande)
                    <?php $adress=$commande->city.': '.$commande->adress;?>
                    <tr> 
                        <td>{{$commande->id}} </td>
                        <td > {{$commande->user->fullName}} </td>
                        <td > {{$commande->user->number}} </td>
                        <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell' : '' }}">
                            @if($commande->commentaire != null)
                                <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_1' : '' }}">
                                    {{$commande->commentaire}} 
                                </div>
                            @else
                                <div>no comment</div>
                            @endif
                        </td>
                        <td>{{$commande->fullName}} </td><td>{{$commande->socialmedia}}</td><td> {{$commande->number}} </td>
                        <td> 
                                <div class="{{ strlen($adress) > 28 ? 'comment_pr_2' : '' }}">
                                    <b>{{$commande->city}}:</b> {{$commande->adress}}
                                </div>
                        </td>
                        <td>{{$commande->quantite}}</td> <td>{{$commande->Total}} </td> 
                        <td style="width: 70px;">
                            @foreach ($commande->produits as $produit)
                                <div class=" d-flex justify-content-between myDIV"> 
                                    <div class=" mt-1">{{$produit->design->design_name}} / {{$produit->color}} / {{$produit->taille}} / {{$produit->type_product->type_product}} </div>
                                </div>
                            @endforeach
                        </td>
                        <td >
                            <div class="wrapper">
                                    <div class="icon facebook">
                                        <div class="tooltip" >Order Date</div>
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
                       
                        @if($commande->commentaire_confirmateur2==null)
                            <td>
                                
                            <div class="form-group">
                            <!-- <label for="comment">Comment</label> -->
                            <form action="{{ 'commentaire2/'. $commande->id}}" method="post">
                                @csrf
                            
                                    <textarea name="comment" class="mt-1"  id="comment" cols="35" rows="2" placeholder="Your comment" ></textarea>
                                    <div class=" mt-2">
                                        <button type="submit" class="btn btn-primary  btn-sm">
                                                add
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
                        
                            @endif
                            <td >
                           
                           <div class="form-check form-switch ml-3" >
                               <input style="width: 50px;height:20px;" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="printer"   
                                   onclick="event.preventDefault(); document.getElementById('cnf2{{ $commande->id}}').click();" {{$commande->confirmation2==1?'checked':''}}/>
                               <a href="#confirm_cnf2{{ $commande->id}}" data-toggle="modal" id="cnf2{{ $commande->id}}"></a>
                           </div> 
                       </td>
                    </tr>
                   
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
    @include('includes.confirm_cnf2')
@endforeach

@endsection

@section('script')
<!-- Responsive-table-->

@endsection


