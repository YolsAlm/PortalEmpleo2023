<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ofertas_Gerente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 3) {
            redirect("home");
        }
    }

    public function borrar($post_id = null)
    {
        $this->Oferta->borrarOferta($post_id);

        redirect("gerente/ofertas");
    }

    function desactivar($post_id = null)
    {
        $this->Oferta->desactivar_oferta($post_id);

        redirect("gerente/ofertas");
    }

    function activar($post_id = null)
    {
        $this->Oferta->activar_oferta($post_id);

        redirect("gerente/ofertas");
    }

    public function form($post_id = null)
    {
        $data["activeTab"] = "ofertas";
        $data['mensaje'] = "";

        if ($post_id == null) {
            // crear post
            $data['descripcion'] = $data['tipo'] =  "";
            $data['fecha_inicio'] = $data['fecha_fin'] = NULL;
            $data["title"] = "Crear oferta";
        } else {
            // edicion post
            $post = $this->Oferta->find($post_id);

            if (!isset($post)) {
                show_404();
            }

            $data['descripcion'] =  $post->descripcion;
            $data['tipo'] = $post->tipo;
            $data['fecha_inicio'] =  $post->fecha_inicio;
            $data['fecha_fin'] =  $post->fecha_fin;
            $data['estado'] =  $post->estado;
            $data["title"] = "Actualizar oferta";
        }

        $id_empresa = $this->Empresa->getIdEmpresa($_SESSION["id"]);

        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $this->form_validation->set_rules('descripcion', 'Descripcion de la oferta', 'required|min_length[5]|max_length[120]');

            $data['descripcion'] =  $this->input->post("descripcion");
            $data['tipo'] =  $this->input->post("tipo");
            $data['fecha_inicio'] =  $this->input->post("fecha_inicio");
            $data['fecha_fin'] =  $this->input->post("fecha_fin");
            $data['estado'] =  $this->input->post("estado");

            if ($this->form_validation->run()) {
                $save = array(
                    'id_empresa' =>  $id_empresa[0]->id,
                    'descripcion' =>  $this->input->post("descripcion"),
                    'tipo' =>  $this->input->post("tipo"),
                    'fecha_inicio' =>  $this->input->post("fecha_inicio"),
                    'fecha_fin' =>  $this->input->post("fecha_fin"),
                    'estado' =>  $this->input->post("estado")
                );

                if ($post_id == null) {
                    $data['mensaje'] = "Oferta creada satisfactoriamente";
                    $this->Oferta->insert($save);
                } else {
                    $data['mensaje'] = "Oferta modificada satisfactoriamente";
                    $this->Oferta->update($post_id, $save);
                }
            }
        }

        $view["body"] = $this->load->view("gerente/ofertas/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }
}
