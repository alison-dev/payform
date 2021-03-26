<?php

namespace Source\Core;

use \Source\Support\Seo;
use \Source\Support\Message;

/**
 * Description of Controller
 *
 * @author Alison
 */
class Controller
{
    /**
     * @var View 
     */
    protected $view;
    
    /**
     * @var Seo 
     */
    protected $seo;
    
    /**
     * @var Message 
     */
    protected $message;


    /**
     * Controller constructor
     * @param string $pathToViews
     */
    public function __construct(string $pathToViews = null)
    {
        $this->view = new View($pathToViews);
        $this->seo = new Seo();
        $this->message = new Message();
    }
}