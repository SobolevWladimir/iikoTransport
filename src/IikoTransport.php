<?php 
namespace IikoTransport; 


use IikoTransport\Client; 
use IikoTransport\OrganizationManager; 
use IikoTransport\TerminalGroupsManager; 
use IikoTransport\AddressesManager; 

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

  /**
   * @var TerminalGroupsManager; 
   */
  private $terminalGroupsManager; 

  /**
   * @var AddressesManager; 
   */
  private  $addressesManager; 

  public function __construct(string $api_key) {
    $this->client= new Client($api_key); 
  }

  public function getOrganizationManager():OrganizationManager {
    if (!$this->organizationManager){
      $this->organizationManager = new OrganizationManager($this->client); 
    }
    return $this->organizationManager; 
  }
  public function getTerminalGroupsManager():TerminalGroupsManager{
    if (!$this->terminalGroupsManager){
      $this->terminalGroupsManager = new TerminalGroupsManager($this->client); 
    }
    return $this->terminalGroupsManager; 
  }
  public function getAddressesManager(){
    if (!$this->addressesManager){
      $this->addressesManager = new AddressesManager($this->client); 
    }
    return $this->addressesManager; 
  }
}
