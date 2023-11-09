<?php
namespace app\modules;
class UserModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function getUsers($cols){
        return $this->db->get("users",null,$cols);
    }
    public function addUser($data){
        return $this->db->insert("users",$data);
    }
    public function updateUser($data,$id){
        $this->db->where("id",$id);
        return $this->db->update("users",$data);
    }
    public function deleteUser($id){
        $this->db->where("id",$id);
        return $this->db->delete("users");
    }
    public function getUser($id){
        $this->db->where("id",$id);
        return $this->db->get("users");
    }
    public function loginUser($data){
        $this->db->where("email",$data["email"])->where("password",$data["password"]);
        return $this->db->get("users");
    }
}