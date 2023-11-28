<section>
    <div class="col-sm-12">
        <?php echo '<p style="color: green">' . $mensaje . '</p>'; ?>
    </div>

    <div class="col-sm-12">
        <?php
        echo '                  
        <div class="text-center ml-2">
          <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Rechazar usuario</th>      
                </tr>
            </thead>
          <tbody>';


        foreach ($inscritos as $row) {
            echo "
            <tr>";
            echo "<td data-id='" . $row->id . "'>" . $row->id . "</td>";
            echo "<td>" . $row->nombre . "</td>";
            echo "<td>" . $row->apellidos . "</td>";
            echo "<td>" . $row->email . "</td>";
            echo '<td>';
            echo form_open('', 'class="my_form" enctype="multipart/form-data"');
            echo form_hidden('id_oferta', $idOferta);
            echo form_hidden('id_usuario', $row->id);
            echo form_submit('mysubmit', 'Rechazar', 'class="btn btn-danger"');
            echo form_close();
            echo '</td>        
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