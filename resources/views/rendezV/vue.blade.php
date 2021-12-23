@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2" style="margin-top: 80px">
            <div class="pull-left" style="margin-bottom: 20px">
                <a href="{{url('rendezV')}}" class="btn btn-warning">Retour</a>
                </div>
                <table class="table table-striped" style="height:300px"> 
                   
                    <head>
                            <tr>
                                <th>Nom & Prénom du Patient</th>
                                @foreach($pat as $pt)
                                    @if($var->idPatient == $pt->id)
                                    <td> {{$pt->prenom.' '.$pt->nom}} </td> 
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <th>Nom & Prénom du Médecin</th>
                                @foreach($med as $md)
                                    @if($var->idMedecin == $md->id)
                                    <td> {{$md->prenom.' '.$md->nom}} </td> 
                                    @endif
                                @endforeach 
                            </tr>
                            <tr>
                                <th>Date de prise  de rendez-vous</th>
                                <td> {{$var->datePrendreRV}}  </td> 
                            </tr>
                            <tr>
                                 <th>Date de rendez-vous</th>
                                <td> {{$var->dateRendezVous }} </td> 
                            </tr>
                    </head>
                </table>
            </div>
        </div>
    </div>
    
@endsection