<?php
class Logout extends Controller
{
    public function index()
    {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        echo "anda logout";
        header("Location: " . BASEURL . "/login");
    }
}
