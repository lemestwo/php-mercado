<?php

namespace App\Controllers;


use App\Models\Tax;

class TaxesController extends Controller
{
    /**
     * Return view with all models
     */
    public function index()
    {
        return $this->view('Tax/index', ['taxes' => Tax::all()]);
    }

    /**
     * Return view to create new model
     */
    public function create()
    {
        return $this->view('Tax/create');
    }

    /**
     * Return view to edit provided model
     *
     * @param int $id
     */
    public function edit($id)
    {
        return $this->view('Tax/edit', ['tax' => Tax::find($id)]);
    }

    /**
     * Create model and redirect
     */
    public function store()
    {
        $name = $_POST['name'];
        $percent = (int)$_POST['percent'];
        if ($percent <= 0) {
            $percent = 0;
        }

        if (Tax::create($name, $percent)) {
            header("Location: /taxes");
            die();
        } else {
            return http_response_code(404);
        }
    }

    /**
     * Delete model and redirect
     *
     * @param int $id
     */
    public function delete($id)
    {
        if (Tax::delete($id)) {
            header("Location: /taxes");
            die();
        } else {
            return http_response_code(404);
        }
    }
}