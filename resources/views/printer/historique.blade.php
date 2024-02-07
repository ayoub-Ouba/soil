
@extends('layouts.master')

@section('css')
@endsection
@section('breadcrumb')
        <div class="col-sm-6">
            <h4 class="page-title text-left">Orders History</h4>
           
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
                                <th  data-priority="2" >Design 1</th>
                                <th  data-priority="3" >Design 2</th>
                                <th  data-priority="4" >Design 3 </th>
                                <th  data-priority="5"  >Design 4</th>
                                <th  data-priority="6" >Color</th>
                                <th  data-priority="7" >Size</th>
                                <th  data-priority="8" >Type</th>
                                <th  data-priority="9"class="comment" style="width: 50px;">Comment</th>
                                <th  data-priority="10" >Dropshiper</th>
                               
                                <th  data-priority="11" >Order Date</th>
                                @if(auth()->user()->state=="printer1")
                                <th  data-priority="11" >Dtf Printed Time</th>
                                @else
                                <th  data-priority="11" >Hoodie Printed time</th>
                                @endif
                               
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->state=="printer1"?$commandes_printer1 :$commandes_printer2 as $commande)
                        @foreach ($commande->produits as $produit)
                    
                        
                        <tr> 
                        @if($produit->print_design_v_fnl==1 && $commande->status!="printed1"   && auth()->user()->state=="printer2")
                        <td>{{$produit->id_commande }} </td>


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


                            <td>{{$produit->color   }} mmm</td>
                            <td>{{$produit->taille }}</td>

                            <td>{{$produit->type_product->type_product }}</td>
                            <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell' : '' }}">
                                @if($commande->commentaire != null)
                                    <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_1' : '' }}">
                                        {{$commande->commentaire}} 
                                    </div>
                                @else
                                    <div>no comment</div>
                                @endif
                            </td>
                            <td>{{$produit->commande->user->fullName }}</td>
                            
                           
                            <td> {{$commande->datecommande}} </td>
                            <td> {{$produit->date_print_dtf}} </td>
                        @elseif($produit->print_design==1 && $commande->status!="prepared" && auth()->user()->state=="printer1")
                        <td>{{$produit->id_commande }} </td>


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


                            <td>{{$produit->color }}</td>
                            <td>{{$produit->taille }}</td>

                            <td>{{$produit->type_product->type_product }}</td>
                            <td class="{{ strlen($commande->commentaire) > 28 ? 'comment-cell' : '' }}">
                                @if($commande->commentaire != null)
                                    <div class="{{ strlen($commande->commentaire) > 28 ? 'comment_pr_1' : '' }}">
                                        {{$commande->commentaire}} 
                                    </div>
                                @else
                                    <div>no comment</div>
                                @endif
                            </td>
                            <td>{{$produit->commande->user->fullName }}</td>
                            
                           
                            <td> {{$commande->datecommande}} </td>
                            <td> {{$produit->date_print_dtf}} </td>
                            @endif
                                </tr>
                            
                       
                        @endforeach
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
