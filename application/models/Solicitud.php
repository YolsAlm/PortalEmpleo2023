<?php

class Solicitud extends MY_Model
{
    public $table = "perfil";
    public $table_id = "id";

    public function nuevaSolicitud($dataEmpresa, $dataGerente)
    {
        $this->db->insert("usuarios", $dataGerente);
        $this->db->insert("empresas", $dataEmpresa);
    }

    public function solicitudesPendientes()
    {
        $this->db->select("*");
        $this->db->from("empresas");
        $this->db->where("aprobada", "no");

        $query = $this->db->get();
        return $query->result();
    }

    public function validarSolicitud($post_id = null)
    {
        $data = array(
            'aprobada' => "si"
        );

        $this->db->where('id', $post_id);
        $this->db->update('empresas', $data);
    }

    public function comprobarEmail($email)
    {
        $this->db->select("*");
        $this->db->from("usuarios");
        $this->db->where("email", $email);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function getIdByEmail($email)
    {
        $this->db->select("id");
        $this->db->from("usuarios");
        $this->db->where("email", $email);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function actualizarDatos($id_gerente, $nombre_empresa, $nombre_establecimiento)
    {

        $consultaEmpresa = "SELECT id FROM empresas WHERE nombre_empresa='$nombre_empresa'";

        $queryEmpresa = $this->db->query($consultaEmpresa);

        $rowEmpresa = $queryEmpresa->row_array();

        if (isset($rowEmpresa)) {
            $this->db->set('id_gerente', $id_gerente);
            $this->db->where('id', $rowEmpresa['id']);
            $this->db->update('empresas');
        }
    }
}
