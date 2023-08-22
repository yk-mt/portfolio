<?php

class MyPDO
{
    protected $db_config;
    protected $conn;

    public function __construct()
    {

        if (empty($this->db_config)) {
            $this->db_config = parse_ini_file('config.ini');
        }

        $this->conn = new \PDO(
            "mysql:host={$this->db_config['db_host']};dbname={$this->db_config['db_name']}",
            $this->db_config['db_user'],
            $this->db_config['db_pass']
        );

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    }

    public function find()
    {
            $sql = "WITH 
                posts_relation AS (
                    SELECT 
                        posts.post_id, 
                        posts.post_name, 
                        posts.post_body, 
                        tags.tag_name 
                    FROM 
                        db.posts posts 
                    LEFT JOIN 
                        db.tags tags 
                        ON posts.post_id = tags.post_id 
                ) 
                SELECT 
                    a.post_id, 
                    a.post_name, 
                    a.post_body, 
                    GROUP_CONCAT(a.tag_name separator ' ') AS tag_names 
                FROM posts_relation a
                GROUP BY 
                    post_id, 
                    post_name,
                    post_body";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return [
                "pdo" => $this->connect,
                "result" => $result
            ];

    }

    public function findByHashTag($searchCondition)
    {
            $sql = "WITH 
                posts_relation AS (
                    SELECT 
                        posts.post_id, 
                        posts.post_name, 
                        posts.post_body, 
                        tags.tag_name 
                    FROM 
                        db.posts posts 
                    LEFT JOIN 
                        db.tags tags 
                        ON posts.post_id = tags.post_id 
                    WHERE tags.tag_name LIKE CONCAT(:target, '%')
                ) 
                SELECT 
                    a.post_id, 
                    a.post_name, 
                    a.post_body, 
                    GROUP_CONCAT(a.tag_name separator ' ') AS tag_names 
                FROM posts_relation a
                GROUP BY 
                    post_id, 
                    post_name,
                    post_body";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':target', $searchCondition);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return [
                "pdo" => $this->connect,
                "result" => $result
            ];

    }

    public function insert($body, $name, $hashtags)
    {
        $sql  = "INSERT INTO db.posts (post_body, post_name) VALUES (:body, :name);";
        $sql2 = "INSERT INTO db.tags (tag_name, post_id) VALUES (:tag,:post_id);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':body', $body);
        $stmt->bindValue(':name', $name);
        $stmt->execute();
        
        $tag_regist_lists = explode(" ",$hashtags);
        $lastId = $this->conn->lastInsertId();
        foreach($tag_regist_lists as $tag){
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->bindValue(':tag', $tag);
            $stmt2->bindValue(':post_id', $lastId);
            $stmt2->execute();
        }

    }
}
