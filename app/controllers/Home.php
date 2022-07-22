<?php

class Home extends Controller
{
    public function __construct()
    {
      
    }

    public function index() {
       
    }

    public function login() {
       if ($_SERVER['REQUEST_METHOD'] == 'POST'){

       }else{
        $this->view('pages/login');
       }
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
        }else{
         $this->view('pages/register');
        }
     }

}