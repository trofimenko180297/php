<?php

class SitesController extends Controller
{
    public function __construct(array $data = array())
    {
        $this->model = new Site();
        parent::__construct($data);
    }

    public function admin_index()
    {

    }

    public function admin_set()
    {
        if ($_POST){
            if (!empty($_POST['site_color']) || !empty($_POST['admin_color'])){
                Session::set('site_color',$_POST['site_color']);
                Session::set('admin_color',$_POST['admin_color']);
            }elseif(empty($_POST['site_color'])){
                unset($_SESSION['site_color']);
            }elseif (empty($_POST['admin_color'])){
                unset($_SESSION['admin_color']);
            }
            Router::redirect('/admin/sites');
        }
    }
}