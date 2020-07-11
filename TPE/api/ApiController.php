<?php
require_once 'models/commentModel.php';
require_once 'api/APIView.php';
require_once 'models/userModel.php';

class ApiController {

    private $model;
    private $view;
    private $userModel;

    public function __construct(){
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->userModel = new userModel();
    }

    //OBTENER TODOS LOS COMENTARIOS
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

    //AGREGAR UN COMENTARIO
    public function addComment($product = []){
        $comment = json_decode(file_get_contents("php://input"));
        $success = $this->model->addComment($comment->id_product, $comment->user, $comment->text, $comment->score);
        
        if($success)
            $this->view->response($comments, 200);
        else{
            $this->view->response(null, 404);
        }
    }

    //ELIMINA UN COMENTARIO
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