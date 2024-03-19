<?php

function call($controller, $action) {
    // Učitava kontroler samo jednom
    require_once('controllers/' . $controller . '.php');

    // Provjerava koji kontroler treba pozvati i izvršava odgovarajuću akciju
    switch ($controller) {
        case 'AnimalController':
            // Učitava model za životinje
            require_once('models/Animal.php');
            break;
        case 'SpeciesController':
            // Učitava model za vrste
            require_once('models/Species.php');
            break;
        case 'ZooController':
            // Učitava model za zoološke vrtove
            require_once('models/Zoo.php');
            break;
    }

    // Stvara instancu kontrolera
    $controllerInstance = new $controller();

    // Provjerava postoji li tražena akcija u kontroleru
    if (method_exists($controllerInstance, $action)) {
        // Izvršava traženu akciju
        $controllerInstance->{$action}();
    } else {
        // Poziva grešku ako tražena akcija ne postoji
        call('AnimalController', 'error'); 
    }
}

// Definira popis kontrolera i njihovih akcija
$controllers = array(
    'AnimalController' => ['index', 'show', 'delete'],
    'SpeciesController' => ['index', 'show', 'delete'],
    'ZooController' => ['index', 'show', 'delete']
);

// Provjerava postoji li traženi kontroler i akcija
if (array_key_exists($controller, $controllers) && in_array($action, $controllers[$controller])) {
    // Poziva traženi kontroler i akciju
    call($controller, $action);
} else {
    // Poziva grešku ako traženi kontroler ili akcija ne postoje
    call('AnimalController', 'error'); 
}

?>
