<?php 

require_once('database/db.php');
require_once('api/category.php');

$url = explode("/",$_SERVER['QUERY_STRING']);


header('Access-Control-Allow-Origin: Aplication/json');
header('Content-Type: Aplication/json');

if($url[0]=="user"){
    $category = new User();

    if($url[1]=="all"){
       
       $date = $category->all();
       $result=[
        'status'=>200,
        'data'=>$date
       ];
       echo json_encode($result);
       
    }
    else if($url[1]=="add"){
        header('Access-Control-Allow-Methods: POST');
      $date = file_get_contents("php://input");
      $date_de = json_decode($date,true);

      $res= $category->add($date_de);
      if($res){
        $res = [
            'status'=>201,
            'msg'=>'user created'
        ];
      }else{
        $res =[
            'status'=>400,
            'msg'=>'error'
        ];
      }
      echo json_encode($res);
      //  $category->add();
    }else if($url[1]=="update"){

        
        //$category->update();
    }else if($url[1]=="delete"){
        $category->delete();
    }
}

?>