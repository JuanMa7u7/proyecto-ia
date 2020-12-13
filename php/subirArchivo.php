<table class="">
    <tr>
        <td>
            <div id="alertaImg" class="alert alert-danger d-none" role="alert"></div>
            <div class="custom-file">
                <input type="file" id="subirImg" class="custom-file-input" lang="es" onchange="previoImg();">
                <label id="labelSubirImg" class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
        </td>
        <td>
            <img id="alta_archivo_ok" style="width: 35px;height: 35px;display: none;">
        </td>
    </tr>
    <tr>
        <td colspan=2 class="d-flex p-2">
            <button type="button" class="btn btn-success card-link" onclick="subirImagen();">Guardar</button>
            <!--<button type="button" class="btn btn-warning card-link">Cancelar</button>-->
        </td>
    </tr>
</table>