@extends('app')
@extends('script')
    @section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 80px">
                         <div class="pull-right" >
                            <a href="{{url('patient/create')}}" class="btn btn-success bi bi-person-plus " 
                                data-toggle="tooltip" data-placement="top" title="Nouveau Patient"></a>
                        </div>
            <div  style="margin-top:38px;background-color:white">
                <div style="background-color:silver;padding:5px;margin:0 0 18px">
                    <h3> Liste des patients </h3>
                </div>
                
                <!-- Recherche 
                <div  class="pull-left">
                    <input type="text" name="search" id="search" placeholder="rechercher" class="form-control"  autocomplete="off">
                </div> -->
                <div style="background-color:white;padding:10px">
                        
                        <table id="datatable"  class="dispaly"  style="font-size: 15px"> 
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>NNI</th>
                                    <th>Téléphone</th>
                                    <th>D.Naissance </th>
                                    <th>L.Naissance</th>
                                    <th>Age</th>
                                    <th>Genre</th>
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
                                        <td> {{$liste->dateNaiss}}  </td> 
                                        <td> {{$liste->lieuNaiss}} </td>
                                        <td> {{$liste->age}} </td>
                                        <td> {{$liste->genre}} </td>
                                        <td>
                                            <a href="{{url('patient/'.$liste->id.'/edit')}}" class="btn btn" style="margin: 5px; padding:6px;background-color:#306ed0" data-toggle="tooltip" data-placement="top" title="Editer"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/pencil.svg" width=20 height=20 ></a>
                                            <a href="{{url('patient/'.$liste->id.'/show')}}" class="btn btn" style="margin: 5px; padding:6px;background-color:#07d5fc" data-toggle="tooltip" data-placement="top" title="Vue"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/eye.svg" width=20 height=20 ></a>
                                            <a href="#" class="btn btn" data-toggle="modal" data-target="#ModalDelete{{$liste->id}}" style="margin: 5px; padding:6px;background-color:#cc0000" ><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/trash.svg"  width=20 height=20 data-toggle="tooltip" data-placement="top" title="Supprimer"></a>
                                            @include('patient.delete')
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
    
    
    
@endsection
