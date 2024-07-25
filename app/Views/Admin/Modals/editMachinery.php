<!-- Modal -->
<div class="modal fade" id="editMachineryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMachineryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editMachineryModalLabel">Editar maquina</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form id="formEditMachineryModal" enctype="multipart/form-data">
                <div id="divIdEditMachineryModal">
                    <!--Id oculto-->
                </div>
                <div id="errorMessageEditMachineryModal" class="text-center">
                    <!--Mensaje de error-->
                </div>
                <div id="divNameEditMachineryModal" class="text-center">
                    <label for="inputNameEditMachineryModal">Nombre:</label>
                    <!--<input id="inputNameEditMachineryModal" name="inputNameEditMachineryModal" type="text" placeholder="Ingresa el nombre" style="margin-left: 8px; width: 250px;">-->
                </div>
                <div id="divMarkEditMachineryModal" class="text-center mt-4">
                    <label for="inputMarkEditMachineryModal">Marca:</label>
                    <!--<input id="inputMarkEditMachineryModal" name="inputMarkEditMachineryModal" type="text" placeholder="Ingresa la marca" style="margin-left: 8px; width: 250px;">-->
                </div>
                <div id="divModelEditMachineryModal" class="text-center mt-4">
                    <label for="inputModelEditMachineryModal">Modelo:</label>
                    <!--<input id="inputModelEditMachineryModal" name="inputModelEditMachineryModal" type="text" placeholder="Ingresa el modelo" style="margin-left: 8px; width: 250px;">-->
                </div>
                <div id="divSerieEditMachineryModal" class="text-center mt-4">
                    <label for="inputSerieEditMachineryModal">Número de serie:</label>
                    <!--<input id="inputSerieEditMachineryModal" name="inputSerieEditMachineryModal" type="text" placeholder="Ingresa el número de serie" style="margin-left: 8px; width: 250px;">-->
                </div>
                <div class="text-center mt-4">
                    <div id="divDescriptionEditMachineryModal" class="d-flex align-items-center justify-content-center">
                        <label for="inputDescriptionEditMachineryModal">Observaciones:</label>
                        <!--<textarea id="inputDescriptionEditMachineryModal" name="inputDescriptionEditMachineryModal" style="margin-left: 8px; width:250px" placeholder="Ingresa las observaciones"></textarea>-->
                    </div>
                </div>
                <div id="divDateEditMachineryModal" class="text-center mt-4">
                    <label for="inputDateEditMachineryModal">Fecha de compra:</label>
                    <!--<input id="inputDateEditMachineryModal" name="inputDateEditMachineryModal" type="date" required pattern="\d{4}-\d{2}-\d{2}" style="margin-left: 8px; width: 250px;">-->
                </div>
                <div class="text-center mt-4">
                    <label for="selectStatusEditMachineryModal">Estatus:</label>
                    <select name="selectStatusEditMachineryModal" id="selectStatusEditMachineryModal" style="margin-left: 8px; width: 250px;">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="selectCompanyEditMachineryModal">Empresa:</label>
                    <select id="selectCompanyEditMachineryModal" name="selectCompanyEditMachineryModal" style="margin-left: 8px; width: 250px;">
                        <!--Listado de empresas>-->
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="inputImageEditMachineryModal">Imagen:</label>
                    <input id="inputImageEditMachineryModal" name="inputImageEditMachineryModal" type="file" accept="image/*" style="margin-left: 8px; width: 250px;">
                </div>

                <div id="divImageEditMachineryModal" class="row text-center mt-4">
                    <label for="imageEditMachineryModal" class="mb-2">Imagen actual</label>
                    <!--<img id="imageEditMachineryModal" class="mx-auto" src="../../../../assets/img/default.png" style="width: 350px; height:200px;" alt="">-->
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>

        </div>
        
        </div>
    </div>
</div>