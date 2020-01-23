<?php 
class UsuarioModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function getListaUsuarios()
	{
			 return  $this->db->get("usuario")->result();
	}
	public function getUsuario($id)
	{
			
			return $this->db->get_where("usuario", ['usuarioID' => $id])->row_array();
	}

	 public function postRegistrarUsuario($input)
	{
		$this->db->insert('usuario',$input);
	}
	 public function putActualizarUsuario($input,$id)
	{
		return $this->db->update('usuario', $input, array('usuarioID'=>$id));
	}
		 public function deleteEliminarUsuario($id)
	{
		return $this->db->delete('usuario', array('usuarioID'=>$id));
	}
}

 ?>