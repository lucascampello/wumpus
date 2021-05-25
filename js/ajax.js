function jogar() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        var retorno = this.responseText.split(";");
        document.getElementById("jogo").innerHTML = retorno[0];
        if(retorno.length == 2)
        {
            if(retorno[4] == "-1")
                document.getElementById("botao").disable = true;
        }
      }
    };
    xmlhttp.open("GET", "wumpus.php?act=play", true);
    xmlhttp.send();
}

function iniciar(lvl)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        document.getElementById("jogo").innerHTML = this.responseText; 
      }
    };
    xmlhttp.open("GET", "wumpus.php?act=start&lvl="+lvl, true);
    xmlhttp.send();
}