<?php


// ----------------------------------
if (! function_exists('requireKey')) {
    function requireKey($requiredKeys, $attributes)
    {
        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $attributes)) {
                return '['.$key.'] is required';
            }
        }
        return TRUE;
    }
}

if (! function_exists('apiErrorNode')) {
    function apiErrorNode($code, $message, $more=NULL)
    {
        return [
            'success'=> FALSE,
            'errors' => [
                'code'            => $code,
                'message'         => $message,
                'more'            => $more
                ]
            ];
    }
}