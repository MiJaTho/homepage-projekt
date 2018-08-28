<?php declare(strict_types=1);

require_once PATH . 'Core/Controller.php';
require_once PATH . 'Core/Request.php';
require_once PATH . 'Models/UserModel.php';

class RegistrationController extends Controller
{
  
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->model = new UserModel($this->db);
    }

   
    public function create() : string
    {
        return $this->render('auth/register.twig');
    }

    
    public function store() : string
    {
        $params = $this->request->params();
        
        $username = $params->get('username');
        $password = $params->get('password');
        $screenname = $params->get('screenname');

        $this->data['old'] = [ 'username' => $username ];

        if (empty($username) || empty($password) || empty($screenname)) {
            $this->data['error'] = "Please fill in all fields.";
        }

        if ($this->model->getUser($username)) {
            $this->data['error'] = "This email address is already registered.";
        }

        if (empty($this->data['error'])) {

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $success = $this->model->createUser($username, $passwordHash, $screenname);

           
            if ($success) {
               
                header('Location: ' . $this->request->basePath() . '/login');                
            }

            else {
                $this->data['error'] = "Could not create account.";
            }
        }

        return $this->render('auth/register.twig');
    }
}
