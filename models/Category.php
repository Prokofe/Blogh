<?php

class Category {

    public static function getAllCategories()
    {

        $db = Database::getConnection();

        $sql = 'SELECT * FROM categories';
        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchAll();
    }

}