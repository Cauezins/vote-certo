<!-- Modal Component -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">Criar Novo Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" id="" class="formModalUser">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="image-container" id="imageContainer" style="background-image: url({{Storage::url('profile_images/image_default.jpg')}});">
                                <input type="hidden" id="itemId">
                                <input type="file" id="imageInput" name="img_profile" accept="image/*"
                                    onchange="loadFile(event)">
                                <div class="message-overlay">Selecione uma imagem</div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nameInputModal">Nome:</label>
                                    <input type="text" class="form-control" id="nameInputModal"
                                        placeholder="Roberto Faria" name="name" autocomplete="false">

                                </div>
                                <div class="col-md-6">
                                    <label for="emailInputModal">Email:</label>
                                    <input type="email" class="form-control" id="emailInputModal"
                                        placeholder="name@example.com" name="email" autocomplete="false">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nameInputModal">Senha:</label>
                                    <input type="password" class="form-control" id="passwordInputModal" name="password"
                                        placeholder="Senha">

                                </div>
                                <div class="col-md-6">
                                    <label for="emailInputModal">Cargo:</label>
                                    <select class="form-control" name="position" id="positionInputModal"
                                        autocomplete="false">
                                        <option value="1">Usuário</option>
                                        <option value="50">Suporte</option>
                                        <option value="99">Administrador</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row" style="--bs-gutter-x:0;">
                                <div id="msgModalUser" class="" style="padding:8px; margin: 10px 0; display:none;">
                                </div>
                            </div>

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
