<?php
namespace IikoTransport;



class IikoRequest
{
    protected $uri;
    /**
     * @var array
     */
    protected $params = [];
    /**
     * @var array
     */
    protected $headers = [];
    /**
     * @var string
     */
    protected $url;
  
    /**
     * @var array
     */
    protected $json=[]; 

    /**
     * IikoRequest constructor.
     * @param $method
     * @param $endPoint
     */
    public function __construct(string $uri, array $json)
    {
        $this->uri = $uri;
        $this->json = $json; 
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        $url = $this->uri;
        // if ($this->method == strtoupper('GET')) {
        //     if ($this->params) {
        //         $url .= '?' . http_build_query($this->params);
        //     }
        // }
        return $url;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }


    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    
    /**
     * Get json.
     *
     * @return array.
     */
    public function getJson():array 
    {
        return $this->json;
    }
    
    /**
     * Set json.
     *
     * @param json the value to set.
     */
    public function setJson(array $json)
    {
        $this->json = $json;
    }
}
