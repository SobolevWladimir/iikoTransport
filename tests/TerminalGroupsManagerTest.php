<?php 

use PHPUnit\Framework\TestCase;
use IikoTransport\IikoTransport; 
use IikoTransport\Client; 

class TerminalGroupsManagerTest extends TestCase 
{

  // public function __construct() {
  //   // $key=file_get_contents("./tests/apikey.txt");
  //   // $client =new Client(str_replace("\n", '', $key));
  //   // $this->manager = new TerminalGroupsManager($client);
  //   // $this->organizationManager = new OrganizationManager($client);
  // }
  private $transport; 
  private $organizationIds; 

  protected function getIikoTransport(){
    if (!$this->transport){
      $key=file_get_contents("./tests/apikey.txt");
      $key =str_replace("\n", '', $key); 
      $this->transport = new IikoTransport($key); 
    }
    return $this->transport; 

  }

   public function testGetInfo() {
     $organization =$this->getOrganizationIds();
     $response = $this->getIikoTransport()->getTerminalGroupsManager()->getInfo($organization);
     $this->assertTrue($response->getStatusCode()==200);
   }

  private function getOrganizationIds(){
    if (!$this->organizationIds){
      $result = []; 
      $response = $this->getIikoTransport()->getOrganizationManager()->getList()->toArray(); 
      foreach ($response['organizations'] as $value) {
        $result[] = $value['id'];    
      }
      $this->organizationIds = $result;
    }

    return $this->organizationIds; 
  }



  
  
}
