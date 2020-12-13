<table class="table table-bordered table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Asistencias</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once("db.php");
      $mysqli = Conectarse();
      $selAlumno = "SELECT * FROM alumnos_asistencia ORDER BY nombre ASC;";
      $resAlumno = mysqli_query($mysqli, $selAlumno);
      if(mysqli_num_rows($resAlumno) > 0)
      {
        while($alumno = mysqli_fetch_array($resAlumno))
          echo "
          <tr>
            <td>$alumno[nombre]</td>
            <td>$alumno[asistencias]</td>
          </tr>
          ";
      }else
        echo "
        <tr>
          <td colspan=2>No hay datos.</td>
        </tr>
        ";
    ?>
  </tbody>
</table>