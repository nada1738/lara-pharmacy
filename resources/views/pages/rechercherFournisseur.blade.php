@extends('layouts/appli')

@section('title')
Fournisseur: {{$fournisseurs[0]->name}}
@endsection

@section('titre')
Resultat pour: {{$fournisseurs[0]->name}}
@endsection

@section('sous-titre')

@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  -->
     <div class="row">
         
        


        <div class="col col-md-12">
          <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #C0C0C0;">
        </div>

        <div class="col col-md-12 table-responsive">
          <div class="table-responsive">
               <table class="table table-bordered table-striped table-hover">
                    <thead>
                         <tr>
                  <!-- <th style="width: 2%;">SL.</th>-->
                  <th style="width: 7%;">Fournisseur ID</th>
                  <th style="width: 17%;">Nom</th>
                  <th style="width: 23%;">Email</th>
                  <th style="width: 10%;">Telephone</th>
                  <th style="width: 22%;">Addresse</th>
                  <th style="width: 5%;">Historique
				  </th>
                  <th style="width: 13%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                       @if (count($fournisseurs) > 0)
                              <!--@ foreach-->    
                                    <tr>
                                
                                    
                                        <td>{{$fournisseurs[0]->id}}</td>
                                        <td>{{$fournisseurs[0]->name}} </td>
                                        <td>{{$fournisseurs[0]->email}} </td>
                                        <td>{{$fournisseurs[0]->telephone}}</td>
                                        <td>{{$fournisseurs[0]->addresse}}</td>
                                       
                                       <td> <a href="fournisseurs/{{$fournisseurs[0]->id}}/produits" class="btn btn-warning btn-sm" >Afficher</a></td>
                                        <td>
                                        <a href="fournisseurs/{{$fournisseurs[0]->id}}/edit" class="btn btn-info btn-sm" >
                                    
                                        Modifier<!--<i class="fa fa-pencil"></i>-->
                                        </a>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\fournisseursController@destroy', $fournisseurs[0]->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                
                          <!--@ endforeach-->       
                        @else
                             <p>No fournisseurss</p>
                        @endif
                        <!-- { {$fournisseurss->links()}} -->
               
                    </tbody>
               </table>
          </div>
        </div>

      </div> 
               
    <hr style="border-top: 2px solid #C0C0C0;">
     <!-- fin de form et de page -->
      
@endsection 