<?php

require_once 'models/Animal.php';

class AnimalController {
    public function index() {
        // Dohvaćanje svih životinja iz baze podataka
        $animals = Animal::all();
        
        // Prikazivanje stranice s podacima o životinjama
        return view('animals.index', ['animals' => $animals]);
    }
    

    public function show($id) {
        // Koristimo dobiveni id za pronalazak odgovarajuće životinje
        $animal = Animal::find($id);
        
        // Provjera postoji li životinja s tim ID-om
        if (!$animal) {
            // Ako ne postoji, možete prikazati poruku ili preusmjeriti na drugu stranicu
            echo "Životinja nije pronađena.";
            return;
        }

        // Prikazivanje stranice s detaljima o životinji
        require_once 'views/animal/show.php';
    }

    public function delete($id) {
        // Koristimo dobiveni id za brisanje odgovarajuće životinje
        $success = Animal::delete($id);

        if ($success) {
            echo "Životinja uspješno izbrisana.";
        } else {
            echo "Greška pri brisanju životinje.";
        }
    }
}

?>

