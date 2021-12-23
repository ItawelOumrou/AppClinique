@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin-top: 80px">
            <form action="{{url('/rendezV/verifierRV')}}" method="post"></form>
                <div class="form-group">
                    <label for="">Nom & Prénom du Patient</label>
                    <select  class="form-control" name="verifieRV">
                        <option value="">Choisir le nom du patient</option>
                             @foreach($pat as $pt)
                                <option value="{{$pt->id}}">{{$pt->prenom.' '.$pt->nom}}</option>
                                
                            @endforeach

                    </select>
                    <input type="submit" value="verifier">
                </div>
                
            </form>
            <!-------------------------------------------
            
            @if(!empty($verifieRV))
               
                        <table class="table" style="font-size: 15px"> 
                            <thead>
                                <tr>
                                    <th>Nom & Prénom du Patient</th>
                                    <th>Nom & Prénom du Médecin</th>
                                    <th>Date rendez-vous</th>
                                </tr>
                            </thead>
                            @foreach($verif as $vr)
                                <body>
                                <tr>
                                    @foreach($pat as $pati)
                                        @if($pati->id == $vr->idPatient)
                                            <td> {{ $pati->prenom.' '.$pati->nom }} </td> 
                                        @endif
                                    @endforeach
                                    @foreach($medec as $medeci)
                                        @if($medeci->id == $vr->idMedecin)
                                            <td> {{ $medeci->prenom.' '.$medeci->nom }} </td> 
                                        @endif
                                    @endforeach
                                    <td> {{$vr->dateRendezVous}} </td>
                                    </tr>
                                </body>
                                @endforeach
                            </table>
                
            @endif -->
        </div>
    </div>
</div>

@endsection