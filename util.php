<?php
class Util{
    //Method of input value Sanitization

    public function testInput($data){
       $data = trim($data);//removes all whitespaces from the data
       $data =  stripslashes($data);//remove all slashes form the data
       $data = htmlspecialchars($data);//converts html special characters into entities
       $data = strip_tags($data);//removes html tags from input

       return $data;
    }

    //Method for displaying success and Error Message
    public function showMessage($type, $message){
        return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
  <strong>'.$message.'</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
}