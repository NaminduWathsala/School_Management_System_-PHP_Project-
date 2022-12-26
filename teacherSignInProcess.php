<?php
session_start();

require "connection.php";

$e = $_POST["email"];
$p = $_POST["password"];
$r = $_POST["remember"];

$rs = Database::search("SELECT * FROM `teacher` WHERE `email` = '" . $e . "' AND `password` = '" . $p . "';");
$n = $rs->num_rows;

if ($n == 1) {
    $d = $rs->fetch_assoc();

    if ($d["status_id"] == 1) {
        $_SESSION["t"] = $d;
        echo "Success";

        if ($r == "true") {
            setcookie("e", $e, time() + (60 * 60 * 24 * 365));
            setcookie("p", $p, time() + (60 * 60 * 24 * 365));
        } else {
            setcookie("e", "", -1);
            setcookie("p", "", -1);
        }
    } else {
        echo "VCCode";
    }
} else {
    echo "Invalide details";
}
