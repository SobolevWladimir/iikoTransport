<?php
namespace IikoTransport; 

use IikoTransport\Exception\AuthException; 


class Client 
{
  const BASE_IIKO_API_URL = 'https://api-ru.iiko.services/api/1/';
  const BASE_URL_AUTH = 'https://api-ru.iiko.services/api/1/access_token';

  protected $token; 
  protected $apiKey; 
  protected $httpClient; 



  public function __construct(string $apiKey) {
    $this->apiKey = $apiKey; 
    $httpClientOptions = array(
            'base_uri' => self::BASE_IIKO_API_URL,
            'allow_redirects' => false,
            'timeout' => 20,
            'http_errors' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        );
        $this->httpClient = new \GuzzleHttp\Client($httpClientOptions);
  }

  public function request(IikoRequest $request):IikoResponse {
    $token = $this->getToken(); 
    $response = $this->httpClient->request("POST",$request->getUri(), [
      'headers'=>[
        'Authorization'=>'Bearer '.$token, 
      ],  
      'json'=>$request->getJson()
    ]
    ); 
    return  new IikoResponse($request, $response->getBody(),$response->getStatusCode(), $response->getHeaders()) ; 
  }

    /**
     * Get token.
     *
     * @return token.
     */
    public function getToken()
    {
      if (!$this->token) {
        $response = $this->httpClient->request("POST", self::BASE_URL_AUTH,[
          'json'=>[
            'apiLogin'=>$this->apiKey
          ] 
        ]); 
        if ($response->getStatusCode()!=200){
           throw new  AuthException($response->getBody()); 
        }; 
        $result = json_decode((string) $response->getBody(), true);  
        $this->setToken($result['token']); 
      }
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
