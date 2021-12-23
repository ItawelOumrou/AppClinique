@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 40px">
            <div class="p-3 mb-2 bg-primary text-dark col-md-12" style="padding:20px;margin-bottom:20px">
                 <h3 style="font-weight:bold;text-align:center;font-size:32px;color:white">Modification du rendez-vous <h3>
            </div>
                <form action="{{ url('/rendezV/'.$rendez->id) }}" method='post'>
                @csrf 
                <input type='hidden' name='_method' value="PUT">
                    <div class="form-group">
                        <label for="">Nom & Prénom du patient :</label>
                        <select name="idpt"  class="form-control">
                             @foreach($patient as $pt)
                                @if($pt->id == $rendez->idPatient)
                                <option value="{{$pt->id}}">{{$pt->prenom.' '.$pt->nom}}</option>
                                @endif
                            @endforeach
                            @foreach($patient as $pt)
                                @if($pt->id == $rendez->idPatient)
                                @else
                                     <option value="{{$pt->id}}">{{$pt->prenom.' '.$pt->nom}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nom & Prénom du médecin :</label>
                        <select name="idmed"  class="form-control">
                            @foreach($med as $md)
                                @if($md->id == $rendez->idMedecin)
                                <option value="{{$md->id}}">{{$md->prenom.' '.$md->nom}}</option>
                                @endif
                            @endforeach
                            @foreach($med as $md)
                                @if($md->id == $rendez->idMedecin)
                                @else
                                     <option value="{{$md->id}}">{{$md->prenom.' '.$md->nom}}</option>
                                @endif
                                 @endforeach
                        </select>
                    </div>
                    <div class="form-group hidden">
                        <label for="">Date :</label>
                        <input type="date" name="datep" id="datep" class="form-control" value="{{ $rendez ->datePrendreRV }}">
                    </div>
                    <div class="form-group">
                        <label for="">Date rendez-vous :</label>
                        <input type="date" name="dater" id="dater" class="form-control" value="{{ $rendez ->dateRendezVous}}">
                        <span class="text-danger" id="mssg"></span>
                    </div>
                    
                    <div class="form-group">
                         <a href="{{url('rendezV')}}" class="btn btn-danger" style="width:370px">Annuler</a>
                        <button type="button" id="bt" onclick="valide()"  class="btn btn-success" style="width:370px">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function valide(){
            var datep = document.getElementById('datep').value,
            dater = document.getElementById('dater').value,
            btn = document.getElementById('bt'),
            mssg = document.getElementById('mssg');

            if(dater < datep)
                mssg.innerHTML = "La date du rendez-vous doit être supérieure à la date d'aujourd'hui";
            else
                btn.type="submit";
        }
       
    </script>

@endsection