@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="pull-left" style="margin-top: 51px">
                    <a href="{{url('patient')}}" class="btn btn-warning">Retour</a>
                </div>
            <div class="col-md-6 col-md-offset-2" style="margin-top: 80px">
                
                <div>
                    <div>
                        <h4 >Les informations du patient</h4>
                    </div>
                
               
                    <div>
                        
                        <table class="table" style="height:200px;width:100%"> 
                                <tr>
                                    <th>Nom</th>
                                    <td> {{$list->nom}} </td> 
                                </tr>

                                <tr>
                                    <th>Prénom</th>
                                    <td> {{$list->prenom}} <td> 
                                </tr>

                                <tr>
                                    <th>NNI</th>
                                    <td> {{$list->nni}} </td> 
                                </tr>

                                <tr>
                                    <th>Numéro du téléphone</th>
                                    <td> {{$list->numTelephone}} </td> 
                                </tr>

                                <tr>
                                    <th>date de naissance</th>
                                    <td> {{ $list->dateNaiss }}
                                </tr>

                                <tr>
                                    <th>Lieu de naissance</th>
                                    <td> {{ $list->lieuNaiss }}
                                </tr>

                                <tr>
                                    <th>Genre</th>
                                    <td> {{$list->genre}}  </td> 
                                </tr>

                                <tr>
                                    <th>Age</th>
                                    <td> {{$list->age}} </td> 
                                </tr>
                        </table>
                    </div>
            </div>
            {{$code = 0}}
            @foreach($rv as $ren)
                @if($list->id == $ren->idPatient)
                    {{$code = $code + 1}}
                    
                @endif
                @endforeach
            @if($code  <> 0)
            <div class="col-md-11">
                <div style="background-color:white;margin-top:10px;border-radius:5px;">
                    <h4 style="text-align:center;font-weight:bold">Les rendez-vous</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom & Prénom du médecin</th>
                                    <th>Date de rendez-vous</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($rv as $ren)
                                        @if($list->id == $ren->idPatient)
                                            <tr>
                                                     @foreach($med as $md)
                                                            @if($ren->idMedecin == $md->id)
                                                            <td> {{$md->prenom.' '.$md->nom}} </td> 
                                                            @endif
                                                    @endforeach 
                                                        <td>{{$ren->dateRendezVous }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                            
                            </tbody>
                        </table>
                </div>
                
            </div>
            @endif
            
        </div>
        </div>
    </div>
    
@endsection