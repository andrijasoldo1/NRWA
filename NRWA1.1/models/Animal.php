<?php
class Animal {
    public $animal_id;
    public $name;
    public $species_id;
    public $zoo_id;

    public function __construct($animal_id, $name, $species_id, $zoo_id) {
        $this->animal_id = $animal_id;
        $this->name = $name;
        $this->species_id = $species_id;
        $this->zoo_id = $zoo_id;
    }

    public static function all() {
      $animals = [];
      $db = Db::getInstance();
      $query = $db->query('SELECT * FROM animals');
      foreach ($query->fetchAll() as $animal) {
          $animals[] = new Animal($animal['animal_id'], $animal['name'], $animal['species_id'], $animal['zoo_id']);
      }
      return $animals;
  }
  

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $query = $db->prepare('SELECT * FROM animals WHERE animal_id = :id');
        $query->execute(array('id' => $id));
        $animal = $query->fetch();

        return new Animal($animal['animal_id'], $animal['name'], $animal['species_id'], $animal['zoo_id']);
    }
}
?>
