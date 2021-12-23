@extends('app')
@extends('script')
    @section('content')
   
    <div class="container">
        <div class="row">
            <div class="col-md-12"  style="margin-top: 80px">
            
                <div class="pull-right">
                <a href="{{url('paiement/ajout')}}" class="btn btn-success">Nouveau Traitement</a>
                </div>
                <div style="margin-top:38px;background-color:white">
                    <div style="background-color:silver;padding:5px;margin:0 0 18px">
                        <h3>
                        Liste des traitements
                        </h3>
                    </div>
                    <div style="background-color:white;padding:10px">
                            <table class="table" id="datatable"  style="font-size: 15px" id="myTable"> 
                            <thead>
                                <tr>
                                    <th>Nom & Prénom du Patient</th>
                                    <th>Nom & Prénom du Médecin</th>
                                    <th>Type Traitement</th>
                                    <th>Description</th>
                                    <th>Résultats</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <body>
                                @foreach($trai as $tr)
                                    <tr>
                                            @foreach($pt as $pat)
                                                @if($pat->id == $tr->idPatients)
                                                    <td> {{ $pat->prenom.' '.$pat->nom }} </td> 
                                                @endif
                                            @endforeach
                                            @foreach($medeci as $medec)
                                                @if($medec->id == $tr->idMedecins)
                                                    <td> {{ $medec->prenom.' '.$medec->nom }} </td> 
                                                @endif
                                            @endforeach 
                                            @foreach($type as $tp)
                                                @if($tp->id == $tr->typeTraitement)
                                                    <td> {{ $tp->libelle}} </td> 
                                                @endif
                                            @endforeach
                                            <td>{{ $tr->description }}</td>
                                            <td>{{ $tr->resultats }}</td>
                                            <td>
                                                <a  href="#" class="btn btn"  style="margin: 5px; padding:6px;background-color:#306ed0" data-toggle="tooltip" data-placement="top" title="Editer"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/pencil.svg" width=20 height=20 ></a>
                                                <a href="#" class="btn btn" style="margin: 5px; padding:6px;background-color:#07d5fc" data-toggle="tooltip" data-placement="top" title="Vue"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/eye.svg" width=20 height=20 ></a>
                                                <a href="#" class="btn btn" data-toggle="modal" data-target="" style="margin: 5px; padding:6px;background-color:#cc0000" ><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/trash.svg"  width=20 height=20 data-toggle="tooltip" data-placement="top" title="supprimer"></a>
                                                
                                            </td> 
                                    </tr>
                                @endforeach
                            </body>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
@endsection