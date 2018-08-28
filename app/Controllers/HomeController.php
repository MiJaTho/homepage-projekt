<?php declare(strict_types=1);

require_once PATH . 'Core/Controller.php';


class HomeController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        
    }

    public function index()
    {
        
        return $this->render('home.twig');
    }

  
}
