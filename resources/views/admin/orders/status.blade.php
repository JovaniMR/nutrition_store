<!-- Update shipment status -->
<div class="modal fade" id="shipment_status-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estado del pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('order.update',$order->id) }}" method="POST">
          @csrf
            <div class="modal-body">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="shipment_status">
                      <option value="Pendiente">Pendiente</option>
                      <option value="En preparación">En preparación</option>
                      <option value="Enviado">Enviado</option>
                    </select>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm btn-block">Modificar</button>
            </div>
        </form>
      </div>
    </div>
  </div>