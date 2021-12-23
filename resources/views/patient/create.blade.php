    @extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 40px">
            <div style="margin-top:48px">
                <div style="background-color:silver;padding:5px;margin-bottom:18px">
                    <h3>  Formulaire d'ajout un patient</h3>
                </div>
                <div >

                    <form action="{{'/patient'}}" method='post' autocomplete="off">
                    {{csrf_field()}} 
                        <div class="form-group @if($errors->get('nom')) has-error @endif">
                            <label for="">Nom :</label>
                            <input type="text"  name="nom" class="form-control" value="{{ old('nom')}}" required>
                            @if($errors->has('nom'))
                            <span class=" text-danger">
                                {{ $errors->first('nom') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->get('prenom')) has-error @endif">
                            <label for="">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" value="{{ old('prenom')}}"required>
                            @if($errors->has('prenom'))
                            <span class=" text-danger">
                                {{ $errors->first('prenom') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->get('nni')) has-error @endif">
                        <label for="">NNI :</label>
                            <input type="number"    name="nni" class="form-control" 
                                oninput="javascript: if (this.value.length > this.maxLength) 
                                this.value = this.value.slice(0, this.maxLength);"  maxlength = "10"
                                value="{{ old('nni')}}" required > 
                            @if($errors->has('nni'))
                            <span class=" text-danger">
                                {{ $errors->first('nni') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group @if($errors->get('numTelephone')) has-error @endif">
                            <label for="numTelephone">Numero du téléphone :</label>
                            <input type="number" name="numTelephone" id="numtel"  class="form-control" 
                                oninput="javascript: if (this.value.length > this.maxLength)
                                this.value = this.value.slice(0, this.maxLength);" maxlength = "8" 
                                value="{{ old('numTelephone')}}" required onkeyup="return valide(this.value);"
                                placeholder="le numéro du téléphone doit commencer par 2 , 3 ou 4" autocomplete="off">
                            @if($errors->has('numTelephone'))
                                <span class="text-danger">
                                    {{ $errors->first('numTelephone') }}
                                </span>
                            @endif
                            <span class="text-danger" id="msg"></span>
                        </div>
                        
                        <div class="form-group @if($errors->get('dateN')) has-error @endif">
                            <label for="">Date de naissance :</label>
                            <input type="date" name="dateN" class="form-control" value="{{ old('dateN')}}" required
                            max="2030-12-31">
                            @if($errors->has('dateN'))
                            <span class="text-danger">
                                {{ $errors->first('dateN') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Lieu De Naissance :</label>
                            <select name='lieuN' class="form-control" >
                                @if($errors)
                                <option selected disabled>Choisi un lieu de naissance</option>
                                    @foreach($wilaya as $wilay)
                                        @if($wilay->lieuNaiss == old('lieuN'))
                                            <option value='{{$wilay->lieuNaiss}}'  >{{$wilay->lieuNaiss}}</option>
                                        
                                        @endif
                                    @endforeach
                                    @foreach($wilaya as $wilay)
                                        @if($wilay->lieuNaiss == old('lieuN'))
                                            @else
                                                <option value='{{$wilay->lieuNaiss}}'  >{{$wilay->lieuNaiss}}</option>
                                            @endif
                                    @endforeach
                                    
                                @else
                                    @foreach($wilaya as $wilay)
                                        <option value='{{$wilay->lieuNaiss}}'  >{{$wilay->lieuNaiss}}</option> 
                                    @endforeach
                                @endif
                                
                            </select>
                        </div>
                        <div class="hidden">
                            <input type="date" name="dateSta" value="{{ $ldate = date('Y-m-d'); }}">
                        </div>
                        <div class="form-group">
                            <label for="">Genre :</label>
                            <select name='genre' class="form-control">
                                @if($errors)
                                <option selected disabled>genre</option>
                                            @if(old('genre') == 'Masculin')
                                                
                                                <option value='Masculin' >Masculin</option>
                                                <option value='Féminin' >Féminin</option>
                                            @else
                                                
                                                <option value='Féminin' >Féminin</option>
                                                <option value='Masculin' >Masculin</option>
                                            @endif
                                    @else
                                   
                                    <option value='Masculin'>Masculin</option>
                                    <option value='Féminin'>Féminin</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            
                        <input type="submit" id="bt"   value="Enregistrer" class="form-control bttb btn-success">
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
