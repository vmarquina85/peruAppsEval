<?php 
class EventoModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function getListaEventos()
	{
			 return  $this->db->get("evento")->result();
	}
	public function getEvento($id)
	{
			
			return $this->db->get_where("evento", ['eventoID' => $id])->row_array();
	}

	 public function postRegistrarEvento($input)
	{
		$this->db->insert('evento',$input);
	}
	 public function putActualizarEvento($input,$id)
	{
		return $this->db->update('evento', $input, array('eventoID'=>$id));
	}
		 public function deleteEliminarEvento($id)
	{
		return $this->db->delete('evento', array('eventoID'=>$id));
	}
}

 ?>