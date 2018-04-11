<?php

include_once 'Patterns/PHP/FileData/File.php';

class WriteFile extends File
{
   /**
    * Constructor
    */
   public function WriteFile()
   {
      $this->Initialize(Commands::$WRITE);
   }
   
   /**
    * Creates a new file in the path location
    */
   public function writeDataToFile($data)
   {
      $this->OpenFile();
      
      foreach ($data as $string)
      {
         fwrite($this->theFile, $string);
      }
      
      $this->CloseFile();
   }
   
   /**
    * @copydoc File::setFilePath($path)
    */   
   public function setFilePath($path)
   {
      $this->theFilePath = $path;
   }
   
   
};

