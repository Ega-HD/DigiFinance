<?php

class Controller 
{
    public function view($view, $data = [])
    {
        require_once VIEWPATH . $view . '.php';
    }

    public function model($model)
    {
        
    }
}