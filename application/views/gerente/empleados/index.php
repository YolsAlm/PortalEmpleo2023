<section>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-end px-5 py-1">
            <?php
            echo '
                <a href="' . base_url() . 'empleados_gerente/form">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Crear nuevo empleado">
                        <i class="fa fa-plus"></i>
                    </button>
                </a>';
            ?>
        </div>
        <div class="col-sm-12">
            <?php
            echo '                  
        <div class="text-center ml-2">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Borrado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
          <tbody>';

            foreach ($empleados as $key => $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row[0]->id . "'>" . $row[0]->id . "</td>";
                echo "<td>" . $row[0]->username . "</td>";
                echo "<td>" . $row[0]->nombre . "</td>";
                echo "<td>" . $row[0]->apellidos . "</td>";
                echo "<td>" . $row[0]->email . "</td>";
                if ($row[0]->borrado == 0) {
                    echo "<td>No</td>";
                } else {
                    echo "<td>Si</td>";
                }
                echo '
                <td>
                <a href="' . base_url() . 'empleados_gerente/form/' . $row[0]->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar el empleado">
                        <i class="fa fa-pen"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'empleados_gerente/editpass/' . $row[0]->id . '">
                    <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar password del empleado">
                        <i class="fa fa-wrench"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'empleados_gerente/borrar/' . $row[0]->id . '">
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar el empleado">
                        <i class="fa fa-trash"></i>
                    </button>
                </a>
                </td>            
            </tr>
            ';
            }
            echo "
        </tbody>
        </table>";
            ?>
        </div>
    </div>
    </div>
</section>