<!-- Classic Modal -->
<div class="modal fade" id="productRegister" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Nueva imágen</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-4">
                        <div class="col">
                            <input type="file" name="photo" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success ">Guardar imágen</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--  End Modal -->