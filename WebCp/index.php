<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Calculadora de Capacitância</title>
</head>

<body>
  <h1 class="titulo">Calculadora de Correção de Circuito CA</h1> <br>
  <p class="descricao"> 
    Digite os valores atuais para serem corrigidos.<br> Exemplo: 230V, 19000VA e Ângulo CosFi = 60 <br> 
    *Atenção! A Potência Aparente deverá estar em VA, ao invés de KVA.
  </p><br> <br>
  <form method="post">
    <label for="tensao">Tensão (V):</label>
    <input type="number" id="tensao" name="tensao" min="0" required> <br><br>
    <label for="potencia">Potência aparente (VA):</label>
    <input type="number" id="potenciaAparente" name="potenciaAparente" min="0" required> <br><br>
    <label for="cosFi">Ângulo do cosseno FI: </label>
    <input type="number" id="AcosFi" name="AcosFi" step="0" value="" required> <br><br>
    <button type="submit" name="calcular">Calcular</button> <br>
  </form>

  <?php
  if (isset($_POST['calcular'])) {
    $tensao = $_POST['tensao'];
    $potenciaAparente = $_POST['potenciaAparente'];
    $AcosFi = $_POST['AcosFi'];

    $s1 = $potenciaAparente;
    $v = $tensao;
    $AcosF1 = deg2rad($AcosFi);
    $cosF1 = cos($AcosF1);
    $pi = M_PI;
    $p1 = $s1 * $cosF1;
    $q1 = sqrt((pow($s1, 2) - pow($p1, 2)));
    $it1 = $s1 / $v;
    $z1 = ($v / $it1);
    $c = $p1 / (2 * $pi * 60 * pow($v, 2)) * (tan($AcosF1) - 0.4244);
    $cosFi2 = 0.92;
    $s2 = ($p1 / 0.92);
    $q2 = sqrt((pow($s2, 2) - pow($p1, 2)));
    $it2 = $s2 / $v;
    $z2 = $v / $it2;

    echo "<h2>Resultados:</h2><br>";
    echo "<p> Potência Aparente: <strong>" . $s1 . " VA</strong></p> <br> 
    <p> Tensão: <strong>" . $v . " V </strong></p> <br> <p> Potência Ativa: <strong>" . $p1 . " W </strong></p><br>
    <p> Potência Reativa: <strong>" .$q1. " VAr </strong></p><br><p> Corrente Total: <strong>" .$it1. " A </strong></p>
    <br> <p> Impedância: <strong>" . $z1 . " Ohms </strong></p><br><p> Capacitor: <strong>" . $c . "  µF </strong></p>
    <br><p> Potência Aparente: <strong>" . $s2 . " VA </strong></p><br>
    <p> Potência Reativa: <strong>" . $q2 . " VAr </strong></p>
    <br><p> Corrente Total: <strong>" . $it2 . " A </strong></p>
    <br><p> Impedância: <strong>" . $z2 . " Ohms </strong></p>";
  }
  ?>
</body>

</html>

