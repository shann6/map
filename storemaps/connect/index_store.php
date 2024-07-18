<?php

session_start();
if (isset($_SESSION["admin"])) {
  include __DIR__ . '/store_admin.php';
} else {
  include __DIR__ . '/store_noadmin.php';
}
