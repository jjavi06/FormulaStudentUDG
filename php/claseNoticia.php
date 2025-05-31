<?php
class Noticia{
    public $id;
    public $shortDesc;
    public $largeDesc;
    public $lang;
    public $foto;

    public function getId(): int{
        return $this->id;
    }

    public function getShortDesc(): string {
        return $this->shortDesc;
    }

    public function getLargeDesc(): string {
        return $this->largeDesc;
    }

    public function getLang(): string{
        return $this->lang;
    }
    
    public function getFoto(): string {
        return $this->foto;
    }
}

?>