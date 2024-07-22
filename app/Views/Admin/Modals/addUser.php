<!-- Modal -->
<div class="modal fade" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="addUserModalLabel">Nuevo usuario</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form id="formAddUserModal">
                <div id="errorMessage" class="text-center">
                    <!--Mensaje de error-->
                </div>
                <div class="text-center">
                    <label for="name">Nombre:</label>
                    <input id="name" name="name" type="text" placeholder="Ingresa el nombre" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <label for="phone">Teléfono:</label>
                    <input id="phone" name="phone" type="text" placeholder="Ingresa el número teléfonico" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <label for="password">Contraseña:</label>
                    <input id="password" name="password" type="text" placeholder="Ingresa la contraseña" style="margin-left: 8px; width: 250px;">
                </div>
                <div class="text-center mt-4">
                    <label for="company">Empresa:</label>
                    <select name="company" id="company" style="margin-left: 8px; width: 250px;">
                        <!--Listado de empresas>-->
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="role">Cargo:</label>
                    <select name="role" id="role" style="margin-left: 8px; width: 250px;">
                        <option value="1">SUPERADMIN</option>
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="status">Estatus:</label>
                    <select name="status" id="status" style="margin-left: 8px; width: 250px;">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>

        </div>
        
        </div>
    </div>
</div>