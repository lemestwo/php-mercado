<?php


namespace App\Models;


use App\Core\Database;

class Product
{
    /**
     * Get all entries from this model
     */
    public static function all(): array
    {
        $query = '
            select d.id as id,
                   d.type as type,
                   d.name as name,
                   d.price as price,
                   t.id as t_id,
                   t.name as t_name,
                   t.percent as t_percent
            from products d
                join taxes t on d.type = t.id
            order by d.id desc
        ';
        $array = pg_fetch_all(pg_query(Database::getConnection(), $query));
        if (!is_array($array)) {
            $array = [];
        }

        return $array;
    }

    /**
     * Create new registry into the database
     *
     * @param string $name
     * @param string $type
     * @param $price
     * @return bool
     */
    public static function create(string $name, string $type, $price): bool
    {
        $floatPrice = floatval(str_replace(['.', ','], ['', '.'], $price));
        $query = 'INSERT INTO public.products (id, type, name, price) VALUES (DEFAULT, $1, $2, $3);';
        if (pg_query_params(Database::getConnection(), $query, [$type, $name, $floatPrice])) {
            return true;
        }
        return false;
    }


    /**
     * Get model by $id
     *
     * @param int $id
     * @return mixed
     */
    public static function find(int $id)
    {
        $query = '
            select d.id as id,
                   d.type as type,
                   d.name as name,
                   d.price as price,
                   t.id as t_id,
                   t.name as t_name,
                   t.percent as t_percent
            from products d
                join taxes t on d.type = t.id
            where d.id = $1
        ';
        $array = pg_fetch_all(pg_query_params(Database::getConnection(), $query, [$id]));

        if (!isset($array[0])) {
            exit(404);
        }
        return $array[0];
    }

    /**
     * Update registry from the database
     *
     * @param string $name
     * @param string $type
     * @param $price
     * @param $id
     * @return bool
     */
    public static function update(string $name, string $type, $price, $id): bool
    {
        $floatPrice = floatval(str_replace(['.', ','], ['', '.'], $price));
        $query = 'UPDATE public.products SET name = $1, type = $2, price = $3 WHERE id = $4;';
        if (pg_query_params(Database::getConnection(), $query, [$name, $type, $floatPrice, $id])) {
            return true;
        }
        return false;
    }

    /**
     * Delete registry from the database
     *
     * @param $id
     * @return bool
     */
    public static function delete($id): bool
    {
        $query = 'DELETE FROM public.products WHERE id = $1;';
        if (pg_query_params(Database::getConnection(), $query, [$id])) {
            return true;
        }
        return false;
    }
}