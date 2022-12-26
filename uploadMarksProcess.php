<?php
session_start();

require "connection.php";

if (isset($_POST["e"])) {

    $eid = $_POST["e"];

    $userrs = Database::search("SELECT * FROM `exam_results` WHERE `id` = '" . $eid . "'");
    $num = $userrs->num_rows;

    if ($num == 1) {
        $row = $userrs->fetch_assoc();
        $us = $row["status_id"];

        if ($us == "1") {

            Database::iud("UPDATE `exam_results` SET `status_id`='2' WHERE `id`='" . $eid . "'");

            echo "success1";
        } else {

            Database::iud("UPDATE `exam_results` SET `status_id`='1' WHERE `id`='" . $eid . "'");

            echo "success2";
        }
    }
} else {
?>
    <script>
        window.location = "examRelease.php";
    </script>
<?php
}
