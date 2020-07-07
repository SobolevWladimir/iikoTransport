<?php 

use PHPUnit\Framework\TestCase;
use IikoTransport\OrganizationManager; 
use IikoTransport\Client; 

class OrganizationManagerTest extends TestCase 
{
  public function testRequest() {
    $key=file_get_contents("./tests/apikey.txt");
    $client = new Client(str_replace("\n", '', $key)); 
    $manager = new OrganizationManager($client); 
    $response = $manager->getList();
    $this->assertTrue($response->getStatusCode()==200); 
  }
}
