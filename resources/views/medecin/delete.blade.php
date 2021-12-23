
<form action="{{url('medecin/'.$liste->id)}}" method="post" >
{{ method_field('delete') }}    
{{ csrf_field() }}

    <div class="modal fade" id="ModalDelete{{$liste->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" >Confirmation</h5>
                       <!-- <button type="button " class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>-->
                    </div>
                        <div class="modal-body">
                            Voulez-vous supprimer ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> {{ __('Non') }}</button>
                            <button type="submit" class="btn btn-primary delete">{{ __('Oui') }}</button>
                        </div>
                </div>
            </div>
        </div>
  </form>
  @section('scripts')
    <script>
        $(document).ready(function(){

            $('.delete').click(function(e){
                e.preventDefault();
                swal({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success",
                    button: "Aww yiss!",
                });
    </script>
    @endsection


  
