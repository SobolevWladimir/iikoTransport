<?php 

use PHPUnit\Framework\TestCase;
use IikoTransport\Client; 
use IikoTransport\IikoRequest; 

class ClientTest extends TestCase 
{
  public function testRequest() {
  
    $file=file_get_contents("./tests/apikey.txt");
   $cliet = new Client("sdfsdfsdfs"); 
var_dump($file); 
   //$request  = new IikoRequest('GET', );  
   $this->assertTrue(true); 

  }
}
