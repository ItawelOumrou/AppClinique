@extends('app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
            <h3>Ajouter une specialite</h3>
                <form action="{{url('/specialite')}}" method="post">
               {{ csrf_field()}}
                    <div class="form-group">
                        <label for="">Spécialité :</label>
                        <input type="text" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection