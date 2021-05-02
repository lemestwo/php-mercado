<?php


namespace App\Controllers;


use App\Models\Product;
use App\Models\Tax;

class ProductController extends Controller
{
    /**
     * Return view with all models
     */
    public function index()
    {
        return $this->view('Product/index', ['products' => Product::all()]);
    }

    /**
     * Return view to create new model
     */
    public function create()
    {
        $taxes = Tax::all();
        return $this->view('Product/create', ['taxes' => $taxes]);
    }

    /**
     * Return view to edit provided model
     *
     * @param int $id
     */
    public function edit($id)
    {
        $taxes = Tax::all();
        return $this->view('Product/edit', [
            'product' => Product::find($id),
            'taxes' => $taxes
        ]);
    }

    /**
     * Create model and redirect
     */
    public function store()
    {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $price = $_POST['price'];

        if (Product::create($name, $type, $price)) {
            header("Location: /products");
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
        if (Product::delete($id)) {
            header("Location: /products");
            die();
        } else {
            return http_response_code(404);
        }
    }

    /**
     * Edit model and redirect
     *
     * @param int $id
     */
    public function patch($id)
    {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $price = $_POST['price'];

        if (Product::update($name, $type, $price, $id)) {
            header("Location: /products");
            die();
        } else {
            return http_response_code(404);
        }
    }
}