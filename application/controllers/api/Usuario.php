<?php 

require APPPATH . 'libraries/REST_Controller.php';
     
class Usuario extends REST_Controller {

    public function __construct() {
       parent::__construct();
        $this->load->model("UsuarioModel");
    }
 
    public function index_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->UsuarioModel->getUsuario($id);
        }else{
            $data = $this->UsuarioModel->getListaUsuarios();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $input = $this->input->post();
        $this->UsuarioModel->postRegistrarUsuario($input);
        $this->response(['Se registro satisfactoriamente.'], REST_Controller::HTTP_OK);
    } 
 
    public function index_put($id)
    {
        $input = $this->put();
        $this->UsuarioModel->putActualizarUsuario($input,$id); 
        $this->response(['usuario actualizado satisfactoriamente.'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id)
    {
        $this->UsuarioModel->deleteEliminarUsuario($id); 
        $this->response(['usuario borrado satisfactoriamente.'], REST_Controller::HTTP_OK);
    }
        
}

 ?>