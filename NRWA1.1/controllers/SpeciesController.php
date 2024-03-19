<?php
class SpeciesController {
    public function index() {
        // Spremamo sve vrste u varijablu
        $species = Species::all();
        require_once('views/species/index.php');
    }

    public function show() {
        // Očekujemo URL oblika ?controller=species&action=show&id=x
        // Ako nemamo id, preusmjeravamo na stranicu pogreške jer nam treba id za pronalaženje u bazi podataka
        if (!isset($_GET['id']))
            return call('pages', 'error');

        // Koristimo dobiveni id za pronalazak odgovarajuće vrste
        $species = Species::find($_GET['id']);
        require_once('views/species/show.php');
    }

    public function delete() {
        // Očekujemo URL oblika ?controller=species&action=delete&id=x
        // Ako nemamo id, preusmjeravamo na stranicu pogreške jer nam treba id za pronalaženje u bazi podataka
        if (!isset($_GET['id']))
            return call('pages', 'error');

        // Koristimo dobiveni id za brisanje odgovarajuće vrste
        $species = Species::delete($_GET['id']);
        require_once('views/species/delete.php');
    }
}
?>
