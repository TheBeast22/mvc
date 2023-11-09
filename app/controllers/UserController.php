<?php
namespace app\controllers;
class UserController{
    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function index(){ 
        $users =  $this->model->getUsers(["email","id"]);
        include "./app/views/user_view.php";    
}
    public function addUser(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $data = ["email"=>$_POST["email"],"password"=>$_POST["password"],"rule"=>$_POST["rule"]];
          $this->model->addUser($data);
    }
    header("location:" . BASE_PATH);
}
    public function updateUser(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = ["email"=>$_POST["email"],"password"=>$_POST["password"],"rule"=>$_POST["rule"]];
            $this->model->updateUser($data,$_POST["id"]);
      }
      header("location:" . BASE_PATH);
    }
    public function deleteUser($id){
        $this->model->deleteUser($id);
        if($_COOKIE["login"] == $id)
         $this->logout();
        else
         header("location:" . BASE_PATH);
    }
    public function getUser($id){
        $user = $this->model->getUser($id);
        include "./app/views/update_user.php";
    }
    public function login(){
      if(!isset($_COOKIE["login"])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["email"=>$_POST["email"],"password"=>$_POST["password"]];
         $user = $this->model->loginUser($data);
         if($user)
            setcookie("login",$user[0]["id"],0,'/');
         else
            header("location:./app/views/login.php");
        }
        else 
           header("location:./app/views/login.php");
    }
}
public function logout(){
    setcookie("login","",time() - 1,'/');
    header("location:" . BASE_PATH);
}
}