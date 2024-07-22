<!-- Modal -->
<div class="modal fade" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="editUserModalLabel">Editar usuario</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form id="formEditUserModal">
                <div id="divIdEditUser">
                    <!--Id oculto-->
                </div>
                <div id="errorMessageEditUser" class="text-center">
                    <!--Mensaje de error-->
                </div>
                <div id="divNameEditUser" class="text-center">
                    <label for="name">Nombre:</label>
                    <!--Nombre del usuario-->
                </div>
                <div id="divPhoneEditUser" class="text-center mt-4">
                    <label for="phone">Teléfono:</label>
                    <!--Teléfono del usuario-->
                </div>
                <div id="divPasswordEditUser" class="text-center mt-4">
                    <label for="password">Contraseña:</label>
                    <!--Contraseña-->
                </div>
                <div class="text-center mt-4">
                    <label for="company">Empresa:</label>
                    <select name="company" id="selectCompanyEditUser" style="margin-left: 8px; width: 250px;">
                        <!--Listado de empresas-->
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="role">Cargo:</label>
                    <select name="role" id="selectRoleEditUser" style="margin-left: 8px; width: 250px;">
                        <option value="1">SUPERADMIN</option>
                    </select>
                </div>
                <div class="text-center mt-4">
                    <label for="status">Estatus:</label>
                    <select name="status" id="selectStatusEditUser" style="margin-left: 8px; width: 250px;">
                        <option value="1">1</option>
                    </select>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>

        </div>
        
        </div>
    </div>
</div>