@extends('app')
@extends('script')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 80px">
                <div class="pull-right">
                    <a href="{{url('rendezV/ajout')}}" class="btn btn-success bi bi-person-plus " 
                                data-toggle="tooltip" data-placement="top" title="Nouveau Rendez-vous" ></a>
                </div>

                <div style="margin-top:38px;background-color:white">
                    <div style="background-color:silver;padding:5px;margin:0 0 18px">
                        <h3>
                            Liste des Rendez-vous
                        </h3>
                    </div>
                    <div style="background-color:white;padding:10px">
                    <table id="datatable" class="table" style="font-size: 15px"> 
                    <thead>
                        <tr>
                            <th>Nom & Prénom du Patient</th>
                            <th>Nom & Prénom du Médecin</th>
                            <th>Date prise rendez-vous</th>
                            <th>Date rendez-vous</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <body>
                        
                        @foreach($list as $liste)
                        <tr>
                            @foreach($patien as $pati)
                                @if($pati->id == $liste->idPatient)
                                    <td> {{ $pati->prenom.' '.$pati->nom }} </td> 
                                @endif
                            @endforeach
                            @foreach($medeci as $medec)
                                @if($medec->id == $liste->idMedecin)
                                    <td> {{ $medec->prenom.' '.$medec->nom }} </td> 
                                @endif
                            @endforeach 
                            <td> {{$liste->datePrendreRV}} </td>
                            <td> {{$liste->dateRendezVous}} </td>
                            <td>
                                <a href="{{url('/rendezV/'.$liste->id.'/editer')}}" class="btn btn" style="margin: 5px; padding:6px;background-color:#306ed0" data-toggle="tooltip" data-placement="top" title="Editer"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/pencil.svg" width=20 height=20 ></a>
                                <a href="{{url('rendezV/'.$liste->id.'/vue')}}" class="btn btn" style="margin: 5px; padding:6px;background-color:#07d5fc" data-toggle="tooltip" data-placement="top" title="Vue"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/eye.svg" width=20 height=20 ></a>
                                <button type="button" class="btn btn" data-toggle="modal" data-target="#ModalDelete{{$liste->id}}" style="margin: 5px; padding:6px;background-color:#cc0000" ><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/trash.svg"  width=20 height=20 data-toggle="tooltip" data-placement="top" title="Supprimer"></button>
                                @include('rendezV.supprimer')
                            </td> 
                                
                            @endforeach
                        </tr>
                    </body>
                </table>
                    </div>
                </div>
            
                
                
            </div>
        </div>
    </div>
    
@endsection