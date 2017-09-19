<?php

class CommentsController extends Controller
{
    public function __construct(array $data = array())
    {
        parent::__construct($data);
        $this->model = new Comment();
    }

    public function add()
    {
        if ($_POST) {
            if (!empty($_POST['id_user']) && !empty($_POST['id_post']) && !empty($_POST['content'])) {
                $this->model->save($_POST);
            }
        }
        Router::redirect("/posts/view/{$_POST['id_post']}");
    }

    public function status()
    {
        if (isset($_POST['status']) && isset($_POST['id_comment'])) {
            switch ($_POST['status']) {
                case 'positive':
                    $this->model->setStatus(true, $_POST['id_comment']);
                    break;
                case 'negative':
                    $this->model->setStatus(false, $_POST['id_comment']);
                    break;
            }
        }
        die;
    }

    public function user()
    {
        $params = App::getRouter()->getParams();
        $this->data['comments'] = $this->model->getByUser($params[0]);
        $this->data['count'] = $this->model->getCount($params[0]);
    }

    public function add_to()
    {
        $params = App::getRouter()->getParams();
        $id = Session::get('post');
        if (isset($params[1]) && isset($params[0])){
        Session::set('post', $params[0]);
        $this->data['id'] = $params[1];
        }
        if ($_POST) {
            if (!empty($_POST['id_user']) && !empty($_POST['id_comment']) && !empty($_POST['content'])) {
                $this->model->setCommentUser($_POST);
                Router::redirect("/posts/view/{$id}");
            }
        }
    }
}