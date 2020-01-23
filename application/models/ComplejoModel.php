<?php 
class ComplejoModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function getListaComplejos()
	{
			 return  $this->db->get("complejo")->result();
	}
	public function getComplejo($id)
	{
			
			return $this->db->get_where("complejo", ['complejoID' => $id])->row_array();
	}

	 public function postRegistrarComplejo($input)
	{
		$this->db->insert('complejo',$input);
	}
	 public function putActualizarComplejo($input,$id)
	{
		return $this->db->update('complejo', $input, array('complejoID'=>$id));
	}
		 public function deleteEliminarComplejo($id)
	{
		return $this->db->delete('complejo', array('complejoID'=>$id));
	}
}

 ?>