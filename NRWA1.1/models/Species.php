<?php
  class Species {
    public $id;
    public $naziv;

    public function __construct($id, $naziv) {
      $this->id      = $id;
      $this->naziv  = $naziv;
    }

    public static function all() {
      $lista = [];
      $db = Db::getInstance();
      $upit = $db->query('SELECT * FROM species');


      foreach($upit->fetchAll() as $post) {
        $lista[] = new Species($post['id'], $post['naziv']);
      }

      return $lista;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $upit = $db->prepare('SELECT * FROM species WHERE id = :id');
      $upit->execute(array('id' => $id));
      $post = $upit->fetch();

      return new Species($post['id'], $post['naziv']);
    }
  }
?>
