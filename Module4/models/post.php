<?php

class Post extends Model
{
    public function getAll()
    {
        $sql = "
                select n.id, c.category, n.news_tittle as tittle, n.news_content as content, n.news_date as date, n.general_image, n.is_analitic  from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                ";
        return $this->db->query($sql);
    }

    public function getAnalitic($count = false)
    {
        if ($count){
            $count = $this->db->escape($count);
            $sql = "
                select n.id, c.category, n.news_tittle as tittle, n.news_content as content, n.news_date as date, n.general_image, n.is_analitic from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                WHERE n.is_analitic = 1
                LIMIT {$count}
                ";
        }else{
            $sql = "
                select n.id, c.category, n.news_tittle as tittle, n.news_content as content, n.news_date as date, n.general_image, n.news_tags AS tags, n.is_analitic from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                WHERE n.is_analitic = 1
                ";
        }
        return $this->db->query($sql);
    }

    public function search($keywords)
    {
        $keywords = $this->db->escape($keywords);
        $sql = "
                SELECT n.news_tags AS tag FROM news n WHERE n.news_tags LIKE '%{$keywords}%' 
               ";
        return $this->db->query($sql);
    }

    public function getByCount($count)
    {
        $count = $this->db->escape($count);
        $sql = "
                select n.id, c.category, n.news_tittle as tittle, n.news_content as content, n.news_date as date, n.general_image, n.is_analitic from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                LIMIT {$count}
                ";
        return $this->db->query($sql);
    }

    public function getById($id)
    {
        $id = $this->db->escape($id);
        $sql = "
                select n.id, c.category, n.news_tittle as tittle, n.news_content as content, n.news_date as date, n.general_image, n.news_tags AS tag, n.is_analitic from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                WHERE n.id = {$id}
                ";
        $result = $this->db->query($sql);
        $content = explode('.', $result['0']['content']);
        $arr = array();
        foreach ($content as $item){
            static $count = 0;
            if ($count == 5){
                break;
            }
            $arr[] = $item;
            $count++;
        }
        $result[0]['short_content'] = implode('.', $arr);
        return $result;
    }

    public function getByCategory($category, $count = false)
    {
        $category = $this->db->escape($category);
            $sql = "
                select n.id, c.category, n.news_tittle as tittle, n.news_content as content, n.news_date as date, n.general_image, n.is_analitic, n.news_tags as tags from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                WHERE c.category = '{$category}'
                ORDER BY c.category, date DESC 
                LIMIT {$count},5
                ";
        return $this->db->query($sql);
    }

    public function getCountByCategory($category)
    {
        $category = $this->db->escape($category);
        $sql = "
                select COUNT(n.id) as num from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                WHERE c.category = '{$category}'
                ";
        return $this->db->query($sql);
    }

    public function getByTag($tag, $count=false)
    {
        $tag = $this->db->escape($tag);
        $sql = "
                select n.id, c.category, n.news_tittle as tittle, n.news_content as content, n.news_date as date, n.general_image, n.news_tags as tags, n.is_analitic from news n
                JOIN 
                news_categories c
                ON n.id_category = c.id
                WHERE n.news_tags LIKE '%{$tag}%'
                LIMIT {$count},5
                ";
        return $this->db->query($sql);
    }

    public function test($categories)
    {
        $result = array();
        foreach ($categories as $category){
            $result[] = [$category['category'] => self::getByCategory($category['category'], 5)];
        }
        return $result;
    }


    public function getCategories()
    {
        $categories = new Category();
        return $categories->getListAll();
    }

    public function getLastId()
    {
        $sql = "select id from news ORDER BY id DESC limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function update($data, $id)
    {
        if (!empty($data)) {
            $category = $this->db->escape($data['category']);
            $tittle = $this->db->escape($data['tittle']);
            $content = $this->db->escape($data['content']);
            $tags = $this->db->escape($data['tags']);
            $sql = "
                    UPDATE `news` SET `id_category` = {$category}, news_tittle = '{$tittle}', news_content = '{$content}', news_tags = '{$tags}'  WHERE `news`.`id` = {$id}
                   ";
            return $this->db->query($sql);
        }
        return false;
    }

    public function save($data)
    {
        if (!empty($data)){
            $category = $this->db->escape($data['category']);
            $tittle = $this->db->escape($data['tittle']);
            $content = $this->db->escape($data['content']);
            $tags = $this->db->escape($data['tags']);
            $sql = "
            INSERT INTO news (id_category, news_tittle, news_content, news_tags) VALUE ('{$category}', '{$tittle}', '{$content}', '{$tags}')
            ";
            return $this->db->query($sql);
        }
        return false;
    }

    public function delete($id)
    {
        $sql = "delete from news where id = {$id}";
        return $this->db->query($sql);
    }


    public function set_img($img, $id)
    {
        $image = $this->db->escape($img);
        $id = $this->db->escape($id);
        $sql = "
          UPDATE `news` SET `general_image` = '{$image}' WHERE `news`.`id` = {$id}
        ";
        return $this->db->query($sql);
    }

    public function getComment($id)
    {
        $comment = new Comment();
        return $comment->getByPost($id);
    }

    public function getCommentUser()
    {
        $comment = new Comment();

    }

    public function getTopPost()
    {
        $sql = "
               SELECT COUNT(news.news_tittle) as total, news.id, news.news_tittle, news_comment.date as comment_date FROM news
                JOIN news_comment
                ON news.id = news_comment.id_post
                WHERE DAY(CURRENT_DATE) - 1 = DAY(news_comment.date)
                GROUP BY (news.news_tittle)
                LIMIT 5
               ";
        return $this->db->query($sql);
    }
}