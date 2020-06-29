<?php 

use PHPUnit\Framework\TestCase;
use IikoTransport\Client; 

class ClientTest extends TestCase 
{
  public function testRequest() {
   $cliet = new Client("sdfsdfsdfs"); 
   $this->assertTrue(true); 

  }
}
