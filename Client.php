<?php
namespace iikoTransport; 

class Client 
{
  protected $token; 
  protected $apiKey; 


  public function __construct(string $apiKey) {
    $this->apiKey = $apiKey; 
  }

  public function request(IikoRequest $request) {

  }

    /**
     * Get token.
     *
     * @return token.
     */
    public function getToken()
    {
        return $this->token;
    }
    
    /**
     * Set token.
     *
     * @param token the value to set.
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }
    
    /**
     * Get apiKey.
     *
     * @return apiKey.
     */
    public function getApiKey():string 
    {
        return $this->apiKey;
    }
    
    /**
     * Set apiKey.
     *
     * @param apiKey the value to set.
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
} 
