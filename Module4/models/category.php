<?php

class Category extends Model
{
    public function getListAll()
    {
        $sql = "select * from news_categories";
        return $this->db->query($sql);
    }

    public function save($data)
    {
        if (!empty($data)){
            if (!empty($data['category'])){
                $category = $this->db->escape($data['category']);
                $sql = "
                INSERT INTO news_categories (category) VALUE ('{$category}')
                ";
                return $this->db->query($sql);
            }
        }
        return false;
    }

    public function getById($id)
    {
        $sql = "select * from news_categories WHERE id = {$id}";
        return $this->db->query($sql);
    }

    public function update($data, $id)
    {
        if (!empty($data)) {
            $category = $this->db->escape($data['category']);
            $sql = "
                    UPDATE news_categories SET `category` = '{$category}'  WHERE `news_categories`.`id` = {$id}
                   ";
            return $this->db->query($sql);
        }
        return false;
    }

    public function delete($id)
    {
        $sql = "delete from news_categories where id = {$id}";
        return $this->db->query($sql);
    }

}