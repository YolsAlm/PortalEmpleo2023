<section>
    <div class="row" data-aos="fade-down">
        <?php
        echo '
    <div class="col-sm-12 d-flex justify-content-center">
        <a class="p-1" href="' . base_url() . 'user/ofertas">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Mostrar todas las ofertas">
                <i class="fa fa-home text-white"></i>
            </button>
        </a>
        <a class="p-1" href="' . base_url() . 'user/ofertas/Indefinido">
            <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por tipo de contrato indefinido">
                <i class="fa fa-bowling-ball text-white"></i>
            </button>
        </a>
        <a class="p-1" href="' . base_url() . 'user/ofertas/Parcial">
            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por tipo de contrato parcial">
                <i class="fas fa-hamburger text-white"></i>
            </button>
        </a>        
        <a class="p-1" href="' . base_url() . 'user/ofertas/Temporal">
            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Filtrar ofertas por tipo de contrato temporal">
                <i class="fas fa-archway text-white"></i>
            </button>
        </a>
    </div>
   ';
        ?>
    </div>

    <div class="row px-5" data-aos="fade-up">
        <?php
        foreach ($ofertas as $row) {
            switch ($row->tipo) {
                case 'Indefinido':
                    echo '
                    <div class="card col-sm-3 col-md-4 bg-success">
                    <a href="' . base_url() . 'user/ver_oferta/' . $this->session->userdata('id') . '/' . $row->id . '">
                        <div class="card-body text-center">
                            <h4 class="card-title">' . $row->nombre_empresa . '<small></h4>
                            <h3 class="text-white" data-toggle="tooltip" data-placement="top" title="Indefinido"><i class="fas fa-bowling-ball"></i></small></h3>
                            <p class="card-text bg-dark text-white rounded">' . $row->descripcion . '</p>
                        </div>
                    </div>
                    </a>';
                    break;
                case 'Parcial':
                    echo '
                    <div class="card col-sm-3 col-md-4  bg-danger ">
                    <a href="' . base_url() . 'user/ver_oferta/' . $this->session->userdata('id') . '/' . $row->id . '">
                        <div class="card-body text-center">
                            <h4 class="card-title">' . $row->nombre_empresa . '<small></h4>
                            <h3 class="text-white" data-toggle="tooltip" data-placement="top" title="Parcial"><i class="fas fa-archway"></i></small></h3>
                            <p class="card-text bg-dark text-white rounded">' . $row->descripcion . '</p>
                        </div>
                    </div>
                    </a>';
                    break;
                case 'Temporal':
                    echo '
                    <div class="card col-sm-3 col-md-4  bg-warning">
                    <a href="' . base_url() . 'user/ver_oferta/' . $this->session->userdata('id') . '/' . $row->id . '">
                        <div class="card-body text-center">
                            <h4 class="card-title">' . $row->nombre_empresa . '<small></h4>
                            <h3 class="text-white" data-toggle="tooltip" data-placement="top" title="Temporal"><i class="fas fa-hamburger"></i></small></h3>
                            <p class="card-text bg-dark text-white rounded">' . $row->descripcion . '</p>
                        </div>
                    </div>
                    </a>';
                    break;

                default:
                    break;
            }
        }
        ?>
    </div>
</section>