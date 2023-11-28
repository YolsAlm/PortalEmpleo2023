<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 1) {
            redirect("home");
        }
        $this->load->helper('url');
        $this->load->helper('form');

        $this->Oferta->comprobarFechasOfertas();
    }

    public function ofertas($filtro = null)
    {
        $data["activeTab"] = "ofertas";

        if ($filtro == null) {
            $data['ofertas'] = $this->Oferta->mostrar_ofertas();
            $view["body"] = $this->load->view('user/ofertas/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        } else {
            $data['ofertas'] = $this->Oferta->mostrar_ofertas_filtradas($filtro);
            $view["body"] = $this->load->view('user/ofertas/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        }
    }

    public function ver_oferta($id_usuario = null, $id_oferta = null)
    {
        $data["activeTab"] = "ofertas";
        $data['mensaje'] =  '';

        if (!isset($id_oferta) && !isset($id_oferta)) {
            show_404();
        }

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->inscribir_usuario_oferta($this->input->post("id_oferta"), $this->input->post("id_usuario"));

            $data['mensaje'] = "Se inscribió en la oferta correctamente";
        }


        $data['oferta'] = $this->Oferta->getOferta($id_oferta);
        $data['inscrito'] = $this->Oferta->getUsuarioInscritoOferta($id_oferta, $id_usuario);


        $view["body"] = $this->load->view("user/ofertas/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }

    private function inscribir_usuario_oferta($id_oferta, $id_usuario)
    {
        $dataInscripcion = array(
            'id_oferta' =>  $id_oferta,
            'id_usuario' =>  $id_usuario
        );

        $this->Oferta->InscribirUsuarioOferta($dataInscripcion);
    }
}