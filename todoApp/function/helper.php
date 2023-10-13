<?php

if (!function_exists("pageTitle")) {
    function pageTitle()
    {
        $scriptName = $_SERVER["SCRIPT_NAME"];
        $stringToArray = explode("/", $scriptName);
        $sortedPathFile = end($stringToArray);
        $separated = explode(".", $sortedPathFile);
        $title = $separated[0];
        if ($title == "index") {
            $title = "Login";
        } else
            $title = ucfirst($title);
        return $title;
    }
}

function dd(...$arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}


if (!function_exists("checkRequest")) {
    function checkRequest($method)
    {
        if ($_SERVER["REQUEST_METHOD"] == $method)
            return true;
        else
            return false;
    }
}
if (!function_exists("sanitize")) {
    function sanitize($input)
    {
        return trim(htmlentities(htmlspecialchars($input)));
    }
}
if (!function_exists("requiredVal")) {
    function requiredVal($input)
    {
        if (empty($input))
            return true;
        else
            false;
    }
}
if (!function_exists("minVal")) {
    function minVal($input, $len)
    {
        if (strlen($input) < $len)
            return true;
        else
            false;
    }
}
if (!function_exists("maxVal")) {
    function maxVal($input, $len)
    {
        if (strlen($input) > $len)
            return true;
        else
            false;
    }
}
if (!function_exists("emailVal")) {
    function emailVal($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL))
            return true;
        else
            false;
    }
}


if (!function_exists("redirect")) {
    function redirect($path)
    {
        return header("location:$path");
    }
}

if (!function_exists("keySession")) {
    function keySession($key, $type = "danger")
    {
        if (isset($_SESSION[$key])) {
            echo "<div class='alert alert-$type'>";
            echo $_SESSION[$key];
            unset($_SESSION[$key]);
            echo "</div>";
        }
    }
}
if (!function_exists("keyAndValueSession")) {
    function keyAndValueSession($key, $value, $type = "danger")
    {
        if (isset($_SESSION[$key][$value])) {
            echo "<div class='alert alert-$type'>";
            echo $_SESSION[$key][$value];
            unset($_SESSION[$key][$value]);
            echo "</div>";
        }
    }
}