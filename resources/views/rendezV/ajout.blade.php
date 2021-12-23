@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;height:400px">
           
            <div style="margin-top:80px">
                <div style="background-color:silver;padding:5px;margin-bottom:18px">
                    <h3>
                    Ajouter un rendez-vous
                    </h3>
                </div>
                <div>
                    <form action="{{'/rendezV/store'}}" method='post'>
                    @csrf
                        
                        <div class="form-group">
                            <label for="">Nom & Prénom du Patient :</label>
                            <select name="idpt"  class="form-control" requied>
                                @foreach($patient as $pt)
                                    <option value="{{$pt->id}}">{{$pt->prenom.' '.$pt->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="">Nom & Prénom du Médecin :</label>
                            <select name="idmed"  class="form-control">
                                @foreach($list as $md)
                                    <option value="{{$md->id}}">{{$md->prenom.' '.$md->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group hidden">
                            <label for="">Date:</label>
                            <input type="date" id="datep" name="datep" value="{{ $ldate = date('Y-m-d'); }}"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Date rendez-vous :</label>
                            <input type="date" id="dater" name="dateRen"   class="form-control" max="2030-12-31">
                            <span class="text-danger" id="mssg"></span>
                        </div>
                        <div class="form-group">
                            
                        <input type="button" id="bt" onclick="valide()"  value="Enregistrer" class="form-control bttb btn-primary">
                        </div>
                    </form>
                </div>
            </div>
                
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
