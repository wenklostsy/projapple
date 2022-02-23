<?php
if (!isset($_SESSION['logado'][2])) {
    header('location: ../public/index.php');
}
