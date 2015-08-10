<?php 
class Log
{
	private $filename;
	private $handle;
	
	public function __construct($prefix = "log"){
		$this->setFileName();
		$this->handle = fopen($this->filename, 'a');
	}
	
	public function logInfo($message){
	    return $this->logMessage("INFO", $message);
	}
	
	public function logError($message){
	    return $this->logMessage("ERROR", $message);
	}
	
	public function logMessage($logLevel, $message)
	{
	    fwrite($this->handle, PHP_EOL . date("Y-m-d H:i:s ") . "[{$logLevel}] $message" . PHP_EOL);
	}
	
	private function __destruct(){
		if (isset($handle)) {
			fclose($this->handle);
		}
	}

	protected function setFileName($prefix)
    {
        $this->filename = htmlspecialchars(strip_tags(trim($prefix)));
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

}
 ?>