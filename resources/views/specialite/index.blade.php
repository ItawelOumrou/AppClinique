@extends('app')
@extends('script')
    @section('content')
   
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2"  style="margin-top: 80px">

            <div class="pull-right" >
                            <a href="{{url('specialite/create')}}" class="btn btn-success bi bi-person-plus " 
                                data-toggle="tooltip" data-placement="top" title="Nouveau Spécialité"></a>
              </div>
            <div style="margin-top:38px;background-color:white">
                <div style="background-color:silver;padding:5px;margin:0 0 18px">
                    <h1>Liste des Spécialités</h1>
                </div>
                <div style="background-color:white;padding:10px">
                    @if(session('status'))
                    @endif
                    <table class="table" id="datatable"  style="font-size: 15px" id="myTable"> 
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach($specialite as $specia)
                            <tr>
                        <td> {{$specia->nomSpecialite}} </td> 
                        <td>
                            <a  href="{{url('specialite/'.$specia->id.'/edit')}}" class="btn btn"  style="margin: 5px; padding:6px;background-color:#306ed0" data-toggle="tooltip" data-placement="top" title="Editer"><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/pencil.svg" width=20 height=20 ></a>
                            <a href="#" class="btn btn" data-toggle="modal" data-target="#ModalDelete{{$specia->id}}"style="margin: 5px; padding:6px;background-color:#cc0000" ><img src="/images/bootstrap-icons-1.5.0/bootstrap-icons-1.5.0/trash.svg"  width=20 height=20 data-toggle="tooltip" data-placement="top" title="supprimer"></a>
                            @include('Specialite.delete')
                        </td> 
                        
                                @endforeach
                            </tr>
                        </body>
                    </table>
                </div>
            </div>
                
               
            </div>
        </div>
    </div>

   
@endsection