<?php

namespace Andersontf\SimpleRoute\Core\Requests;


class Request implements RequestInterface
{

    public $request;

    public $raw;

    public function __construct()
    {
        $this->raw = json_decode(file_get_contents("php://input"), true) ?: [];
        $this->request = array_merge($_REQUEST, $this->raw);
    }

    public function input($key = false)
    {
        if ($key) {
            return isset($this->request[$key])
                ? $this->request[$key]
                : false;
        };

        return $this->request;
    }

    public function has($key): bool
    {
        if (!isset($this->request[$key])) {
            return false;
        };

        return true;
    }

    public function file(string $key = '')
    {
    }

    public function hasFile(string $key): bool
    {
        // Not implemented
        return false;
    }

    public function server(): array
    {
        // Not implemented
        return [];
    }

    public function baseUri(): string
    {
        // Not implemented
        return "";
    }

    public function path(): string
    {
        // Not implemented
        return "";
    }

    public function method(): string
    {
        // Not implemented
        return "";
    }

    public function accepts(array $accepts): bool
    {
        // Not implemented
        return false;
    }

    public function ip(): string
    {
        // Not implemented
        return "";
    }
   
}

   
