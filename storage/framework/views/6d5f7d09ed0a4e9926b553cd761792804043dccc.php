<div class="modal fade" id="edit" tabindex="-1" role="dialog">
    <form method="POST" v-on:submit.prevent="actualizarLibro(fillLibro.id)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Editar Libro</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="titulo" class="col-sm-2 col-form-label col-form-label-sm">Titulo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="titulo" v-model="fillLibro.titulo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="autor" class="col-sm-2 col-form-label col-form-label-sm">Autor:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="autor" v-model="fillLibro.autor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tema" class="col-sm-2 col-form-label col-form-label-sm">Tema:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="tema" v-model="fillLibro.tema">
                        </div>
                    </div>
                    <span v-for="error in errors" class="text-danger">{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
                </div>
            </div>
        </div>
    </form>
</div>