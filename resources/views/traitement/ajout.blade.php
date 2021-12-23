@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;height:400px">
            <div class="p-3 mb-2 bg-primary text-dark col-md-12" style="padding:20px;margin-bottom:20px">
                 <h3 style="font-weight:bold;text-align:center;font-size:32px;color:white"> Ajout du traitement <h3>
            </div>
                <form action="{{'/traitement/store'}}" method='post'>
                 @csrf
                    
                    <div class="form-group ">
                        <label for="">Nom & Prénom du Médecin :</label>
                        <select name="idmed"  class="form-control">
                            @foreach($med as $md)
                                <option value="{{$md->id}}">{{$md->prenom.' '.$md->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Type de traitement :</label>
                        <select name="typetr"  class="form-control">
                            @foreach($type as $tp)
                                <option value="{{$tp->id}}">{{$tp->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description :</label>
                        <textarea name="desc" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Résultats :</label>
                        <input type="text" name="resultat" class="form-control" required>
                    </div>
                    <div class="form-group hidden">
                        <input type="text" value="{{ $idpat }}" name="idpatient">
                    </div>
                    <div class="form-group">
                        
                    <input type="submit"  value="Enregistrer" class="form-control bttb btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
