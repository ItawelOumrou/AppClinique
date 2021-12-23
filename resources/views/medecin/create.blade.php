      @extends('app')
    @section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 80px">
        <div style="margin-top:48px">
            <div style="background-color:silver;padding:5px;margin-bottom:18px">
                <h3> Formulaire d'ajout un médecin </h3>
            </div>
            <div >
                    <form action="{{'/medecin'}}" method="post">
                @csrf 
                    <div class="form-group @if($errors->get('nom')) has-error @endif">
                        <label for="" >Nom</label>
                        <input type="text" name="nom"  class="form-control" required value="{{ old('nom')}}">
                        @if($errors->has('nom'))
                        <span class=" text-danger">
                            {{ $errors->first('nom') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group  @if($errors->get('prenom')) has-error @endif">
                        <label for="">Prénom</label>
                        <input type="text" name="prenom" class="form-control" required value="{{ old('prenom')}}">
                        @if($errors->has('prenom'))
                        <span class=" text-danger">
                            {{ $errors->first('prenom') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group  @if($errors->get('nni')) has-error @endif">
                        <label for="">NNI</label>
                        <input type="number" name="nni" class="form-control" required
                        oninput="javascript: if (this.value.length > this.maxLength) 
                            this.value = this.value.slice(0, this.maxLength);"  maxlength = "10"
                            value="{{ old('nni')}}">
                            @if($errors->has('nni'))
                            <span class="text-danger">
                                {{ $errors->first('nni') }}
                            </span>
                            @endif
                    </div>
                    <div class="form-group  @if($errors->get('numTelephone')) has-error @endif">
                        <label for="">Numéro du téléphone</label>
                        <input type="number" name="numTelephone" id="numtel" class="form-control" required
                        oninput="javascript: if (this.value.length > this.maxLength) 
                            this.value = this.value.slice(0, this.maxLength);"  maxlength = "8"
                            value="{{ old('numTelephone')}}" onkeyup="return valide(this.value);">
                            @if($errors->has('numTelephone'))
                            <span class="text-danger">
                                {{ $errors->first('numTelephone') }}
                            </span>
                            @endif
                            <div class="text-danger" id="msg"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Spécialité</label>
                        <select name="specialite"  class="form-control form-select">
                            <option selected disabled>Choisir une spécialité</option>
                            @foreach($list as $liste)
                            <option value="{{$liste->nomSpecialite}}">{{$liste->nomSpecialite}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="bt"    value="Enregistrer" class="form-control bttb btn-success">
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
