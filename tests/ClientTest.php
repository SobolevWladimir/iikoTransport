<?php 

use PHPUnit\Framework\TestCase;
use IikoTransport\Client; 
use IikoTransport\IikoRequest; 

class ClientTest extends TestCase 
{
  public function testRequest() {
  
    $key=file_get_contents("./tests/apikey.txt");
   $cliet = new Client(str_replace("\n", '', $key)); 
   $request  = new IikoRequest('GET','localhost:80');  
   $cliet->request($request);
   $this->assertTrue(true); 

  }
}
