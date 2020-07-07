<?php 

namespace IikoTransport; 


class TerminalGroupsManager
{
  const URL_INFO= "https://api-ru.iiko.services/api/1/terminal_groups"; 
  const URL_IS_ALIVE= "https://api-ru.iiko.services/api/1/terminal_groups"; 

  /**
   * @var Client
   */
  private $client;  


  public function __construct(Client $client) {
    $this->client=$client;
  }

  /**
   * Method that returns information on groups of delivery terminals.
   * @see https://api-ru.iiko.services/#operation/TerminalGroups_GetTerminalGroups
   *
   * @param array  $organizationIds  Organizations IDs for which information is requested.
   * @param bool $includeDisabled Attribute that shows that response contains disabled terminal groups. 
   */

  public function getInfo(array $organizationIds, bool $includeDisabled=false) {
    $data =[
      'organizationIds'=>$organizationIds, 
      'includeDisabled'=>$includeDisabled, 
    ]; 
    $request = new IikoRequest(self::URL_INFO, $data); 
    return $this->client->request($request); 
  }


  /**
   * Method that returns information on availability of group of terminals.
   * @see https://api-ru.iiko.services/#operation/TerminalGroups_IsTerminalGroupAlive 
   *
   * @param array $organizationIds  Organizations IDs.
   * @param array $terminalGroupIds List of terminal groups IDs.
   */

  public function getIsAlive(array $organizationIds,array $terminalGroupIds){
    $data = [
      'organizationIds'=>$organizationIds, 
      'terminalGroupIds' =>$terminalGroupIds
    ]; 
    $request = new IikoRequest(self::URL_IS_ALIVE, $data); 
    return $this->client->request($request); 
  }
  

}
