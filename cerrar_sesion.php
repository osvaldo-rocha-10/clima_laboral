<?php

    session_start();

    // remove all session variables
    //session_unset();

    // destroy the session
    //session_destroy(); 
    $_SESSION['work'] = null;
        $_SESSION['area'] = null;
							$_SESSION['comprobacion'] = null;
							$_SESSION['empleado'] = null;
    header("Location: index.html");
    
?>