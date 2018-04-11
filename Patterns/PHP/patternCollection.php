<?php
   header("content-type:application/json");

   include_once 'Patterns/PHP/PatternCollection.php';
   if (isset($_POST['refresh']) && !empty($_POST['refresh']))
   {
      $test = 
         array
         (
            array
            (
               'firstName' => 'Dale',
               'lastName'  => 'Drinks'
            )
         );
      
      $patternTitles = array();
         
         foreach ($pattern->getTitles() as $title)
         {
            array_push($patternTitles, array('title' => $title));
         }
      
      echo json_encode($patternTitles);
      exit();
   }
