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

if ( !function_exists('formatWords') ) {
    
    function formatWords($words)
    {
        if ( $words > 10000 ) {
            return round($words/10000, 2).'万';
        }
        return $words;
    }
    
}

if ( !function_exists('formatState') ) {
    
    function formatState($state) {
        
        if ( $state == 'writing' ) {
            return '连载中';
        } elseif( $state == 'finish' ) {
            return '已完结';
        }
        
    }
}
