<?php
function base_path($file){
  // var_dump(BASE_PATH);
  return BASE_PATH . $file;
}

function login($user){
$_SESSION['user']=$user;

}

function checkValidate($type,$field){
  if(empty($field)){
    echo  "$type  is required";
  }
}