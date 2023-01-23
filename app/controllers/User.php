<?php

class User extends Controller
{
    public function index()
    {
        $data['user'] = $this->model('User_model');
    }
}