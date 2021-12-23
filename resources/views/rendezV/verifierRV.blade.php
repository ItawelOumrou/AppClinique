@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin-top: 80px">
            <form action="" method="post"></form>
                <div class="form-group">
                    <label for="">Nom & Prénom du Patient</label>
                    <select name="verifieRV" class="form-control" >
                             @foreach($pt as $pt)
                                <option value="{{$pt->id}}">{{$pt->prenom.' '.$pt->nom}}</option>
                            @endforeach

                    </select>
                    <input type="submit" value="Vérifier" class="form-control btn btn-success" style="margin-top:8px">
                </div>
                
            </form> 
                @foreach($verif as $vr)
                    @if($vr->idPatient == $verifieRV)
                        <table id="datatable" class="table" style="font-size: 15px"> 
                            <thead>
                                <tr>
                                    <th>Nom & Prénom du Patient</th>
                                    <th>Nom & Prénom du Médecin</th>
                                    <th>Date rendez-vous</th>
                                </tr>
                            </thead>
                                <body>
                                <tr>
                                    @foreach($pt as $pati)
                                        @if($pati->id == $verif->idPatient)
                                            <td> {{ $pati->prenom.' '.$pati->nom }} </td> 
                                        @endif
                                    @endforeach
                                    @foreach($medeci as $medec)
                                        @if($medec->id == $verif->idMedecin)
                                            <td> {{ $medec->prenom.' '.$medec->nom }} </td> 
                                        @endif
                                    @endforeach
                                    <td> {{$vr->dateRendezVous}} </td>
                                    </tr>
                                </body>
                            </table>
                        @endif
                @endforeach
        </div>
    </div>
</div>

@endsection