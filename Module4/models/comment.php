<?php

class Comment extends Model
{
    public function save($data)
    {
        if (!empty($data)){
            $user = $this->db->escape($data['id_user']);
            $post = $this->db->escape($data['id_post']);
            $content = $this->db->escape($data['content']);
            $sql ="
                INSERT INTO news_comment (id_user, id_post, content) VALUES ({$user}, {$post}, '{$content}')
                  ";
        }
        return $this->db->query($sql);
    }

    public function getByPost($id = null)
    {
        if ($id != null){
            $sql = "
                  SELECT u.login AS user, c.id, c.content, c.date, c.positive, c.negative  FROM news_comment c
                  JOIN
                  users u
                  ON c.id_user = u.id
                  WHERE c.id_post = {$id}
                  ORDER BY (c.positive) DESC
                   ";
        }
        return $this->db->query($sql);
    }

    public function setStatus($positive = false, $id)
    {
        $id = $this->db->escape($id);
        if ($positive){
            $sql = "
                    UPDATE `news_comment` SET `positive` = `positive` + 1 WHERE `news_comment`.`id` = {$id};
                   ";
        }else{
            $sql = "
                    UPDATE `news_comment` SET `negative` = `negative` - 1 WHERE `news_comment`.`id` = {$id};
                   ";
        }
        return $this->db->query($sql);
    }

    public function getTopCommentator()
    {
        $sql = "
        SELECT COUNT(users.login) AS total, users.id, users.login FROM users
        JOIN
        news_comment
        ON users.id = news_comment.id_user
        GROUP BY (users.login)
        LIMIT 5
        ";
        return $this->db->query($sql);
    }

    public function getByUser($id)
    {
        if ($id != null) {
            $sql = "
                   SELECT u.login AS user, n.news_tittle, n.id AS id_news, c.id, c.content, c.date, c.positive, c.negative, c.date  FROM news_comment c
                  JOIN
                  users u
                  ON c.id_user = u.id
                  JOIN news n 
                  ON c.id_post = n.id
                  WHERE c.id_user = {$id}
                   ";
        }
        return $this->db->query($sql);
    }

    public function getCount($id)
    {
        $sql = "
                   SELECT COUNT (u.login) as num, u.login AS user FROM news_comment c
                  JOIN
                  users u
                  ON c.id_user = u.id
                  JOIN news n 
                  ON c.id_post = n.id
                  GROUP BY (u.login)
                  WHERE c.id_user = {$id}
                   ";
    }

    public function setCommentUser($data)
    {
        if (!empty($data)){
            $user = $this->db->escape($data['id_user']);
            $post = $this->db->escape($data['id_comment']);
            $content = $this->db->escape($data['content']);
            $sql ="
                INSERT INTO users_comments (id_user, id_comment, content) VALUES ({$user}, {$post}, '{$content}')
                  ";
        }
        return $this->db->query($sql);
    }

    public function getCommentUser($id)
    {
        $sql = "
                SELECT users_comments.id, users.login, users_comments.content, users_comments.date FROM users_comments
                JOIN news_comment
                ON users_comments.id_comment = news_comment.id
                JOIN users
                ON users.id = users_comments.id_user
                WHERE users_comments.id_comment = {$id}
                   ";
        return $this->db->query($sql);
    }

    public function test($comments)
    {
        $result = array();
        foreach ($comments as $comment){
            $result[] = [$comment['id'] => self::getCommentUser($comment['id'])];
        }
        return $result;
    }
}