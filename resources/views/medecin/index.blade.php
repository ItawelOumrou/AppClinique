@extends('app')
@extends('script')
    @section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 80px">

            <!-- Input de recherche 
            <div  class="pull-left">
                <input type="text" name="search" id="search" placeholder="rechercher" class="form-control"  autocomplete="off">
            </div> -->
                <div class="pull-right">
                <a href="{{url('medecin/create')}}" class="btn btn-success bi bi-person-plus " 
                                data-toggle="tooltip" data-placement="top" title="Nouveau Médecin"></a>
                </div>

                <div style="margin-top:38px;background-color:white">
                    <div style="background-color:silver;padding:5px;margin:0 0 18px">
                        <h3> Liste des Médecins </h3>
                    </div>
                    <div style="background-color:white;padding:10px">
                    <table id="datatable" class="table"  style="font-size: 15px"> 
                    <thead>
                        <tr> 
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>NNI</th>
                            <th>Numéro du téléphone</th>
                            <th>Spécialité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $liste)
                        <tr>
                    <td> {{$liste->nom}} </td> 
                    <td> {{$liste->prenom}} </td> 
                    <td> {{$liste->nni}} </td> 
                    <td> {{$liste->numTelephone}} </td> 
                    <td> {{$liste->specialite}} </td> 
                    <td> 
                            <a href="{{url('medecin/'.$liste->id.'/edit')}}" class="btn btn" id="vue" style="margin: 6px ; padding:6px;background-color:#306ed0" data-toggle="tooltip" data-placement="top" title="Editer"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/pencil.svg" width=20 height=20 ></a>
                            <a href="{{url('medecin/'.$liste->id.'/show')}}" class="btn btn" style="margin: 6px; padding:6px;background-color:#07d5fc" data-toggle="tooltip" data-placement="top" title="vue"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/eye.svg" width=20 height=20 ></a>
                           <button class="btn btn" data-toggle="modal" data-target="#ModalDelete{{$liste->id}}" style="margin: 6px; padding:6px;background-color:#cc0000"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/trash.svg"  width=20 height=20 data-toggle="tooltip" data-placement="top" title="supprimer"></button>
                            
                           @include('medecin.delete')
                    </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </div>
       
@endsection
