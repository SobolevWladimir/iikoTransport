<?php 

use PHPUnit\Framework\TestCase;
use IikoTransport\Client; 
use IikoTransport\IikoRequest; 

class ClientTest extends TestCase 
{
  public function testRequest() {
  
    $key=file_get_contents("./tests/apikey.txt");
   $cliet = new Client(str_replace("\n", '', $key)); 
    $request  = new IikoRequest('https://api-ru.iiko.services/api/1/organizations', [
      'organizationIds'=>null, 
      'returnAdditionalInfo'=>false, 
      'includeDisabled'=>false, 
    ]);  
   $response = $cliet->request($request);
    var_dump($response->getBody()); 
   $this->assertTrue(true); 

  }
}
