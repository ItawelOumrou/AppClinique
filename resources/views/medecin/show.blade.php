@extends('app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2" style="margin-top: 80px">
            <div class="pull-left" style="margin-bottom: 20px">
                <a href="{{url('medecin')}}" class="btn btn-warning">Retour</a>
                </div>
                <table class="table table-striped" style="height:300px"> 

                        <tr>
                            <th>Nom</th>
                            <td> {{$list->nom}} </td> 
                        </tr>
                        <tr>
                            <th>Prénom</th>
                            <td> {{$list->prenom}} </td> 
                        </tr>
                            <th>NNI</th>
                            <td> {{$list->nni}} </td> 
                        </tr>
                        <tr>
                            <th>Numéro du téléphone</th>
                            <td> {{$list->numTelephone}} </td> 
                        </tr>
                        <tr>
                            <th>Spécialité</th>
                            <td> {{$list->specialite}} </td> 
                        </tr>
                </table>
            </div>
        </div>
    </div>
    
@endsection