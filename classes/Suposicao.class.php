<?php
if(!class_exists("Suposicao"))
{    
    class Suposicao extends Celula {
        private $estatistica;

        function __construct() {
            parent::__construct(DESCONHECIDO);
            $this->setEstatistica(0);
        }
        
        public function getEstatistica() : int {
            return $this->estatistica;
        }
        
        public function setEstatistica(int $estatistica) : void {
            $this->estatistica = $estatistica;
        }
    }
}