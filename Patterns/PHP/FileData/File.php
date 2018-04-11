<?php

/**
 * The commands used when opening a file
 */
class Commands
{
   public static $READ = 'r';
   public static $WRITE = 'w';
   public static $APPEND = 'a';
};

/**
 * Abstract class for handling all file operations
 */
abstract class File
{
   /**
    * The initial setup of this class
    */

   protected function Initialize($command)
   {
      $this->theFile = null;
      $this->theCommand = $command;
      $this->theFilePath = null;
   }

   /**
    * Opens a file with the given file path and command flag.
    */

   public function OpenFile()
   {
      if ($this->theFile == null && $this->theFilePath != null)
      {
         $this->theFile = fopen($this->theFilePath, $this->theCommand);
      }
      
//      if (!is_open($this->theFile))
//      {
//         echo "File not open";
//      }
   }
   
   /**
    * Closes an open file and sets the file pointer to null
    */

   public function CloseFile()
   {
      if ($this->theFile != null)
      {
         fclose($this->theFile);
         $this->theFile = null;
      }
   }
   
   /**
    * Checks to see if a file path exists
    * returns bool True if the file path exists; false otherwise
    */

   public function fileExists()
   {
      return file_exists($this->theFilePath);
   }
   
   /**
    * Sets the file's location to the system
    * string $path The path and file name of the file to be read from
    */

   abstract public function setFilePath($path);


   /**
    * The open file pointer
    */

   protected $theFile;

   /**
    * The path to the file being used
    */

   protected $theFilePath;

   /**
    * The command for opening a file
    */

   private $theCommand;

};

