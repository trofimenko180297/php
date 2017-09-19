<?php

class PostsController extends Controller
{
    public function __construct($data = array() )
    {
        parent::__construct($data);
        $this->model = new Post();
    }

    public function index()
    {
        $this->data['news_slider'] = $this->model->getByCount(5);
        $this->data['category'] = $this->model->getCategories();
        $this->data['news_category'] = $this->model->test($this->data['category']);// !!!!!!!!
        $this->data['analitic'] = $this->model->getAnalitic(5);
        $commentator = new Comment();
        $this->data['top_commentator'] = $commentator->getTopCommentator();
        $this->data['top_news'] = $this->model->getTopPost();
    }

    public function search()
    {
        $arr = array();
            if (!empty($_POST['keywords'])) {
                $result = $this->model->search($_POST['keywords']);
                $tags = explode(',',$result[0]['tag']);
                $arr = ['result' => $tags];
            }
        echo json_encode($arr);
        die;
    }

    public function admin_index()
    {
        $this->data['news'] = $this->model->getAll();
        $this->data['categories'] = $this->model->getCategories();
    }

    public function admin_add()
    {
        if($_POST) {
            if (!empty($_POST['category']) && !empty($_POST['tittle']) && !empty($_POST['content']) && !empty($_POST['tags']) && !empty($_FILES['general_img'])) {
                $result = $this->model->save($_POST);
                $image = new Image();
                $image->load($_FILES['general_img']['tmp_name']);
                $image->resize(1000, 644);
                $name = $this->model->getLastId();
                $path = 'uploads/'.$name['id'];
                $dir = mkdir($path, 0777);
                $image->save($path.DIRECTORY_SEPARATOR.'general'.$image->extension);
                $this->model->set_img('general'.$image->extension, $name['id']);
                sleep(1);
                foreach ($_FILES['addition_img']['tmp_name'] as $image) {
                    static $count = 1;
                    $image2 = new Image();
                    $image2->load($image);
                    $image2->resize(1000, 644);
                    $path2 = 'uploads/' . $name['id'] . '/' . 'view';
                    $dir2 = mkdir($path2, 0777);
                    $image2->save($path2 . DIRECTORY_SEPARATOR . $count . $image2->extension);
                    $count++;
                }
            }
        }
        Router::redirect('/admin/posts');
    }


    public function admin_edit()
    {
        if($_POST){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $this->model->update($_POST, $id);
            if (!empty($_FILES['general_img'])) {
                $image = new Image();
                $image->load($_FILES['general_img']['tmp_name']);
                $image->resize(1000, 644);
                $name = $id;
                $path = 'uploads/'.$name;
                $image->save($path.DIRECTORY_SEPARATOR.'general'.$image->extension);
                sleep(1);
                foreach ($_FILES['addition_img']['tmp_name'] as $image) {
                    static $count = 1;
                    $image2 = new Image();
                    $image2->load($image);
                    $image2->resize(1000, 644);
                    $path2 = 'uploads/' . $name . '/' . 'view';
                    $image2->save($path2 . DIRECTORY_SEPARATOR . $count . $image2->extension);
                    $count++;
                }
            }
            Router::redirect('/admin/posts/');
        }

        $params = App::getRouter()->getParams();
        if (isset($params[0])){
            $this->data['news'] = $this->model->getById($params[0]);
            $this->data['category'] = $this->model->getCategories();
        }
    }

    public function view()
    {
        $params = App::getRouter()->getParams();
        $this->data['news'] = $this->model->getById($params[0]);
        $this->data['img'] = array_diff(scandir("../webroot/uploads/$params[0]/view"), array('..', '.'));
        $this->data['comments'] = $this->model->getComment($this->data['news'][0]['id']);
        $comment = new Comment();
        $this->data['comments_comments'] = $comment->test($this->data['comments']);
    }

    public function category()
    {
        $params = App::getRouter()->getParams();
        if (isset($params[1])){
            $page = ($params[1] * 5) - 5;
        }else{
            $page = 0;
        }
        $this->data['news'] = $this->model->getByCategory($params[0], $page);
        $this->data['count'] = $this->model->getCountByCategory($params[0]);
    }

    public function tag()
    {
        $params = App::getRouter()->getParams();
        if (isset($params[1])){
            $page = ($params[1] * 5) - 5;
        }else{
            $page = 0;
        }
        $this->data['news'] = $this->model->getByTag($params[0], $page);
        $this->data['count'] = $this->model->getCountByCategory($params[0]);
    }

    public function analitic()
    {
        $this->data['analitic'] = $this->model->getAnalitic();
    }

    public function getUsers()
    {
        echo rand(0, 5);
        die;
    }

    public function admin_delete()
    {
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            Router::redirect('/admin/posts/');
        }
    }

    public function test()
    {
        echo round(12/5,0,PHP_ROUND_HALF_UP);

        die;
    }
}