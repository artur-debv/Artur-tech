<?php
// Inicia a sessão PHP
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/imagens para uso do favicon/nanotechnology.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/styles.css">
  <!--box icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Artur tech</title>
</head>
<style>
  p {
    color: white;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 20px;
  }
</style>

<body>
  <div class="container" id="nav">
    <nav>
      <div id="title">
        <h1><a id="li_1" href="#">Artur tech</a></h1>
      </div>
      <nav class="sc-hAZoDl cqDFSz">
        <div><img src="img/icons a ser usadas na navbar/entrar ou cadastrar.png" alt="Contato">
          <p>
            <?php
            // Verifica se a variável nome existe
            if (isset($_SESSION['nome'])) {
              // Exibe o nome do usuário
              echo "<p>Olá, " . $_SESSION['nome'] . " | <a href='sistema/logout.php'</a>Sair</p>";
            } else {
              echo "<a href='sistema/login.php'>Fazer login</a>";
            }
            ?>
          </p>
          </a>
        </div>
        <div><a href="explorar.php"><img
              src="img/icons a ser usadas na navbar/explorar.png" alt="Shop">Explorar</a>
        </div>
        <div><a
            href="sistema/carrinho.php?acao=up"><img
              src="img/imagem carrinho de compra/carrinho compras.png" alt="Search"></a><span>
            <?php
            // Verifica se a variável carrinho existe
            if (isset($_SESSION['carrinho'])) {
              // Obtém o número de itens no carrinho
              $numero_itens = count($_SESSION['carrinho']);
              // Exibe o número de itens no carrinho
              echo $numero_itens;
            } else {
              // Não há itens no carrinho
              echo "0";
            }
            ?>
          </span>
        </div>
  </div>
  </nav>
  </nav>
  </div>
  <div class="sc-bjUoiL gaWrVa"><a
      href="nootbok.php">
      <div class="sc-idiyUo iAYUTC"><img
          src="data:image/png;base64,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"
          alt="Notebook gamer">
        <h3>Notebooks</h3>
      </div>
    </a><a href="computador.php">
      <div class="sc-idiyUo iAYUTC"><img
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAAW9yTlQBz6J3mgAAAIFJREFUWMNjYPhPNCQTDBcLKFczasGoBbiS7KgFo6mIWnFAERheFlBeZ2Bx4kiygMzAH7Vg1IJRC0YtIMuCAIYGIKaZBQlQkQRaWbAfKrKfVhbMh4rMp1V9IMCwHshfD6SHU42GDTSA9TVgsKnWahtaFmBTM+IsIH4ogeRBh6FuAQA13dR0pSaDbAAAAABJRU5ErkJggg=="
          alt="CPUs games">
        <h3>Computadores</h3>
      </div>
    </a><a href="monitor.php">
      <div class="sc-idiyUo iAYUTC"><img
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAGeElEQVR4nO3asU4j6xnG8efrj3R8riDmCg65gn3pUkTKIqVJdUydAuhSRMqeK8BbpD52HykcJT1GSh/2Cs7QpbNXSr95ZocN2PAO7KxZm/H/J/1NiZB4mPmGKQKQYiBACwYCtGAgQAsGArRgIEALBgK0YCBACwYCtGAgQAsGArRgIEALBgK0YCBACwYCtGAgQAsGArRgIEALBgK0YCBACwYCtPicgQzc9y4EvFwzSe/cwj3qKQP5wY3EMNAvM0kTSVOXKi4Tks7cvgP66sqdupkekA3kL+6NgN3xRtKPbklxq35yIwG7ZyLpyP1fcXeN3bEDdtVbd+I+ujuQkZqrB7DrjtxEVlxt4H5x9Vdg1y3cnlsUf9TGjlsr4NbHW616IAM3dwCWfVcPZCTOHsBDDuuBTNT8txzAsmk9kJmkVw7Asst6IPX5oz6HAFi2qAfywXXxzi0csO0G7nv32b5kIAduJmD7haQL99mK++C6OHAzAdsvxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIEAqxECAVIiBAKkQAwFSIQYCpEIMBEiFGAiQCjEQIBViIFvjlatduq9pU9/3JQhtYCBA79UDqST9ygFY9q4eyEy3l2cAty7rgYzdsQOw7G09kFDHAwzQcwf1QGoL960D0Lh2w+KP2kjSTw5A48hNij8+qcTTLKB27Yay4j7ZdzNxq4Xd9t6FpCu3NJDaSNxqYbcdunP30epAaiMxEuymIzfRHcU9ZN/NxO0WdsN7F7q5rborG0ht4E5uYijoo3oY45sW7p62gXwylPT6plcOeOku3flNlVoU97mGatpF/3DfuC7+6v7m1uH37o+ui/+4P7hdVKnpyYrD04z0ZQ8vvnMLtw4DN3ddHbpzh0cwkKe7cKFupm6k9ZpI+sF18bN77fCI4vC4oaRfXFcHbqb1CjWj7WrPVUKr4vC4sTt2XVy7oZ5Hpe6vB/3o3gitisPj5m7gujh1Y/ccTtyZ66JScxVBi+LQbqTtOZyvGri56+rQnTskGMjjLlyom6kb6XlNxGH92RSH3FDbdzhfFWpG3NWeq4QHFYfc2B27Lq7dUF9HJQ7rz6I45OZu4Lo4dWP3NZy4M9dFpeYqggcUh4eNtL2H81UDN3ddHbpzhxUMJHfhQt1M3Uhf10Qc1teuONw31PYfzleFmlF3tecqYUlxuG/sjl0X126ozajEYX2tisN9czdwXZy6sduEE3fmuqjUXEVwR3FYNtLLOZyvGri56+rQnTvcYCD3XbhQN1M30mZNxGF9bYrDraFe3uF8VagZeVd7rhI+Kg63xu7YdXHthtoOlTisr0VxuDV3A9fFqRu7bXDizlwXlZqrCKy4vnvlnuI37k+uq9+6/7pt8I37p+vqz+5f7ikuXW8V1zcDd+xO3MDh+S3c2L11C9cbfRvIvvu7GwqbUKl5VHzleqG4Pvm323fYnCv3a9cLfRrISF/2Dz6sz5GbqAeK64tz9zuHzfvZvXYvXp8GMtPTn1jheV26UA8U1xcfHLZHL363evFD3Fi4bx02770buBevTwOZiVusbXHpQj1QXF9M1P0tVqzX1I3UA8X1RejL3mLF+hy4mXqguD6ZiKvIpk3dSD1RXJ/UB8OxYySbMXUnbuF6obg+CjV/xYZqXj3h6dbzqJ9WXblKzdV7pp75H7AXFYLFrT+mAAAAAElFTkSuQmCC"
          alt="Monitores games">
        <h3>Monitores</h3>
      </div>
    </a><a href="acessorios1.php">
      <div class="sc-idiyUo iAYUTC"><img
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAAW9yTlQBz6J3mgAAAVhJREFUWMPlmNGVhCAMRV8JlEAJlEAJlEAJUwIdWAIlbAmUYAmWQAnuhxBRmNEZw1l3l/dlTshVwglE4JMRMGNGQLfxmwEOAQGxF2DAXMhzhxeb8BGSG6BT6BEBA3/4FaB77Z27AubO+jMAD8csvwXobltiB7AISSpZFFmGomQ897KvAY7WTu8cy+IWXni5HwZ0X6LuSe4OuHmSJ/hqHhsg7JZZwCHWAAmdJMgxWxRNVpVXe0iM3Ek2qRKp/XmwfmouVpLeIlsszbGV12KNRRUdM4QnB6DqWcrwAUzzLIiQXIApPX9BQcDQs+dJsqpeQaR8RB6AbURxZ2rRWiOfadgGe7fY6cMjPdwcIA/vDvYa4Hxbcgh4UPl6T+os4FOF/wDQl7Tk4NEAmIbt8g3CFDbPCcj950RHqKJjh7mDjnAwRT9t+HrosbEFWFv1GsH+J2C5Oi8LRRewbzirSQaidNuFAAAAAElFTkSuQmCC"
          alt="Acessórios games">
        <h3>Acessórios</h3>
      </div>
    </a></div>
  <div class="container_about_about">
    <div class="div_abouts_abousts">
      <div class="sc-hHLeRK bzOixb"><strong>Ofertas todos os dias</strong>
        <h1>Os melhores produtos
          <br>
          do mundo tech é aqui!
        </h1>
        </p><a href="explorar.php"><button
            class="sc-gKXOVf gYkoek">Veja Mais</button></a>
      </div>
      <div><img class="imagempc" src="img/imagens usadas para informaçoes/pc-gamer.83b37b064f7dd8e8fc93.png"
          alt="PC gamer e acessórios"></div>
    </div>

  </div>
  <div class="container_product">
    <div class="product">
      <img class="nottbook" class="" src="img/imagens container product/NotebookGamerOffers.fd8ba90cd4003d50f4f7.png"
        alt="">
      <div class="title">
        <p class="p_not">Notebooks</p>
        <h2 class="h2not">Notebooks de alta qualidade</h2>
        <p class="h2_not">Os melhores notebooks do mercado com ofertas
          <br>
          exclusivas
        </p>
        <br>
        <a href="nootbok.php"
          class="link_not">Confira agora</a>
      </div>
    </div>
    <div class="product">
      <div class="title">
        <p class="p_not">CPU para gamers</p>
        <h2 class="h2not">Essencial para Pro PLayers</h2>
        <p class="h2_not">Alcance todo o seu potencial com essa máquina feita
          <br>
          para você ganhar todas
        </p>
        <br>
        <a href="computador.php"
          class="link_not">Confira agora</a>
      </div>
      <img class="nottbook" class="" src="img/imagens container product/CPUOffers.a828954faf4f4ff92973.png" alt="">
    </div>
    <div class="product_11">
      <img class="kitgamer" class="" src="img/imagens container product/kit gamer.png" alt="">
      <div class="title">
        <p class="p_not">acessórios para seu computador</p>
        <h2 class="h2not">acessórios de alta qualidade</h2>
        <p class="h2_not">Os melhores acessórios do mercado com ofertas
          <br>
          exclusivas
        </p>
        <br>
        <a href="acessorios1.php"
          class="link_not">Confira agora</a>
      </div>
    </div>
    <div class="product_12">
      <div class="title">
        <p class="p_not">monitor para melhor performance em jogos</p>
        <h2 class="h2not">Essencial para entrar nos universos dos jogos</h2>
        <p class="h2_not">Alcance todo o seu potencial com esse monitor feita
          <br>
          para você ganhar todas as partidas
        </p>
        <br>
        <a href="monitor.php"
          class="link_not">Confira agora</a>
      </div>
      <img class="monitorgamer" class="" src="img/imagens container product/monitor gamer.png" alt="">
    </div>
  </div>
  <section class="sc-cxabCf cEZwIm">
    <div class="sc-llJcti fSiFFA">
      <div class="sc-iIPllB buhlSA">
        <div>
          <h4 class="h4_nome">Artur Tech</h4>
        </div>
        <a href="mailto:ColdTech@gamil.com">ArturTech@gmail.com</a>
        <a>+55 85 99999 9999</a>
        <div class="sc-ezWOiH iPCesR">
          <img src="img/imagens usada para o footer/fecebook.png" alt="Conta ColdTech facebook"><img
            src="img/imagens usada para o footer/instagram1.png" alt="Conta ColdTech instagram"><img
            src="img/imagens usada para o footer/twiter1.png" alt="Conta ColdTech twitter">
        </div>
      </div>
      <div class="sc-gicCDI DupHf">
        <h4>Atendimento ao cliente</h4><a href="/contact">Ajuda &amp; Contanto</a><a href="/explorar">Loja online</a><a
          href="/">Home</a>
      </div>
    </div>
    <p class="sc-bZkfAO fJFxfH">Copyright 2022. all rights reserved </p>
  </section>
</body>

</html>