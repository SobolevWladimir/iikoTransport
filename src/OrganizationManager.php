<?php

namespace IikoTransport; 


use IikoTransport\Client; 
use IikoTransport\IikoRequest; 
use IikoTransport\IikoResponse; 

class OrganizationManager 
{

  const URL_LIST= "https://api-ru.iiko.services/api/1/organizations"; 
  /**
   * @var Client
   */
 private $client;  


  public function __construct(Client $client) {
    $this->client=$client;
  }
    /**
     * Returns organizations available to api-login user. 
     * @param $additinInfo  bool //  A sign whether additional information about the organization should be returned (country, restaurantAddress, etc.), or only minimal information should be returned (id and name).
     * @param $includeDisabled  bool // Attribute that shows that response contains disabled organizations.
     * @param $organizationIds array // Organizations IDs for which information is requested. By default - all organizations available to api-login user.
     */
  public function getList(bool $additionInfo=false, bool $includeDisabled = false, array $organizationIds=null ){
    $data = [
      'returnAdditionalInfo'=>$additionInfo, 
      'includeDisabled'=>$includeDisabled, 
      'organizationIds' =>$organizationIds, 
    ]; 
    $request = new IikoRequest(self::URL_LIST, $data); 
    return $this->client->request($request); 

  }

}
