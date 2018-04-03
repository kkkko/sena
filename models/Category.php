<?php

include_once(ROOT.'/components/DB.php');

class Category
{
  
  public static function getCategoriesList() {
    
    $db = DB::getConnection();
    
    $result = $db->query('SELECT * FROM category');
    
    $i = 0;
    $categoriesList = array();
    
    while ($row = $result->fetch()) {
      $categoriesList[$i]['id'] = $row['id'];
      $categoriesList[$i]['title'] = $row['title'];
      $i++;
    }
    return $categoriesList;
  }
};