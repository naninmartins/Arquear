<!--Modal: Generico para Delete -->

<div class="modal fade" id="{{ isset($modal) ? $modal : 'myModal' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger align-center" role="document">
        <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                        <h4 class="modal-title">Confirmar exclusão</h4>
                    </div>
                <!--Header-->
                <!--Body-->
                    <div class="modal-body">
                        <p class="heading">{{ isset($message) ? $message : 'Alerta' }}</p>
                    </div>
                <!--Body-->
                <!--Footer-->
                    <div class="modal-footer text-center mt-4">
                        <button class="btn  btn btn-success"  data-dismiss="modal" id="confirmar">Confirmar</button>
                        <button class="btn  btn btn-danger" data-dismiss="modal" >Cancelar</button>
                    </div>
                <!--Footer-->
            </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalConfirmDelete-->

@section('js')
<script>
    var id = null;
    $(function(){
        $(document).on('click', '[data-toggle="modal"]', function(event){
            event.preventDefault();
            target = $(this).attr("data-target");
            id = $(this).attr("id");
        });
    });

    document.getElementById('confirmar').addEventListener('click', ()=>{
        event.preventDefault();
        document.getElementById("{{ $idForm }}"+id).submit();
    });
    function confirmar(){
         //esse javascript é mais facil de intender
    }
</script>
@endsection
