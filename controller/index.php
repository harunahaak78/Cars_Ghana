<?php

   require "function.php";

   

    $uri = $_SERVER['REQUEST_URI'];

    if($uri === '/Cars_Ghana/'){
        require 'controller/index.php';
    }
    else if($uri === '/Cars_Ghana/product'){
        require 'controller/product.php';
    }
    else if($uri === '/Cars_Ghana/viewproduct'){
        require "controller/viewproduct.php";
    }  
    else if($uri === '/signup'){
        require "controller/signup.php";
    }
    else if($uri === '/login'){
        require "controller/login.php";
    }