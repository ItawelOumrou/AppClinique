@extends('app')

    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-11" style="margin-top: 80px">
                
                <table class="table table-striped table-bordered" style="font-size: 15px"> 
                    <head>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>NNI</th>
                            <th>Numéro du téléphone</th>
                            <th>Genre</th>
                            <th>Age</th>
                        </tr>
                    </head>
                    <body>
                        
                        <tr>
                    <td> {{$list->nom}} </td> 
                    <td> {{$list->prenom}} </td> 
                    <td> {{$list->nni}} </td> 
                    <td> {{$list->numTelephone}} </td>
                    <td> {{$list->genre}}  </td> 
                    <td> {{$list->age}} </td>
                          
                        </tr>
                    </body>
                </table>
            </div>
        </div>
    </div>

@endsection