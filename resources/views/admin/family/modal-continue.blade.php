<div id="modal-continue" class="modal fade modal-slide-in-right" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="{{url ('family/gotosocioeconomic') }}" method="post"> 
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¡Atencion!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Hay más familiares que registrar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Si</button>
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">No, continuar</button>
                </div>
            </div>
        </div>
    </form>
</div>