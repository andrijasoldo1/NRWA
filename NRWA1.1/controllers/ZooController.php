<?php
class ZooController {
    public function index() {
        // Spremamo sve zoološke vrtove u varijablu
        $zoos = Zoo::all();
        require_once('views/zoo/index.php');
    }

    public function show() {
        // Očekujemo URL oblika ?controller=zoo&action=show&id=x
        // Ako nemamo id, preusmjeravamo na stranicu pogreške jer nam treba id za pronalaženje u bazi podataka
        if (!isset($_GET['id']))
            return call('pages', 'error');

        // Koristimo dobiveni id za pronalazak odgovarajućeg zoološkog vrta
        $zoo = Zoo::find($_GET['id']);
        require_once('views/zoo/show.php');
    }

    public function delete() {
        // Očekujemo URL oblika ?controller=zoo&action=delete&id=x
        // Ako nemamo id, preusmjeravamo na stranicu pogreške jer nam treba id za pronalaženje u bazi podataka
        if (!isset($_GET['id']))
            return call('pages', 'error');

        // Koristimo dobiveni id za brisanje odgovarajućeg zoološkog vrta
        $zoo = Zoo::delete($_GET['id']);
        require_once('views/zoo/delete.php');
    }
}
?>
