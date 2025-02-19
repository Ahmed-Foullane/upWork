<?php

namespace app\utils;


class Utils {
  
  public static function sanitize($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
  }
  
  public static function redirect($page) {
    header('location: /' . $page);
  }


 
  public static function setFlash($name, $message) {
    if (!empty($_SESSION[$name])) {
      unset($_SESSION[$name]);
    }
    $_SESSION[$name] = $message;
  }
  
  public static function displayFlash($name, $type) {
    if (isset($_SESSION[$name])) {
      echo "<div class='alert text-center p-4 mb-4 text-sm text-$type-800 rounded-lg bg-$type-50 dark:bg-gray-800 dark:text-$type-400' role='alert'>
           <span class='font-medium'>$_SESSION[$name]</span>
       </div>";
       unset($_SESSION[$name]);
    }
  }

  public static function isLoggedIn() {
    if (isset($_SESSION['user'])) {
      return true;
    } else {
      return false;
    }
  }

  

}