<?php

include_once 'Patterns/PHP/FileData/ReadFile.php';
include_once 'Patterns/PHP/FileData/WriteFile.php';

class Patterns
{
   /**
    * Constructor
    */
   public function Patterns()
   {
      $this->theFile = new ReadFile();
   }

   /**
    * Initializes the class by getting all the data from the file
    * @parm $path The file path to read the data from
    */
   public function initialize($path)
   {
      $this->setFilePath($path);
      $this->refreshFileData();
   }
  
   /**
    * Gets all the titles that are in the file header
    * return array() Returns an array of title names
    */
   public function getTitles()
   {
      return $this->theTitles;
   }
   
   /**
    * Gets all the pattern information
    * return array() Returns a multi-dim array that hass all the row and column information from the file
    */
   public function getAllPatterns()
   {
      return $this->theData;
   }

   /**
    * Refreshes the variables in this class with the information that is in the file
    */
   public function refreshFileData()
   {
      $this->theFile->readFileData();
      $tempArray = $this->theFile->getFileData();
      $this->theData = array();
      
      $this->theTitles = explode(',', array_shift($tempArray));
      
      foreach ($tempArray as $dataArray)
      {
         $data = explode(',', $dataArray);
         $data[0] = '<a href="' . $data[0] . $data[1] . '" >' . $data[0] . '</a>';
         if (count($data) == count($this->theTitles))
         {
            array_push($this->theData, $data);
         }
      }
   }
   
   /**
    * Sets a new path and file name to be read from
    */
   public function setFilePath($path)
   {
      $this->theFile->setFilePath($path);
   }
   
   /// Access to the file information
   private $theFile;
   
   /// The titles from the file header
   private $theTitles;
   
   /// The information within the file, excludes the file headers
   private $theData;

};

$pattern = new Patterns();
$pattern->initialize("Patterns/data/Pattern_Collection.csv");

