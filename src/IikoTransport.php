<?php 
namespace IikoTransport; 


use IikoTransport\Client; 
use IikoTransport\OrganizationManager; 

class IikoTransport 
{

  /**
   * @var Client
   */
  private $client; 
  /**
   * @var OrganizationManager
   */
  private $organizationManager; 

  public function __construct(string $api_key) {
    $this->client= new Client($api_key); 
  }

  public function getOrganizationManager():OrganizationManager {
    if (!$this->organizationManager){
      $this->organizationManager = new OrganizationManager($this->client); 
    }
    return $this->organizationManager; 
  }
}
