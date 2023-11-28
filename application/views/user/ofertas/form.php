<section>
    <div class="container my-5 p-5">
        <div class="row">
            <div class="col">
                <div class="register-box">
                    <div class="register-logo">
                        <a href="<?php echo base_url() ?>home"><b> Portal empleo</b></a>
                    </div>


                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg"><?php echo $title ?></p>

                            <?php echo form_open('', 'class="my_form" enctype="multipart/form-data"'); ?>

                            <?php

                            echo form_hidden('id_oferta', $oferta->id);
                            echo form_hidden('id_usuario', $this->session->userdata('id'));

                            ?>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'descripcion',
                                    'id' => 'descripcion',
                                    'value' => $oferta->descripcion,
                                    'placeholder' => 'Descripción de la oferta',
                                    'class' => 'form-control input-lg',
                                    'disabled' => 'disabled',
                                    'cols' => '40',
                                    'rows' => '10'
                                );


                                echo '<label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>';

                                echo form_textarea($text_input);

                                echo form_error('descripcion', '<div class="text-error">', '</div>')
                                ?>

                            </div>


                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'fecha_inicio',
                                    'id' => 'fecha_inicio',
                                    'type' => 'date',
                                    'disabled' => 'disabled',
                                    'value' => $oferta->fecha_inicio,
                                    'placeholder' => 'fecha_inicio',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha Inicio</label>';

                                echo form_input($text_input);

                                echo form_error('fecha_inicio', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'fecha_fin',
                                    'id' => 'fecha_fin',
                                    'type' => 'date',
                                    'disabled' => 'disabled',
                                    'value' => $oferta->fecha_fin,
                                    'placeholder' => 'fecha_fin',
                                    'class' => 'form-control input-lg',
                                );

                                echo '<label for="fecha_fin" class="col-sm-2 col-form-label">Fecha Fin</label>';

                                echo form_input($text_input);

                                echo form_error('fecha_fin', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php

                                $text_input = array(
                                    'name' => 'tipo',
                                    'id' => 'tipo',
                                    'disabled' => 'disabled',
                                    'class' => 'form-control input-lg',
                                );

                                $options = array(
                                    'Indefinido' => 'Indefinido',
                                    'Parcial' => 'Parcial',
                                    'Temporal' => 'Temporal'
                                );

                                echo '<label for="tipo" class="col-sm-2 col-form-label">Tipo contrato</label>';

                                echo form_dropdown($text_input, $options, $oferta->tipo);

                                echo form_error('tipo', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="form-group row">
                                <?php
                                $text_input = array(
                                    'name' => 'estado',
                                    'id' => 'estado',
                                    'disabled' => 'disabled',
                                    'class' => 'form-control input-lg',
                                );

                                $options = array(
                                    '0' => 'Desactivada',
                                    '1' => 'Activa'
                                );

                                echo '<label for="estado" class="col-sm-2 col-form-label">Estado</label>';

                                echo form_dropdown($text_input, $options, $oferta->estado);

                                echo form_error('estado', '<div class="text-error">', '</div>')
                                ?>

                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <?php
                                    $data = array(
                                        'name'       => 'mysubmit',
                                        'id'         => 'submitOferta',
                                        'value'      => 'Inscribirse en la oferta',
                                        'class'      => 'btn btn-primary',
                                    );

                                    if (!empty($inscrito)) {
                                        if ($inscrito[0]->rechazado == 'Si') {
                                            $mensaje = 'Ha sido descartado de esta oferta';
                                            echo '<p style="color: red">' . $mensaje . '</p>';
                                        } else {
                                            $mensaje = (!empty($mensaje)) ? $mensaje : 'Continua en el proceso';
                                            echo '<p style="color: green">' . $mensaje . '</p>';
                                        }

                                        $data = array(
                                            'value'      => 'Ya inscrito en la oferta',
                                            'disabled'      => 'true',
                                        );
                                    }

                                    echo form_submit($data) ?>
                                </div>
                            </div>

                            <?php echo form_close(); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>