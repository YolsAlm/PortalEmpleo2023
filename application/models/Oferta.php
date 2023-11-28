<?php

class Oferta extends MY_Model
{

    public $table = "ofertas";
    public $table_id = "id";

    function getOfertas()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('borrado', '0');
        $query = $this->db->get();
        return $query->result();
    }

    function getOfertasEmpresa($idEmpresa)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('id_empresa', $idEmpresa);
        $this->db->where('estado', 1);
        $this->db->where('borrado', '0');
        $query = $this->db->get();
        return $query->result();
    }

    function getOferta($idOferta)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('id', $idOferta);
        $query = $this->db->get();
        $result = $query->result();
        return $result[0];
    }

    function getUsuariosInscritosOferta($idOferta)
    {
        $query = "SELECT usuarios.id,usuarios.nombre,usuarios.apellidos,usuarios.email FROM usuarios, inscripcion_ofertas WHERE inscripcion_ofertas.id_oferta = $idOferta AND usuarios.id=inscripcion_ofertas.id_usuario AND inscripcion_ofertas.rechazado='No'";
        $result = $this->db->query($query);
        return $result->result();
    }

    function rechazarUsuario($idOferta, $idUsuario)
    {
        $query = "UPDATE inscripcion_ofertas SET rechazado='Si' WHERE id_oferta = $idOferta AND id_usuario = $idUsuario";
        $this->db->query($query);
    }

    function comprobarFechasOfertas()
    {
        $query = "UPDATE ofertas SET estado=0 WHERE id IN(SELECT id FROM `ofertas` WHERE fecha_fin<CURRENT_TIMESTAMP)";
        $this->db->query($query);
    }

    public function InscribirUsuarioOferta($data)
    {
        $this->db->insert('inscripcion_ofertas', $data);
    }

    function getUsuarioInscritoOferta($id_oferta, $id_usuario)
    {
        $this->db->select('*');
        $this->db->from("inscripcion_ofertas");
        $this->db->where('id_oferta', $id_oferta);
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get();
        return $query->result();
    }


    public function borrarOferta($post_id)
    {
        $data = array(
            'borrado' => 1
        );
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }

    function mostrar_ofertas()
    {
        $this->db->select("ofertas.*, empresas.nombre_empresa");
        $this->db->from($this->table);
        $this->db->where('ofertas.estado', 1);
        $this->db->where('ofertas.borrado', 0);
        $this->db->join('empresas', 'empresas.id=ofertas.id_empresa');
        $this->db->order_by('tipo', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function mostrar_ofertas_filtradas($tipo)
    {
        $this->db->select("ofertas.*, empresas.nombre_empresa");
        $this->db->from($this->table);
        $this->db->where('ofertas.estado', 1);
        $this->db->where('ofertas.borrado', 0);
        $this->db->where('tipo', $tipo);
        $this->db->join('empresas', 'empresas.id=ofertas.id_empresa');
        $this->db->order_by('tipo', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function mostrar_ofertas_propias($id_empresa, $id_gerente)
    {
        $query = $this->db->query("SELECT ofertas.*, empresas.nombre_empresa
        FROM ofertas, empresas, usuarios WHERE ofertas.id_empresa=empresas.id AND empresas.id=$id_empresa AND usuarios.id=$id_gerente AND ofertas.borrado=0 ORDER BY tipo DESC");

        return $query->result();
    }

    function desactivar_oferta($post_id)
    {
        $data = array(
            'estado' => 0
        );
        $this->db->where('id', $post_id);
        $this->db->update($this->table, $data);
    }

    function activar_oferta($post_id)
    {
        $data = array(
            'estado' => 1
        );
        $this->db->where('id', $post_id);
        $this->db->update($this->table, $data);
    }
}
