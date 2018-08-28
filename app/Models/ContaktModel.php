<?php declare(strict_types=1);

require_once PATH . 'Core/Model.php';

class ContaktModel extends Model
{
    
    public function getContakts() : array
    {
        $sql = <<<QUERY
SELECT *
FROM contakts
ORDER BY id
QUERY;
        $result = $this->db->query($sql);
        if ($result) {
            while ($ds = $result->fetch_assoc()) {
                $data[] = $ds;
            }
            $result->free();
        }
       
        return $data ?? [];
        
    }

    public function createContakt($lastname, $name, $email, $message, $gender)
    {
        
        $lastname = $this->db->escape_string($lastname);
        $name = $this->db->escape_string($name);
        $email = $this->db->escape_string($email);
        $message = $this->db->escape_string($message);
        $gender = $this->db->escape_string($gender);
        
     

    $sql = <<<QUERY
INSERT INTO contakts
(`lastname`,`name`,`email`,`message`, `gender` ) VALUES
('$lastname', '$name', '$email','$message', '$gender')
QUERY;
        
        return $this->db->query($sql);
    }

    public function deleteContakt(int $id) : bool
    {
       
        $sql = "DELETE FROM `contakts` WHERE `id`=$id";
        return $this->db->query($sql);
    }
}