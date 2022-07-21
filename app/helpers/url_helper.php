<?php

function redirect($page){
    header('location: ' . BASEURL . $page);
 }