<?php

class Logout extends Controller
{
    public function index()
    {
        session_destroy();
        session_start();
        Flasher::setFlash('Logout', 'berhasil', 'success');
        redirect('/login');
    }
}
