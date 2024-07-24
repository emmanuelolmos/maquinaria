<!-- Modal -->
<div class="modal fade" id="addMachineryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMachineryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="addMachineryModalLabel">Nueva maquina</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form id="formAddMachineryModal" enctype="multipart/form-data">
                <div id="errorMessageAddMachineryModal" class="text-center">
                    <!--Mensaje de error-->
                </div>
                <div class="text-center">
                    <label for="inputNameAddMachineryModal">Nombre:</label>
                    <input id="inputNameAddMachineryModal" name="inputNameAddMachineryModal" type="text" placeholder="Ingresa el nombre" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <label for="inputMarkAddMachineryModal">Marca:</label>
                    <input id="inputMarkAddMachineryModal" name="inputMarkAddMachineryModal" type="text" placeholder="Ingresa la marca" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <label for="inputModelAddMachineryModal">Modelo:</label>
                    <input id="inputModelAddMachineryModal" name="inputModelAddMachineryModal" type="text" placeholder="Ingresa el modelo" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <label for="inputSerieAddMachineryModal">Número de serie:</label>
                    <input id="inputSerieAddMachineryModal" name="inputSerieAddMachineryModal" type="text" placeholder="Ingresa el número de serie" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <div class="d-flex align-items-center justify-content-center">
                        <label for="inputDescriptionAddMachineryModal">Observaciones:</label>
                        <textarea id="inputDescriptionAddMachineryModal" name="inputDescriptionAddMachineryModal" style="margin-left: 8px; width:250px" placeholder="Ingresa las observaciones"></textarea>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <label for="inputDateAddMachineryModal">Fecha de compra:</label>
                    <input id="inputDateAddMachineryModal" name="inputDateAddMachineryModal" type="date" required pattern="\d{4}-\d{2}-\d{2}" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <label for="selectStatusAddMachineryModal">Estatus:</label>
                    <select name="selectStatusAddMachineryModal" id="selectStatusAddMachineryModal" style="margin-left: 8px; width: 250px;">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="selectCompanyAddMachineryModal">Empresa:</label>
                    <select id="selectCompanyAddMachineryModal" name="selectCompanyAddMachineryModal" style="margin-left: 8px; width: 250px;">
                        <!--Listado de empresas>-->
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="inputImageAddMachineryModal">Imagen:</label>
                    <input id="inputImageAddMachineryModal" name="inputImageAddMachineryModal" type="file" accept="image/*" style="margin-left: 8px; width: 250px;">
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>

        </div>
        
        </div>
    </div>
</div>