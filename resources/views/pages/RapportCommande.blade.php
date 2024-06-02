@extends('layouts/appli')

@section('title')
Rapport de commandes
@endsection

@section('titre')
Rapport de commandes
@endsection

@section('sous-titre')
Ordonné par la date de réalisation
@endsection

@section('icon')
handshake
@endsection

@section('content')
     <!-- form content -->
     <div class="row">

          

          <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #C0C0C0;">
          </div>

          <div class="col col-md-12 table-responsive">
            <div id="print_content" class="table-responsive">
            	<table class="table table-bordered table-striped table-hover" id="purchase_report_div">
                  
                    <thead>
                         <tr>
                  <!-- <th style="width: 2%;">SL.</th>-->
                                        <th style="width: 5%;">commande ID</th>
                                        <th style="width: 15%;">Nom de client</th>
                                        <th style="width: 15%;">Nom de produit</th>
                                        <th style="width: 7%;">Quantité</th>
                                        <th style="width: 5%;">Prix Total</th>
                                        <th style="width: 5%;">Date de commande</th>
                                        <th style="width: 5%;">Date de Modification</th>

                                        
                                        
                                        
                         </tr>
                    </thead>

                    <tbody>

                       @if (count($commandes) > 0)
                                 @foreach($commandes as $commande)
                                    <tr>
                                
                                    
                                        <td>{{$commande->id}}</td>
                                        <td>{{$commande->nom_client}} </td>
                                        <td>{{$commande->nom_produit}} </td>
                                        <td>{{$commande->nombre_produits}} </td>
                                        <td>{{$commande->prix_total}}</td>
                                        <td>{{$commande->created_at}}</td>
                                        <td>{{$commande->updated_at}}</td>
                                        
                                        
                                        
                                        
                                       
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No commandes</p>
                        @endif
                        <!-- { {$commandes->links()}} -->
               
                    </tbody>
    <tfoot class="font-weight-bold">
      <tr style="text-align: right; font-size: 24px;">
        <td colspan="4" style="color: green;">&nbsp;Total de Profit: =</td>
        <td style="color: red;"><?php
                                   use Illuminate\Http\Request;
                          
                                    use Illuminate\Support\Facades\DB;
                                   $p = DB::select('select prix_total from commandes '); //where created_at = ""
                                   $profit = 0;
                                   if(count($p) > 0){
                                             foreach($p as $pr){
                                             $profit += $pr->prix_total;
                                             }
                                                  }
                                   echo $profit;?>
          </td>
      </tr>
    </tfoot>
                	</table>

                  <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #C0C0C0;">
                  </div>

                  <a href="{{ route('rapport-commandes.pdf') }}" class="btn btn-primary col col-md-1">Générer PDF</a>
                  <a href="{{ route('rapport-commandes.excel') }}" class="btn btn-secondary col col-md-1">Générer Excel</a>

                  <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #C0C0C0;">
                  </div>
                  <hr style="border-top: 2px solid #C0C0C0;">
                  
            </div>
          </div>

         
        <!-- form content end -->
     <!-- form de ajouter produit -->
    
     <!-- fin de form et de page -->
      
@endsection 
 