<?php

// Fitur Sesion, Dimana User Yang Ingin Logout Dari System Diharuskan Login Terlebih Dahulu
// URL Tidak Bisa Dirubah Oleh User Yang Ingin Masuk Kedalam System Tanpa Login 
// Jika User Memodifikasi URL Maka User Akan Langsung Ditolak Oleh System Dan Akan Langsung Diarahkan Ke Login Page

session_start();

$_SESSION = [];
session_unset();
session_destroy();
header("location:login.php");
exit();
