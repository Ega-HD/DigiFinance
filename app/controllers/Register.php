<?php

class Register extends Controller
{
    public function index()
    {
        $this->view('auth/register');
    }

    public function addUser()
    {
        if($this->model('UserModel')->addUser($_POST) > 0)
        {
            header('Location: Login');
        }
    }
}