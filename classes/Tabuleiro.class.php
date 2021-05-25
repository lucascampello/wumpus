<?php

if(!class_exists("Tabuleiro"))
{    
    class Tabuleiro {
        public $posicaoJogador;
        public $objCelulas;

        public function Tabuleiro($idMapa)
        {
            $objArquivo = file("includes/mapas.txt");
            $arrayPosicoes = explode(";",$objArquivo[$idMapa]);
            $this->posicaoJogador = 0;

            for($i = 0; $i < TAMANHO_TABULEIRO; $i++)
            {
                $this->objCelulas[] = new Celula($arrayPosicoes[$i]);
            }
            $this->setPosicaoPlayer(0);
        }
        
        public function Desenhar()
        {
            $html = "";
            $linha = "";
            $contador = 0;
            for($i = POSICAO_INICIAL; $i < TAMANHO_TABULEIRO; $i++)
            {
                $linha .= "<img src=\"".$this->objCelulas[$i]->getImage()."\"\>";
                if($contador == 3)
                {
                   $html = "
                   <div =\"linha\">".$linha."</div>".$html;
                   $linha = "";
                   $contador = -1;
                }
                $contador++;
            }
            return $html;
        }
        
        public function setPosicaoPlayer($posicao) : int
        {
            $posicaoAtual = $this->objCelulas[$posicao]->getStatus();
            if($this->objCelulas[$posicao]->getStatus() == OK)
            {
                $this->objCelulas[$posicao]->setStatus(JOGADOR);
            }
            else
            {
                
            }
            
            return $posicaoAtual;
        }
    }
}
