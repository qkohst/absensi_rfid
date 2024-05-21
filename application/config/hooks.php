<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['display_override'][] = array(
        'class' => '',
        'function' => 'log_queries',
        'filename' => 'log_queries.php',
        'filepath' => 'hooks'
);
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

