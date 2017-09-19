<?php

class Site extends Model
{
    public function set($data)
    {
        $site_color = $this->db->escape($data['site_color']);
        $admin_color = $this->db->escape($data['admin_color']);

        $sql = "
               INSERT INTO site (site_color, admin_color) VALUES ('{$site_color}', '{$admin_color}')
               ";

        return $this->db->query($sql);
    }

    public function get()
    {
        $sql = "
               SELECT * from site
               ";
        return $this->db->query($sql);
    }
}