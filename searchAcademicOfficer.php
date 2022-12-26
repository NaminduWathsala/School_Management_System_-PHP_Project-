<?php

session_start();

require "connection.php";

if (isset($_GET["s"])) {

    $text = $_GET["s"];

    if (!empty($text)) {

        $userrs = Database::search("SELECT * FROM `academic_officer` WHERE `fname` LIKE '%" . $text . "%' OR 
        `full_name` LIKE '%" . $text . "%' OR `email` LIKE '%" . $text . "%' OR `nic` LIKE '%" . $text . "%'");
        $num = $userrs->num_rows;

        $row = $userrs->fetch_assoc();
        $_SESSION["aofficers"] = $row;

        echo "success";
    } else {
        unset($_SESSION["aofficers"]);
        echo "Please add name to search";
    }
}
