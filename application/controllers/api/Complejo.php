<?php 

require APPPATH . 'libraries/REST_Controller.php';
     
class Complejo extends REST_Controller {

    public function __construct() {
       parent::__construct();
        $this->load->model("ComplejoModel");
    }
 
    public function index_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->ComplejoModel->getComplejo($id);
        }else{
            $data = $this->ComplejoModel->getListaComplejos();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $input = $this->input->post();
        $this->ComplejoModel->postRegistrarComplejo($input);
        $this->response(['Complejo Se registro satisfactoriamente.'], REST_Controller::HTTP_OK);
    } 
 
    public function index_put($id)
    {
        $input = $this->put();
        $this->ComplejoModel->putActualizarComplejo($input,$id); 
        $this->response(['Complejo actualizado satisfactoriamente.'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id)
    {
        $this->ComplejoModel->deleteEliminarComplejo($id); 
        $this->response(['Complejo borrado satisfactoriamente.'], REST_Controller::HTTP_OK);
    }
        
}

 ?>