<?php

class Empresa extends MY_Model
{
    public $table = "empresas";
    public $table_id = "id";

    function getEmpresas()
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('borrado', '0');
        $query = $this->db->get();
        return $query->result();
    }

    function getIdEmpresa($id_gerente)
    {
        $query = $this->db->query("SELECT empresas.id FROM usuarios, empresas WHERE usuarios.id=$id_gerente AND usuarios.id=empresas.id_gerente");

        return $query->result();
    }

    function getIdEmpresaEmpleado($id_empleado)
    {

        $query = $this->db->query("SELECT id_empresa FROM empleados WHERE id_usuario = $id_empleado");

        return $query->result();
    }

    public function borrarEmpresa($post_id)
    {
        $data = array('borrado' => 1);
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }

    public function comprobarAprobada($id_gerente)
    {
        $this->db->select("aprobada");
        $this->db->from($this->table);
        $this->db->where("id_gerente", $id_gerente);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }
}
