<section>
    <div class="col-sm-12">
        <?php
        echo '                  
        <div class="text-center ml-2">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre Empresa</th>
                    <th>Descripcion</th>
                    <th>Tipo contrato</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>      
                    <th>Acciones</th>      
                </tr>
            </thead>
          <tbody>';


        foreach ($ofertas as $row) {
            echo "
            <tr>";
            echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
            echo "<td>" . $row->nombre_empresa . "</td>";
            echo "<td>" . $row->descripcion . "</td>";
            echo "<td>" . $row->tipo . "</td>";
            echo "<td>" . $row->fecha_inicio  . "</td>";
            echo "<td>" . $row->fecha_fin   . "</td>";
            if ($row->estado == 0) {
                echo "<td>Desactivado</td>";
            } else {
                echo "<td>Activado</td>";
            }
            echo '
                <td>';
            echo '<a href="' . base_url() . 'empleado/ver_inscritos_oferta/' . $row->id . '">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver usuarios inscritos en la oferta">
                        <i class="fa fa-eye"></i>
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