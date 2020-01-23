<?php 

require APPPATH . 'libraries/REST_Controller.php';
     
class Evento extends REST_Controller {

    public function __construct() {
       parent::__construct();
        $this->load->model("EventoModel");
    }
 
    public function index_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->EventoModel->getEvento($id);
        }else{
            $data = $this->EventoModel->getListaEventos();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $input = $this->input->post();
        $this->EventoModel->postRegistrarEvento($input);
        $this->response(['Evento Se registro satisfactoriamente.'], REST_Controller::HTTP_OK);
    } 
 
    public function index_put($id)
    {
        $input = $this->put();
        $this->EventoModel->putActualizarEvento($input,$id); 
        $this->response(['Evento actualizado satisfactoriamente.'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id)
    {
        $this->EventoModel->deleteEliminarEvento($id); 
        $this->response(['Evento borrado satisfactoriamente.'], REST_Controller::HTTP_OK);
    }
        
}

 ?>