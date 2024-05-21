<?php

function log_queries() 
{
    $CI =& get_instance();
    $times = $CI->db->query_times;
    foreach ($CI->db->queries as $key=>$query) {
        echo "Query: ". $query." | ".$times[$key] . "<br>";
    }
 
    $CI->output->_display();
}

?>