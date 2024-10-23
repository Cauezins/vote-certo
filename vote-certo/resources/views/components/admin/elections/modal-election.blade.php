<!-- Modal Component -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">Criar Nova Eleição</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" id="formModalCreateElection">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="titleInputModal">Nome:</label>
                            <input type="text" class="form-control" id="titleInputModal" placeholder="Eleiçoes CIPA"
                                name="title" autocomplete="false">

                        </div>
                        <div class="col-md-6">
                            <label for="categoryInputModal">Categoria:</label>
                            <select class="form-control" name="category" id="categoryInputModal" autocomplete="false">
                                <option value="Public">Publica</option>
                                <option value="Private">Privada</option>
                                <option value="Corporate">Coorporação</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="startDateInputModal">Data de Inicio:</label>
                            <input type="datetime-local" class="form-control" id="startDateInputModal" name="start_date">

                        </div>
                        <div class="col-md-4">
                            <label for="endDateInputModal">Data de Termino:</label>
                            <input type="datetime-local" class="form-control" id="endDateInputModal" name="end_date">

                        </div>
                        <div class="col-md-4">
                            <label for="nameInputModal">Resultados Publicos?</label>
                            <br>
                            <input type="radio" name="public_results" value="1"> Sim
                            <input type="radio" name="public_results" value="0"> Não

                        </div>
                    </div>
                    <div class="row" style="--bs-gutter-x:0;">
                        <div id="msgModalUser" class="" style="padding:8px; margin: 10px 0; display:none;">
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="buttonSubmit">Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>
