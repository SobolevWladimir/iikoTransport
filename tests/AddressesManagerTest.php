<?php 

use PHPUnit\Framework\TestCase;
use IikoTransport\IikoTransport; 
use IikoTransport\Client; 

class AddressesManagerTest extends TestCase 
{

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
  
  public function testGetRegionDetails() {
    $organization =$this->getOrganizationIds();
    $response = $this->getIikoTransport()->getAddressesManager()->getRegionDetails($organization);
    $this->assertTrue($response->getStatusCode()==200);
  }
  public function testCityDetails() {
    $organization =$this->getOrganizationIds();
    $response = $this->getIikoTransport()->getAddressesManager()->getCityDetails($organization);
    $this->assertTrue($response->getStatusCode()==200);
  }
  public function testStreetsByCity() {
    $organization =$this->getOrganizationIds();
    $response = $this->getIikoTransport()->getAddressesManager()->getStreetsByCity($organization[0], "00000000-0000-0000-0000-000000000000");
    $this->assertTrue($response->getStatusCode()==200);
  }
}
