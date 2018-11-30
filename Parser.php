<?php
   
class Parser{
    protected $text;
    protected $pos;
    
    public function __construct($text) {
        $this->text = $text;
        $this->pos = 0;
    }
    
    public function moveTo($find){
        $this->pos = strpos($this->text, $find, $this->pos) + strlen($find);
        return $this;
    }
    
    public function readTo($find){
        $start = $this->pos;
        echo $start . "</br>";
        $this->moveTo($find);
        echo $this->pos . "</br>";
        echo strlen($find) . "</br>";
        return substr($this->text, $start, $this->pos - $start - strlen($find));
    }
}

?>