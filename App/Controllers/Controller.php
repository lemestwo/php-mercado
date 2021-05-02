<?php

namespace App\Controllers;

class Controller
{
    /**
     * Include views with parameters.
     *
     * @param string $view
     * @param array $data
     * @return bool|int
     */
    public function view(string $view, array $data = [])
    {
        foreach ($data as $name => $value) {
            ${$name} = $value;
        }
        ob_start();
        $dir = __DIR__ . '/../Views/';
        include $dir . 'header.php';
        include $dir . $view . '.php';
        include $dir . 'footer.php';
        ob_flush();

        return http_response_code(200);
    }
}