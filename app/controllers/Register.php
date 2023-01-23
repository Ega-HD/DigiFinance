<?php

class Register extends Controller
{
    public function index()
    {
        $this->view('auth/register');
    }

    public function addUser()
    {
        var_dump($_POST);
    }
}