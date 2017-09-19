<?php

class CategoriesController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Category();
    }


    public function admin_index()
    {
        $this->data['categories'] = $this->model->getListAll();
    }

    public function admin_add()
    {
        if ($_POST) {
            $this->model->save($_POST);
        }
        Router::redirect('/admin/categories/');
    }

    public function admin_edit()
    {
        if ($_POST) {
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $this->model->update($_POST, $id);
        Router::redirect('/admin/categories/');
        }
        $params = App::getRouter()->getParams();
        if (isset($params[0])){
            $this->data['category'] = $this->model->getById($params[0]);
        }
    }

    public function admin_delete()
    {
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            Router::redirect('/admin/categories/');
        }
    }
}