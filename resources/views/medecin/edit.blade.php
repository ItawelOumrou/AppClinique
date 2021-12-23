
     @extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top:80px">
                <div style="margin-top:48px">
                    <div style="background-color:silver;padding:5px;margin-bottom:18px">
                        <h3>Formulaire de modification du médecin <h3>
                    </div>
                    <div>
                    <form action="{{url('medecin/'.$medecin->id)}}" method='post'>
                @csrf
                <input type='hidden' name='_method' value="PUT">
                    <div class="form-group @if($errors->get('nom')) has-error @endif">
                        <label for="">Nom :</label>
                        <input type="text"  name="nom" class="form-control" value="{{ $medecin ->nom}}" required>
                        @if($errors->has('nom'))
                        <span class=" text-danger">
                            {{ $errors->first('nom') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->get('prenom')) has-error @endif">
                        <label for="">Prénom :</label>
                        <input type="text" name="prenom" class="form-control" value="{{ $medecin ->prenom}}" required>
                        @if($errors->has('prennom'))
                        <span class=" text-danger">
                            {{ $errors->first('prenom') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->get('nni')) has-error @endif">
                        <label for="">NNI :</label>
                        <input type="number" name="nni" class="form-control" value="{{ $medecin ->nni}}" required
                         oninput="javascript: if (this.value.length > this.maxLength) 
                            this.value = this.value.slice(0, this.maxLength);"  maxlength = "10">
                        @if($errors->has('nni'))
                        <span class="text-danger">
                            {{ $errors->first('nni') }}
                        </span>
                        @endif 
                    </div>
                    <div class="form-group @if($errors->get('numTelephone')) has-error @endif">
                        <label for="">Numero du téléphone :</label>
                        <input type="number" name="numTelephone" id="numtel" class="form-control" value="{{ $medecin ->numTelephone}}" required
                          oninput="javascript: if (this.value.length > this.maxLength) 
                            this.value = this.value.slice(0, this.maxLength);"  maxlength = "8" onkeyup="return valide(this.value);" autocomplete="off">
                        @if($errors->has('numTelephone'))
                        <span class="text-danger" id="msg">
                            {{ $errors->first('numTelephone') }}
                        </span>
                        @endif
                        <span class="text-danger" id="msg" style="font-size:20px"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Spécialité:</label>
                        <select name="specialite"  class="form-control" >
                        <option value="{{$medecin->specialite}}">{{$medecin->specialite}}</option>
                            @foreach($specialit as $nomspec)
                            @if($medecin->specialite === $nomspec->nomSpecialite)
                            @else
                            <option value="{{$nomspec->nomSpecialite}}">{{$nomspec->nomSpecialite}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <a href="{{url('medecin')}}" class="btn btn-danger" style="width:48%">Annuler</a>
                        <button type="submit" id="bt" class="btn btn-success" style="width:51%">Modifier</button>
                    </div>
                </form>
                    </div>
                </div>
            
                
            </div>
        </div>
    </div>

    <script>
          function valide(numtel){
         
              var 
                    mssg = document.getElementById('msg'),
                    btn = document.getElementById('bt'),
                     regex = /^[234].*$/;
            
                     if(numtel  == ""){
                        
                        mssg.innerHTML = "";
                        btn.type="button";
                        
                    }
                      else if(!numtel.match(regex)){
                        
                           mssg.innerHTML = "le numéro de téléphone doit commener par 2 , 3 ou 4";
                           btn.type="button";
                           
                       }
                       else{
                            mssg.innerHTML = "";
                            btn.type="submit";
                    }
                            
                
          }
      </script>
@endsection