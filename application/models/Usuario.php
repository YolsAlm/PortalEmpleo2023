<?php

class Usuario extends MY_Model
{
    public $table = "usuarios";
    public $table_id = "id";

    public function __construct()
    {
        parent::__construct();
    }

    public function borrarUsuario($post_id)
    {
        $data = array(
            'borrado' => 1
        );
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }

    public function banearUsuario($post_id)
    {
        $data = array(
            'baneado' => 1
        );
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }

    public function comprobarEmail($email)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where("email", $email);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function loginUser($data)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where("email", $data['email']);
        $this->db->where("password", md5($data['password']));

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function get_perfil($post_id)
    {
        $this->db->select();
        $this->db->from("perfil");
        $this->db->where('id_usuario', $post_id);
        $query = $this->db->get();
        return $query->result();
    }

    function getUsuarios()
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('borrado', '0');
        $query = $this->db->get();
        return $query->result();
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

    public function nuevoEmpleado($dataUsuarioEmpleado, $idEmpresa)
    {
        $this->db->insert("usuarios", $dataUsuarioEmpleado);
        $id_empleado = $this->Usuario->getIdByEmail($dataUsuarioEmpleado["email"]);

        $dataEmpleado = array(
            'id_empresa' => $idEmpresa,
            'id_usuario' => $id_empleado->id
        );
        $this->db->insert("empleados", $dataEmpleado);
    }

    public function getEmpleados($id_gerente)
    {
        $consulta = "select id_usuario from empleados where id_empresa = (select empresas.id from empresas where id_gerente = " . $id_gerente . " and borrado = 0)";
        $query = $this->db->query($consulta);
        $ids_empledos = $query->result();
        $empleados = array();

        foreach ($ids_empledos as $id_empledos) {
            $consulta = "select * from usuarios where id = " . $id_empledos->id_usuario . " and borrado = 0";
            $query = $this->db->query($consulta);
            $empleados[] = $query->result();
        }

        return $empleados;
    }
}
