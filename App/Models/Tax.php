<?php

namespace App\Models;

use App\Core\Database;

class Tax
{
    /**
     * Get all entries from this model
     */
    public static function all(): array
    {
        $array = pg_fetch_all(pg_query(Database::getConnection(), 'select * from taxes'));

        if (!is_array($array)) {
            $array = [];
        }
        return $array;
    }

    /**
     * Get model by $id
     *
     * @param int $id
     * @return mixed
     */
    public static function find(int $id)
    {
        $query = 'select * from taxes where id = $1';
        $array = pg_fetch_all(pg_query_params(Database::getConnection(), $query, [$id]));

        if (!isset($array[0])) {
            exit(404);
        }
        return $array[0];
    }

    /**
     * Create new registry into the database
     *
     * @param string $name
     * @param int $percent
     * @return bool
     */
    public static function create(string $name, int $percent): bool
    {
        $floatPercent = floatval($percent / 100);
        $query = 'INSERT INTO public.taxes (id, name, percent) VALUES (DEFAULT, $1, $2);';
        if (pg_query_params(Database::getConnection(), $query, [$name, $floatPercent])) {
            return true;
        }
        return false;
    }

    /**
     * Remove registry from database
     *
     * @param $id
     * @return bool
     */
    public static function delete($id): bool
    {
        $query = 'DELETE FROM public.taxes WHERE id = $1;';
        if (pg_query_params(Database::getConnection(), $query, [$id])) {
            return true;
        }
        return false;
    }
}