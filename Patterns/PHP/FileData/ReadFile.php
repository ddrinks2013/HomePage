<?php

include_once 'Patterns/PHP/FileData/File.php';

class ReadFile extends File
{
   /**
    * Constructor
    */
   public function ReadFile()
   {
      $this->Initialize(Commands::$READ);
   }

   /**
    * Gets the current data from the file in the file path
    * returns array Returns all the data in the file
    */
   public function readFileData()
   {
      $this->theFileData = array();
      
      // Open file
      $this->OpenFile();

      // Read file until the end
      while (!feof($this->theFile))
      {
         $dataRead = fgets($this->theFile);
         array_push($this->theFileData, substr($dataRead, 0, strlen($dataRead) - 1));
      }
      
      // Close file
      $this->CloseFile();
   }
   
   public function getFileData()
   {
      return $this->theFileData;
   }

   /**
    * @copydoc File::setFilePath($path)
    */   
   public function setFilePath($path)
   {
      $this->theFilePath = $path;
   }
   
   /**
    * The information from the file.
    */
   private $theFileData;
   
};

