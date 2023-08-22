<?php
class Inquiry{
    protected $db_config;
    protected $conn;

    public function __construct(){
        
        if (empty($this->db_config)) {
            $this->db_config = parse_ini_file(__DIR__.'/../config/config.ini');
        }

        $this->conn = new \PDO(
            "mysql:host={$this->db_config['db_host']};dbname={$this->db_config['db_name']}",
            $this->db_config['db_user'],
            $this->db_config['db_pass']
        );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    
    public function insert($body, $email, $types, $name='匿名', $file_path = ''){

        $sql = "INSERT INTO db.inquiries 
        (
            inquiry_body,
            inquiry_email,
            inquiry_name,
            inquiry_types,
            inquiry_file_path
        ) VALUES (
            :body, 
            :email,
            :name, 
            :types, 
            :file_path
        );";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':body', $body);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':types', $types);
        $stmt->bindValue(':file_path', $file_path);
        $stmt->execute();
    }

    public function select()
    {
            $model = new Model();
            $sql = "SELECT * FROM db.inquiry";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return [
                "pdo" => $this->connect,
                "result" => $result
            ];
    }
}