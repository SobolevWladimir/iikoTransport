<?php

namespace IikoTransport;

class IikoResponse
{
    protected $iikoRequest;
    protected $body;
    protected $statusCode;
    protected $headers;
    protected $hasError = false;


    public function __construct(IikoRequest $request,string  $body, int $statusCode, $headers)
    {
        $this->iikoRequest = $request;
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;

        $this->checkError();
    }

    protected function checkError()
    {
        if ($this->statusCode != 200) {
            $this->hasError = true;
        }
    }

    public function hasError()
    {
        return $this->hasError;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getStatusCode():int
    {
        return $this->statusCode;
    }
    /**
     * return json parse to array 
     */
    public function toArray():array{
      return json_decode($this->getBody(), true); 
    }
}
