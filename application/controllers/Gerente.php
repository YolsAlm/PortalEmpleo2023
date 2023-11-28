<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gerente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 3) {
            redirect("home");
        }
        $this->Oferta->comprobarFechasOfertas();
    }

    public function ofertas()
    {
        $_SESSION['id_empresa'] = $this->Empresa->getIdEmpresa($_SESSION["id"]);
        $data['ofertas'] = $this->Oferta->mostrar_ofertas_propias($_SESSION["id_empresa"][0]->id, $_SESSION["id"]);
        $data["activeTab"] = "ofertas";
        $view["body"] = $this->load->view('gerente/ofertas/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }
   
    public function empleados()
    {
        $data['empleados'] = $this->Usuario->getEmpleados($_SESSION["id"]);
        $data["activeTab"] = "empleados";
        $view["body"] = $this->load->view('gerente/empleados/index', $data, TRUE);
        $this->parser->parse('template/body', $view);   
    }

}
