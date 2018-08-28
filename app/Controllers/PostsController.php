<?php declare(strict_types=1);

require_once PATH . 'Core/Controller.php';
require_once PATH . 'Models/PostsModel.php';
require_once PATH . 'Models/ContaktModel.php';

class PostsController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new PostsModel($this->db);
       
    }

    public function index() :string
    {
       $this->data['posts'] = $this->model->getPosts($this->user);
      
        return $this->render('post.twig');
    }

    public function store() : string
    {
        $params = $this->request->params();
      

        $success = $this->model->createPost(
            $this->user,
            $params->get('title'),
            $params->get('content')
        );

        if ($success) {
            $this->data['messages']['oks'][] = "Your post has been published.";
        }
        else {
            $this->data['messages']['errors'][] = "Sorry, we couldn't publish your post.";
        }

        return $this->index();
    }
    public function create(int $id) : string
    {
        
         
         $postId = $id;
         $this->data["post"] = $this->model->getPost($postId);
        
       return $this->render("parts/edit_post.twig");
       
    }
    public function edit() : string
    {
        $params = $this->request->params();
        $success = $this->model->editPost(
            $this->user,
            $params->get('title'),
            $params->get('content')
            // $postid->get('id')
        );

        if ($success) {
            $this->data['messages']['oks'][] = "Your post has been published.";
        }
        else {
            $this->data['messages']['errors'][] = "Sorry, we couldn't publish your post.";
        }

        return $this->index();
    }


    public function destroy(int $id)
    {
        $success = $this->model->deletePosts($id);

        if (!$success) {
            $this->data['messages']['errors'][] = $this->db->error;
        }

        return $this->index();
    }
    
}
