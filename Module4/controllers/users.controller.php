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

    public function login()
    {
        if ( $_POST && isset($_POST['login']) && isset($_POST['password']) ) {
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $user['is_active'] && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('user_id', $user['id']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/');
        }
    }

    public function register()
    {
        if ( $_POST && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) ) {
            $password = md5(Config::get('salt') . $_POST['password']);
            $this->model->register($_POST['login'], $_POST['email'], $password);
            Router::redirect('/');
        }
    }

    public function logout()
    {
        Session::destroy();
        Router::redirect('/');
    }

    public function admin_logout()
    {
        Session::destroy();
        Router::redirect('/admin/');
    }
}








?>