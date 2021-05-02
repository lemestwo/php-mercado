<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    /**
     * Returns the dashboard index
     *
     * @return bool|int
     */
    public function index()
    {
        return $this->view('index');
    }
}