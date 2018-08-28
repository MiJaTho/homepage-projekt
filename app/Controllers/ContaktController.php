<?php declare(strict_types=1);

require_once PATH . 'Core/Controller.php';
require_once PATH . 'Models/ContaktModel.php';



class ContaktController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ContaktModel($this->db);
      
       
        $this->data['page'] = 'contakts';
        
    }

    public function index() :string
    {
        $this->data['contakts'] = $this->model->getContakts();
      
        return $this->render('contakt.twig');
    }

   

    public function store() : string
    {
        $params = $this->request->params();
        $lastname = $params->get('lastname');
        $name = $params->get('name');
        $email = $params->get('email');
        $message = $params->get('message');
        $gender = $params->get('gender');
      
     
        
        if (empty($params->get('gender'))) {
            $this->data['messages']['errors'][] = 'Please select a Gender.';
        }
        if (empty($params->get('lastname'))) {
            $this->data['messages']['errors'][] = 'Please provide the  Lastname.';
        }
        if (empty($params->get('email'))) {
            $this->data['messages']['errors'][] = 'Please provide the Email.';
        }

        if (empty($this->data['messages']['errors'])) {
            $mame = $params->getString('name');
            $lastmame = $params->getString('lastname');
            $email = $params->getString('email');
            $message = $params->getString('message');
           
            

            $success = $this->model->createContakt($lastname, $name, $email, $message, $gender);
           
            if (!$success) {
                $this->data['messages']['errors'][] = $this->db->error;
            }
        }
 
        return $this->index();
    }
     
    public function destroy(int $id)
    {
        $success = $this->model->deleteContakts($id);

        if (!$success) {
            $this->data['messages']['errors'][] = $this->db->error;
        }

        return $this->index();
    }

    
}
