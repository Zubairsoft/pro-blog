<?php

namespace Domains\Supports\Traits\Http;

trait HttpRequest
{
    private function RegisterRequestRules($postRules=[],$patchOrPutRules=[],$deleteRules=[]):array
    {
        return match ($this->getMethod()) {
            'post', 'POST' => $postRules,
            'patch', 'PATCH','put','PUT' => $patchOrPutRules,
            'delete', 'DELETE' => $deleteRules,
            default => []
        }; 
    }

}