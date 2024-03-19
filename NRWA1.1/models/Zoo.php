<?php
  class Zoo {
    public $id;
    public $naziv;

    public function __construct($id, $naziv) {
      $this->id      = $id;
      $this->naziv  = $naziv;
    }

    public static function all() {
      $lista = [];
      $db = Db::getInstance();
      $upit = $db->query('SELECT * FROM zoo');


      foreach($upit->fetchAll() as $post) {
        $lista[] = new Zoo($post['id'], $post['naziv']);
      }

      return $lista;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $upit = $db->prepare('SELECT * FROM zoo WHERE id = :id');
      $upit->execute(array('id' => $id));
      $post = $upit->fetch();

      return new Zoo($post['id'], $post['naziv']);
    }
  }
?>
