<?php
class UsersController extends Controller
{
    public function __construct($data = array() )
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function admin_login()
    {

        if ( $_POST && isset($_POST['login']) && isset($_POST['password']) ){
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt').$_POST['password']);
            if( $user && $user['is_active'] && $hash == $user['password']){
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/admin/');

        }
    }

    public function admin_logout()
    {
        Session::destroy();
        Router::redirect('/admin/');
    }

    public function deactive()
    {
        if ($_GET){
            if (!empty($_GET['id'])){
                $this->model->deactiveUser($_GET['id']);
                Router::redirect('/');
            }
        }
    }

    public function register()
    {
        if ($_POST) {
            if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                if ($this->model->checkUser($_POST)){
                    Session::setFlash('User already exist!');
                }else {
                    $result = $this->model->register($_POST);
                    if ($result) {
                        Session::setFlash('Registration success!');
                    } else {
                        Session::setFlash('Error!');
                    }
                }
            } else {
                Session::setFlash('Empty fields!');
            }
        }
    }
}








?>