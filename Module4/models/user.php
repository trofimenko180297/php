<?php
class User extends Model
{
    public function getByLogin($login)
    {

        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if( isset($result[0]) ){
            return $result[0];
        }
        return false;
    }

    public function register($login, $email, $password)
    {
        $login = $this->db->escape($login);
        $email = $this->db->escape($email);
        $password = $this->db->escape($password);

        $sql = "
               INSERT INTO users (login, email, password) VALUES ('{$login}', '{$email}', '{$password}')
               ";

        return $this->db->query($sql);
    }
}


?>