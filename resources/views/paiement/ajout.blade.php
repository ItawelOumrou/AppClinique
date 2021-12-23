@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2" style="margin-top: 40px;">
            
            <div style="margin-top:80px">
                <div style="background-color:silver;padding:5px;margin-bottom:18px">
                    <h3>
                        Ajout du paiement
                    </h3>
                </div>
                <div>
                    <form action="{{'/paiement/store'}}" method='post'>
                    @csrf
                        
                        <div class="form-group">
                            <label for="">Nom & Prénom du Patient :</label>
                            <select name="idpt"  class="form-control" requied>
                                @foreach($pat as $pt)
                                    @foreach($ren as $rv)
                                    @if($pt->id == $rv->idPatient)
                                    <option value="{{$pt->id}}">{{$pt->prenom.' '.$pt->nom}}</option>
                                    @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Montant</label>
                            <input type="number" class="form-control" name="montant" required>
                        </div>
                        <div class="form-group hidden">
                            <label for="">Date du paiement:</label>
                            <input type="date"  name="datepaiement" value="{{ $ldate = date('Y-m-d'); }}"  class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            
                        <input type="submit"  value="payer" class="form-control btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
               
            </div>
        </div>
    </div>
@endsection
