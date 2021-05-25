<?php
if(!class_exists("Celula"))
{
    class Celula {
        private $status;
        private $image;
        
        /**
         * Construtor do método
         * @param int $status - Tipo de Célula (OK | WUMPUS | CHEIRO | FOSSO | BRISA | OURO)
         */
        function __construct($status) {
            $this->setStatus($status);
        }
        
        /**
         * Retorna o Status atual da Célula do Tabuleiro
         * @return int
         */
        function getStatus() : int {
            return $this->status;
        }

        function getImage() : string {
            return $this->image;
        }

        /**
         * Define a Situação da Célula
         * @return void
         */
        public function setStatus($status): void {
            $this->setImage($status);
            $this->status = $status;
        }
        
        private function setImage($status) : void {
            $this->image = DIR_IMG.$status.".png";
        }
    }
}