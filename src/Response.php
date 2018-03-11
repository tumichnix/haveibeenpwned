<?php

namespace Tumichnix\HaveIBeenPwned;

class Response
{
    protected $response;

    public function __construct(\GuzzleHttp\Psr7\Response $response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getStatusCode()
    {
        return $this->getResponse()->getStatusCode();
    }

    public function getStatusText()
    {
        return $this->getResponse()->getReasonPhrase();
    }

    public function getContentType()
    {
        if ($this->getResponse()->hasHeader('Content-Type')) {
            return strtolower($this->getResponse()->getHeader('Content-Type')[0]);
        } else {
            return null;
        }
    }

    public function getContent()
    {
        $contentType = $this->getContentType();
        $content = $this->getResponse()->getBody()->__toString();

        if (substr($contentType, 0, strlen('application/json')) === 'application/json') {
            return json_decode($content, true);
        } else {
            return $content;
        }
    }
}
