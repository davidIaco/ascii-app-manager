<?php

namespace ASCII\Http;

class Response
{

	private $status, $reason, $header, $body;
	
	public function __construct()
	{
		$this->status = 200;
		$this->reason = "OK";
		$this->header = [];
		$this->body = "";
	}
	
	public function setStatus ( int $status, string $reason)
	{
		$this->status = $status;
		$this->reason = $reason;
	}
	
	public function setBody ( string $body)
	{
		$this->body = $body;
	}
	
	public function addHeader ( string $name, string $value)
	{
		$this->header[$name] = $value;
	}
	
	public function  getStatus () : string
	{
		return "HTTP/1.1" . $this->status . "" . $this->reason;
	}
	
	public  function getBody (): string
	{
		return $this->body;
	}
	
	public function getHeader () : array
	{
		return $this->header;
	}
}
