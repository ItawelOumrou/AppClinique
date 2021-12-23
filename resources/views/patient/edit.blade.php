     @extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 40px">
            <div style="margin-top:48px">
                <div style="background-color:silver;padding:5px;margin-bottom:18px">
                    <h3>  Formulaire de modification </h3>
                </div>
                <div >
                <form action="{{url('patient/'.$patient->id)}}" method='post'>
                
                @csrf
                <input type='hidden' name='_method' value="PUT">
                    <div class="form-group @if($errors->get('nom')) has-error @endif">
                        <label for="">Nom :</label>
                        <input type="text"  name="nom" class="form-control" value="{{ $patient ->nom}}" required>
                        @if($errors->has('nom'))
                        <span class=" text-danger">
                            {{ $errors->first('nom') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->get('prenom')) has-error @endif">
                        <label for="">Prénom :</label>
                        <input type="text" name="prenom" class="form-control" value="{{ $patient ->prenom}}" required>
                        @if($errors->has('prenom'))
                        <span class=" text-danger">
                            {{ $errors->first('prenom') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->get('nni')) has-error @endif">
                        <label for="">NNI :</label>
                        <input type="number" name="nni" class="form-control" value="{{ $patient ->nni}}" oninput="javascript: if (this.value.length > this.maxLength) 
                            this.value = this.value.slice(0, this.maxLength);"  maxlength = "10" required > 
                        @if($errors->has('nni'))
                        <span class=" text-danger">
                            {{ $errors->first('nni') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->get('numTelephone')) has-error @endif">
                        <label for="">Numero du téléphone :</label>
                        <input type="number" id="numtel" name="numTelephone" class="form-control" value="{{ $patient ->numTelephone}}"required
                          class="form-control" 
                            oninput="javascript: if (this.value.length > this.maxLength)
                             this.value = this.value.slice(0, this.maxLength);" maxlength = "8" onkeyup="return valide(this.value);">
                        @if($errors->has('numTelephone'))
                            <span class="text-danger" id="msg">
                                {{ $errors->first('numTelephone') }}
                            </span>
                        @endif
                        <span class="text-danger" id="msg" style="font-size:20px"></span>
                    </div>
                    <div class="form-group @if($errors->get('dateN')) has-error @endif">
                        <label for="">Date de naissance :</label>
                        <input type="date" name="dateN" class="form-control" value="{{ $patient ->dateNaiss}}" required
                        max="2030-12-31">
                        @if($errors->has('dateN'))
                        <span class=" text-danger">
                            {{ $errors->first('dateN') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Lieu De Naissance :</label>
                        <select name='lieuN' class="form-control">
                        <option value='{{$patient ->lieuNaiss}}'>{{$patient ->lieuNaiss}}</option>
                            @foreach($wilaya as $wilay)
                                @if($patient ->lieuNaiss == $wilay->lieuNaiss)
                                @else
                                    <option value='{{$wilay->lieuNaiss}}'>{{$wilay->lieuNaiss}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" class="form-control">
                        <label for="">Genre :</label>
                        @if( $patient ->genre  =='Masculin')
                            <select name='genre' class="form-control">
                                <option value='Masculin'>Masculin</option>
                                <option value='Féminin'>Féminin</option>
                            </select>
                        @else
                            <select name='genre' class="form-control">
                                <option value='Féminin'>Féminin</option>
                                <option value='Masculin'>Masculin</option>
                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <a href="{{url('patient')}}" class="btn btn-danger" style="width:48%">Annuler</a>
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
                        
                           mssg.innerHTML = "le numéro du téléphone doit commener par 2 , 3 ou 4";
                           btn.type="button";
                       }
                       else{
                            mssg.innerHTML = "";
                            btn.type="submit";
                    }
                            
                
          }
      </script>


@endsection