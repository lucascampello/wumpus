<?php

/**
 * Description of Jogador
 *
 * @author micre
 */
class Jogador {
    private $posicao;
    private $pontos;
    private $suposicoes;
    private $statusAtual;

    private $objSuposicao;
    
    function __construct() {
        $this->posicao = 0;
        for($i = 0; $i < TAMANHO_TABULEIRO; $i++)
        {
            $this->objSuposicao[$i] = new Suposicao();
            $this->objSuposicao[$i]->setStatus(DESCONHECIDO);
        }
        $this->setSuposicoes("JOGO INICIADO!");
        $this->setSuposicoes("Posição OK");
        $this->setPontos(0);
        $this->objSuposicao[0]->setStatus(JOGADOR);
        $this->statusAtual = OK;
    }
    
    function getPosicao() : int {
        return $this->posicao;
    }

    function getPontos() : int {
        return $this->pontos;
    }
    
    function setPosicao($posicao, $objTabuleiro): void {
        $posicaoAntiga = $this->posicao;
        
        $this->objSuposicao[$posicaoAntiga]->setStatus($this->statusAtual);

        $this->statusAtual = $objTabuleiro->objCelulas[$posicao]->getStatus();
        $this->objSuposicao[$posicao]->setStatus(JOGADOR);
        $this->posicao = $posicao;
        $this->setPontos($this->getPontos() - 1);
    }
    
    function setPontos($pontos): void {
        $this->pontos = $pontos;
    }
    
    public function setSuposicoes($suposicao) : void {
        $this->suposicoes[] = $suposicao;
        
    }
    
    public function clearSuposicoes() : void {
        $this->suposicoes = null;
    }

    public function Desenhar()
    {
        $html = "";
        $linha = "";
        $contador = 0;
        for($i = POSICAO_INICIAL; $i < TAMANHO_TABULEIRO; $i++)
        {
            $linha .= "<img src=\"".$this->objSuposicao[$i]->getImage()."\"\>";
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
    
    public function getSuposicoes()
    {
        return implode("<br>", $this->suposicoes);
    }
    
    public function getSituacaoAtual()
    {
        switch($this->statusAtual)
        {
            case OK:
               return "OK";
            case WUMPUS:
               return "WUMPUS";
            case FEDOR:
               return "FEDOR";
            case FOSSO:
               return "FOSSO";
            case BRISA:
               return "BRISA";
            case FEDOR_BRISA:
               return "FEDOR + BRISA";
            case OURO:
               return "OURO";
            case OURO_FEDOR:
                return "FEDOR + OURO";
            case OURO_BRISA:
                return "BRISA + OURO";
            case OURO_FEDOR_BRISA:
                return "FEDOR + BRISA + OURO";
            case JOGADOR:
                return "JOGADOR";
        }
    }
}
