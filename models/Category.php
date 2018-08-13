<?php

class Category
{

    public static function getAllCategories()
    {

        $db = Database::getConnection();

        $sql = 'SELECT * FROM categories';
        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchAll();
    }

    public static function getAllCategoryCount()
    {

        $db = Database::getConnection();

        $sql = 'SELECT count(id) AS count FROM categories';

        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch();
        return $row['count'];
    }

    public static function addCategory($name)
    {

        $db = Database::getConnection();

        $sql = 'INSERT INTO categories (name) VALUE (:name)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);

        return $result->execute();

    }

    public static function editCategory($categoryId, $name)
    {

        $db = Database::getConnection();

        $sql = 'UPDATE categories SET name = :name WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name);
        $result->bindParam(':id', $categoryId);

        return $result->execute();
    }

    public static function deleteCategory($categoryId)
    {

        $db = Database::getConnection();

        $sql = 'DELETE FROM categories WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $categoryId);

        return $result->execute();
    }

    public static function getCategoryById($categoryId)
    {

        $db = Database::getConnection();

        $sql = 'SELECT * FROM categories WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $categoryId);
        $result->execute();

        return $result->fetch();
    }

}