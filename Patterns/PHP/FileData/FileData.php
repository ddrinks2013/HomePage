<?php

class Files
{
   /**
    * Constructor
    */
   public function Files($fileLocation)
   {
      $this->theFileLocation = $fileLocation;
      $thid->theFile = null;
      $this->theFileData = array();
   }
   
   /**
    * Set a new file location.
    */
   public function setFileLocation($fileLocation)
   {
      $this->theFileLocation = $fileLocation;   
   }
   
   /**
    * Get the current file location.
    */
   public function getFileLocation()
   {
      return $this->theFileLocation;
   }

   /**
    * Opens a file and gathers all the information from the file, then closes the file
    */
   public function readFile()
   {
      $this->openFile("r");

      $counter = 0;
      while (!feof($this->theFile))
      {
         $this->theFileData[$counter++] = fgets($this->theFile);
      }
      $this->closeFile();
      $this->theFile = null;
   }
   
   /**
    * 
    */
   public function getFileData()
   {
      return $this->theFileData;
   }
   
   /**
    * The total number of lines that were read in the file
    */
   public function getNumberOfLinesInFile()
   {
      return count($this->theFileData);
   }

   /**
    * Opens a file for either reading or writing
    */
   private function openFile($readWrite)
   {
      $this->theFile = fopen($this->theFileLocation, $readWrite) or die("File not open");
   }

   /**
    * Closes an open file in the system
    */
   private function closeFile()
   {
      fclose($this->theFile);
   }
   
   private $theFileLocation;
   private $theFile;
   private $theFileData;
};
