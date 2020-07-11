<?php
require_once 'models/commentModel.php';
require_once 'api/APIView.php';

class ApiController {

    private $model;
    private $view;

    public function __construct(){
        $this->model = new CommentModel();
        $this->view = new APIView();
    }
    
    public function getComments($params = []){
        if (!empty($params)) {
            $product = $params[':ID'];
            $comments = $this->model->getAllComments($product);
            if ($comments)
            $this->view->response($comments, 200);
            else
                $this->view->response(null, 404);
        }
    }

    public function addComment($product = []){
        $comment = json_decode(file_get_contents("php://input"));
        $success = $this->model->addComment($comment->id_product, $comment->id_user, $comment->text, $comment->score);
        
        if($success)
            $this->view->response($comments, 200);
        else{
            $this->view->response(null, 404);
        }
    }

    public function deleteComment($params = []){
        $comment = $params[':ID'];
        $success = $this->model->deleteComment($comment);

        if($success)
            $this->view->response(true, 200);
        else{
            $this->view->response(false, 404);
        }
    }
}

?>