@extends('app')
@extends('script')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 80px">
            
            <div style="margin-top:38px;background-color:white">
                <div style="background-color:silver;padding:5px;margin:0 0 18px">
                    <h3>
                      Historiques des rendez-vous
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