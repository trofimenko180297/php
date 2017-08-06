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

    public function deactiveUser($id)
    {
        $id = $this->db->escape($id);
        $sql = "update users
                set is_active = 0
                WHERE id = '{$id}'
                ";

        return $this->db->query($sql);
    }

    public function checkUser($data)
    {
        $login = $this->db->escape($data['login']);
        $email = $this->db->escape($data['email']);

        $sql = "select users.login from `users`
                where
                `login` = '{$login}'
                OR 
                `email` = '{$email}'
                ";

        return $this->db->query($sql);
    }

    public function register($data)
    {
        $login = $this->db->escape($data['login']);
        $email = $this->db->escape($data['email']);
        $password = $this->db->escape($data['password']);
        $password_hash = md5(Config::get('salt') . $data['password']);

        $sql = "insert into `users`
                set login = '{$login}',
                    email = '{$email}',
                    password = '{$password_hash}'
                    ";

        return $this->db->query($sql);
    }
}


?>