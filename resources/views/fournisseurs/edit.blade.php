@extends('layouts/appli')

@section('title')
Modifier un fournisseur
@endsection

@section('titre')
Fournisseur
@endsection

@section('sous-titre')
Modifier les données d'un Fournisseur
@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  -->
     
               
               <div class="row">
     
                  
          
                    <div class="col col-md-12">
                      <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #C0C0C0;">
                    </div>
          
                    <div class="col col-md-12 table-responsive">
                      <div class="table-responsive">
                           <table class="table table-bordered table-striped table-hover">
                                <thead>
                                     <tr>
                                        <!-- <th style="width: 2%;">SL.</th>-->
                                        <th style="width: 7%;">Fournisseur ID</th>
                                        <th style="width: 15%;">Nom</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 15%;">Telephone</th>
                                        <th style="width: 30%;">Addresse</th>
                                        <th style="width: 13%;">Action</th>
                                     </tr>
                                </thead>
                                <tbody id="customers_div">
                                       
                                         <tr>
                                             
                                             {!! Form::open(['action' => ['App\Http\Controllers\fournisseursController@update', $fournisseur->id], 'method' => 'POST', ]) !!}
                                                       
                                                       <td>{{$fournisseur->id}}</td>
                                                       
                                                       <td>{{Form::text('name', $fournisseur->name, ['class' => 'form-control', 'placeholder' => 'nom'])}}</td>
                                                       
                                                       <td>{{Form::text('email', $fournisseur->email, ['class' => 'form-control', 'placeholder' => 'email'])}}</td>
                                                       
                                                       <td>{{Form::text('telephone', $fournisseur->telephone, ['class' => 'form-control', 'placeholder' => 'telephone'])}}</td>
                                                       
                                                       <td>{{Form::text('addresse', $fournisseur->addresse, ['class' => 'form-control', 'placeholder' => 'addresse'])}}</td>
                                                            
                                                  {{Form::hidden('_method','PUT')}}

                                                       <td>{{Form::submit('Valider', ['class'=>'btn btn-primary'])}}
                                                                 <a href="/pfe/public/fournisseurs" class="btn btn-info btn-sm" >
                                                                      Annuler
                                                                 </a>
                                                        </td>
                                                            
                                                       
                                             {!! Form::close() !!}
                                        </tr>             
                             
                                </tbody>
                           </table>
                      </div>
                    </div>
          
                  </div>
               
                              
        

    <hr style="border-top: 2px solid #C0C0C0;">
     <!-- fin de form et de page -->
      
@endsection 