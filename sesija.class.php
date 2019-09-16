<?php

class Sesija {

    const KORISNIK = "korisnik";
    const TIP = "tip";
    const GRESKE = "greske";
    const SESSION_NAME = "prijava_sesija";

    static function kreirajSesiju() {
        session_name(self::SESSION_NAME);

        if (session_id() == "") {
            session_start();
        }
    }

    static function kreirajKorisnika($korisnik) {
        self::kreirajSesiju();
        $_SESSION[self::KORISNIK] = $korisnik;
    }

    static function infoNeka($korisnik, $tip, $greske) {
        self::kreirajSesiju();
        $_SESSION[self::KORISNIK] = $korisnik;
        $_SESSION[self::TIP] = $tip;
        $_SESSION[self::GRESKE] = $greske;
    }

    static function dajKorisnika() {
        self::kreirajSesiju();
        if (isset($_SESSION[self::KORISNIK])) {
            $korisnik = $_SESSION[self::KORISNIK];
        } else {
            return null;
        }
        return $korisnik;
    }

    static function obrisiSesiju() {
        session_name(self::SESSION_NAME);

        if (session_id() != "") {
            session_unset();
            session_destroy();
        }
    }

}