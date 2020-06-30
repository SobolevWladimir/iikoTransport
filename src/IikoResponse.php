<?php

namespace IikoTransport;

class IikoResponse
{
    protected $iikoRequest;
    protected $body;
    protected $httpStatusCode;
    protected $headers;
    protected $hasError = false;


    public function __construct(IikoRequest $request,string  $body, int $httpStatusCode, $headers)
    {
        $this->iikoRequest = $request;
        $this->body = $body;
        $this->httpStatusCode = $httpStatusCode;
        $this->headers = $headers;

        $this->checkError();
    }

    protected function checkError()
    {
        if ($this->httpStatusCode != 200) {
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

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}
