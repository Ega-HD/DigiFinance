<?php

class Controller 
{
    public function view($view, $data = [])
    {
        require_once VIEWPATH . $view . '.php';
    }

    public function model($model)
    {
        require_once MODPATH . $model . '.php';
        return new $model;
    }
}