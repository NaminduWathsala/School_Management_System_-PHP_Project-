<?php
session_start();

if (isset($_SESSION["u"])) {
    $_SESSION["u"] = null;
    session_destroy();

    setcookie("e", "", -1);
    setcookie("p", "", -1);
?>
    <script>
        window.location = "index.php";
    </script>

<?php
}
if (isset($_SESSION["t"])) {
    $_SESSION["t"] = null;
    session_destroy();

    setcookie("e", "", -1);
    setcookie("p", "", -1);
?>
    <script>
        window.location = "index.php";
    </script>

<?php
}
if (isset($_SESSION["ao"])) {
    $_SESSION["ao"] = null;
    session_destroy();

    setcookie("e", "", -1);
    setcookie("p", "", -1);
?>
    <script>
        window.location = "index.php";
    </script>

<?php
}
if (isset($_SESSION["s"])) {
    $_SESSION["s"] = null;
    session_destroy();

    setcookie("e", "", -1);
    setcookie("p", "", -1);
?>
    <script>
        window.location = "index.php";
    </script>

<?php
}

?>