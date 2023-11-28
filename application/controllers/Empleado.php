<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empleado extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 2) {
            redirect("home");
        }

        $this->Oferta->comprobarFechasOfertas();
    }


    public function ofertas()
    {
        $_SESSION['id_empresa'] = $this->Empresa->getIdEmpresaEmpleado($_SESSION["id"]);
        $data['ofertas'] = $this->Oferta->getOfertasEmpresa($_SESSION["id_empresa"][0]->id_empresa);
        $data["activeTab"] = "ofertas";
        $view["body"] = $this->load->view('empleado/ofertas/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function ver_inscritos_oferta($idOferta = null)
    {
        $data["activeTab"] = "ofertas";

        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $this->Oferta->rechazarUsuario($this->input->post("id_oferta"), $this->input->post("id_usuario"));
            $data['mensaje'] = "Usuario rechazado de la oferta";
        }else {
            $data['mensaje'] = "";
        }

        $data['idOferta'] = $idOferta;
        $data['inscritos'] = $this->Oferta->getUsuariosInscritosOferta($idOferta);

        $view["body"] = $this->load->view("empleado/ofertas/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }
}
