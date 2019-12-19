<?php
if ( !function_exists('is_id')) {
    function is_id($id)
    {
        $p = '/^[1-9]\d*$/';
        return preg_match($p, $id);
    }
}

if ( !function_exists('makeResult') ) {
    
    function makeResult($msg, $data = []) {
        return ['msg' => $msg, 'data' => $data];
    }
    
}