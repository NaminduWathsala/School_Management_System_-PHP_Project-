<?php
session_start();

require "connection.php";

if (isset($_POST["e"])) {

    $email = $_POST["e"];

    $userrs = Database::search("SELECT * FROM `academic_officer` WHERE `email`='" . $email . "'");
    $num = $userrs->num_rows;

    if ($num == 1) {
        $row = $userrs->fetch_assoc();
        $us = $row["status_id"];

        if ($us == "1") {

            Database::iud("UPDATE `academic_officer` SET `status_id`='2' WHERE `email`='" . $email . "'");

            echo "success1";
        } else {

            Database::iud("UPDATE `academic_officer` SET `status_id`='1' WHERE `email`='" . $email . "'");

            echo "success2";
        }
    }
} else {
?>
    <script>
        window.location = "manageAcademicOfficer.php";
    </script>
<?php
}
