<?php declare(strict_types=1);

require_once PATH . 'Core/Model.php';

class PostsModel extends Model
{
    public function getPosts(int $userId) :array
    {
        $userId = intval($userId);

        $sql = <<<QUERY
SELECT P.*, U.screenname
FROM posts P
JOIN users U ON P.user_id = U.id
ORDER BY p.created_at DESC
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
public function getPost( int $postId ) :array 
{
    $sql = <<<QUERY
SELECT * 
FROM posts WHERE id = $postId
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

    public function createPost(int $userId, string $title, string $content)
    {
        $userId = intval($userId);
        $title = $this->db->escape_string($title);
        $content = $this->db->escape_string($content);

        $sql = <<<QUERY
INSERT INTO posts
(`user_id`, `title`, `content`) VALUES
($userId, '$title', '$content')
QUERY;
        
        return $this->db->query($sql);
    }
public function editPost( string $title, string $content,int $id)
    {
        $id = intval($id);
        $title = $this->db->escape_string($title);
        $content = $this->db->escape_string($content);

        $sql = <<<QUERY
UPDATE posts SET title = $title, content = $content WHERE id = $id
QUERY;
        
        return $this->db->query($sql);
    }
    
    public function deletePosts($id) :bool

    {
       
        $sql = "DELETE FROM `posts` WHERE `id`=$id";
        return $this->db->query($sql);
    }
}