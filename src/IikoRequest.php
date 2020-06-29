<?php
namespace IikoTransport;



class IikoRequest
{
    protected $method;
    protected $uri;
    /**
     * @var array
     */
    protected $params = [];
    /**
     * @var array
     */
    protected $headers = [];
    protected $url;

    /**
     * IikoRequest constructor.
     * @param $method
     * @param $endPoint
     */
    public function __construct($method, $uri, array $params = [], array $headers = [])
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->params = $params;
        $this->headers = $headers;
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
        if ($this->method == strtoupper('GET')) {
            if ($this->params) {
                $url .= '?' . http_build_query($this->params);
            }
        }
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
    public function getParams()
    {
        if(isset($this->headers['Content-Type']) AND strtolower($this->headers['Content-Type']) == 'application/json') {
            return json_encode($this->params, JSON_UNESCAPED_UNICODE);
        }else {
            return http_build_query($this->params);
        }

        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams($params)
    {
        $this->params = $params;
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

}
