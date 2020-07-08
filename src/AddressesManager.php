<?php 

namespace IikoTransport; 


class AddressesManager
{
  const URL_REGION= "https://api-ru.iiko.services/api/1/regions"; 
  const URL_CITY= "https://api-ru.iiko.services/api/1/cities"; 
  const URL_STREET_BY_CITY= "https://api-ru.iiko.services/api/1/streets/by_city"; 

  /**
   * @var Client
   */
  private $client;  


  public function __construct(Client $client) {
    $this->client=$client;
  }

  /**
   * Returns region details.
   * @see https://api-ru.iiko.services/#operation/Addresses_GetRegions
   *
   * @param array organizationIds Array of strings <uuid> IDs of organizations that require data return. 
   */
  public function getRegionDetails(array $organizationIds){
    $data =[
      'organizationIds'=>$organizationIds, 
    ]; 
    $request = new IikoRequest(self::URL_REGION, $data); 
    return $this->client->request($request); 
  }


  /**
   * Returns city details.
   * @see https://api-ru.iiko.services/#operation/Addresses_GetCities 
   * 
   * @param array organizationIds Array of strings <uuid> IDs of organizations that require data return. 
   */
  public function getCityDetails(array $organizationIds){
    $data =[
      'organizationIds'=>$organizationIds, 
    ]; 
    $request = new IikoRequest(self::URL_CITY, $data); 
    return $this->client->request($request); 
  }

  /** 
   * Returns street details by city ID. 
   * @see https://api-ru.iiko.services/#operation/Addresses_GetStreetsByCity 
   * 
   * @param string $organizationId  uuid Organization ID details of which have to be returned.
   * @param string @cityId  uuid city id  
   */
  public function getStreetsByCity(string $organizationId, string $cityId){
    $data =[
      'organizationId'=>$organizationId, 
      'cityId'=>$cityId
    ]; 
    $request = new IikoRequest(self::URL_STREET_BY_CITY, $data); 
    return $this->client->request($request); 
  }



  

}
