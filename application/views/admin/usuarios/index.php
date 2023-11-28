<section>
    <div class="row">
        <div class="col-sm-12">
            <?php
            echo '                  
        <div class="text-center ml-2">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Username</th>                   
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Perfil</th>      
                    <th>Baneado</th>      
                    <th>Borrado</th>      
                    <th>Acciones</th>      
                </tr>
            </thead>
          <tbody>';
            foreach ($usuarios as $row) {
                echo "
            <tr>";
                echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
                echo "<td>" . $row->username . "</td>";
                echo "<td>" . $row->nombre . "</td>";
                echo "<td>" . $row->apellidos . "</td>";
                echo "<td>" . $row->email . "</td>";
                if (!empty($row->imagen)) {
                    echo '<td><img src="' . base_url() . 'uploads/perfiles/' . $row->imagen . '" style="width: 50px; height: 50px;"alt="User Imagen"></td>';
                } else {
                    echo '<td><img src="' . base_url() . 'uploads/perfiles/default-user.jpg" style="width: 50px; height: 50px;"alt="Empresa Imagen"></td>';
                }
                if ($row->perfil == 4) {
                    echo "<td>Administrador</td>";
                } elseif ($row->perfil == 3) {
                    echo "<td>Gerente</td>";
                } elseif ($row->perfil == 2) {
                    echo "<td>Empleado</td>";
                } elseif ($row->perfil == 1) {
                    echo "<td>Usuario</td>";
                }
                if ($row->baneado == 0) {
                    echo "<td>No</td>";
                } else {
                    echo "<td>Si</td>";
                }
                if ($row->borrado == 0) {
                    echo "<td>No</td>";
                } else {
                    echo "<td>Si</td>";
                }
                echo '
                <td>        
                <a href="' . base_url() . 'usuarios_admin/form/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar el usuario">
                        <i class="fa fa-pen"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'usuarios_admin/editpass/' . $row->id . '">
                    <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar la pass de usuario">
                        <i class="fa fa-wrench"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'usuarios_admin/banear/' . $row->id . '">
                    <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Banear el usuario">
                        <i class="fa fa-user-times"></i>
                    </button>
                </a>
                <a href="' . base_url() . 'usuarios_admin/borrar/' . $row->id . '">
                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar el usuario">
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