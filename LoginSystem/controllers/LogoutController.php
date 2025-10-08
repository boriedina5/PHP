<?php
session_start();
session_unset();//változó megmarad, de üres lesz
session_destroy();//teljesen üres session
header("Location:../index.php?status=LoggedOut");