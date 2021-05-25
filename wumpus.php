<?php
require("includes/define.inc.php");
require(DIR_CLASS."Autoloader.class.php");
session_start();
$html = "";
if($_GET['act'] == "start")
{
    $_SESSION['mapa'] = $_GET['lvl']; 
    $_SESSION['tabuleiro'] = new Tabuleiro($_SESSION['mapa']);
    $_SESSION['jogador'] = new Jogador();
}
else 
{
    $objTabuleiro = $_SESSION['tabuleiro'];
    $objJogador = $_SESSION['jogador'];
    $objJogador->setPosicao($objJogador->getPosicao()+1,$objTabuleiro);
}

$html .= "
        <div id='left'>".$_SESSION['tabuleiro']->Desenhar()."
        </div>
        <div id='right'>".$_SESSION['jogador']->Desenhar()."
        </div>
        <br clear='all' />
        <div id='pontuacao'>
            Pontuação: ".$_SESSION['jogador']->getPontos()."
        </div>
        <div id='suposicoes'>
            Suposicoes: ".$_SESSION['jogador']->getSuposicoes()."
        </div>
        <div id='Posicao Atual'>
            Suposicoes: ".$_SESSION['jogador']->getSituacaoAtual()."
        </div>";
echo $html;
/*
echo "<pre>";
print_r($_SESSION['jogador']);
echo "</pre>";
*/
?>