<?php

function base_url($uri = null) {
    require('application/config/URLHelper.php');
    return $config['base_url'] . $uri;
}

function base_assets() {
    return '/Framework/assets/';
}

function redirect($uri = null) {
    header("location:" . base_url($uri));
}
