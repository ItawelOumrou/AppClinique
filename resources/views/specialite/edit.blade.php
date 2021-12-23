@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10" style="margin-top:80px">
                <form action="{{url('specialite/'.$specialite->id)}}" method='post'>
                @csrf
                <input type='hidden' name='_method' value="PUT">
                    <div class="form-group">
                        <label for="">Nom :</label>
                        <input type="text"  name="nomSpecialite" class="form-control" value="{{ $specialite ->nomSpecialite}}">
                    </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection