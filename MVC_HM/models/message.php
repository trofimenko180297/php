<?php
class Message extends Model
{
   public function save($data, $id = null)
   {

       if ( empty($data['name']) || empty($data['email']) || empty($data['message']) ){
            return false;
       }else {

       $id = (int)$id;
       $name = $this->db->escape($data['name']);
       $email = $this->db->escape($data['email']);
       $message = $this->db->escape($data['message']);


       if ( !$id ){
           $sql = "
               insert into message
               set name = '{$name}',
                   email = '{$email}',
                   message = '{$message}'
           ";
           }else {
           $sql = "
               update message
               set name = '{$name}',
                   email = '{$email}',
                   message = '{$message}'
               where id = {$id}
           ";
       }
       }

       return $this->db->query($sql);
   }

    public function getList()
    {
        $sgl = "select * from message where 1";
        return $this->db->query($sgl);
    }

    public function getbyId($id)
    {
        $id = (int)$id;
        $sql = "select * from message where id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function delete($id)
    {
        $id = (int)$id;
        $sql = "delete from message where id = {$id}";
        return $this->db->query($sql);
    }

}

?>