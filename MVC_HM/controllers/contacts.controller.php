<?php
class ContactsController extends Controller{

    public function __construct($data = array() )
    {
        parent::__construct($data);
        $this->model = new Message();
    }


    public function index()
    {

     if ($_POST){
         if ( $this->model->save($_POST)){
             Session::setFlash('Thank you! Your message was sent!');
         }else{
             Session::setFlash('Empty fields. Please fill all fields!');
         }
     }
    }

    public function admin_index()
    {
      $this->data = $this->model->getList();
    }

    public function admin_edit()
    {
        if($_POST){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if($result){
                Session::setFlash('Message was saved.');
            }else{
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/contacts/');
        }

        if(isset($this->params[0]) ){
            $this->data['message'] = $this->model->getbyId($this->params[0]);
        }else{
            Session::setFlash('Wrong message id.');
            Router::redirect('/admin/pages');
        }
    }

    public function admin_delete()
    {
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if($result){
                Session::setFlash('Message was deleted.');
            }else{
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/contacts/');
        }
    }
}



?>