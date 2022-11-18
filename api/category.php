<?php 
  use Dcblogdev\PdoWrapper\Database;
class User{
    public $db;
    public function __construct(){
      

// make a connection to mysql here
$options = [
    //required
    'username' => 'root',
    'database' => 'api',
    //optional
    'password' => '',
    'type' => 'mysql',
    'charset' => 'utf8',
    'host' => 'localhost',
    'port' => '3306'
];

  $this->db = new Database($options);
    }


    public function all(){
        $data = $this->db->rows("SELECT * FROM users");
        return $data;
    }
    public function add($data){
        $data= $this->db->insert('users',$data);
        return $data;
    }



    public function update($data,$id){
        $data = $this->db->update("users",$data,$id);
        return $data;
    }
    public function delete(){
     echo "delte";   
    }
}

?>