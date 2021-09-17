<?php
$nev = $_GET["nev"] ?? "";
$hely = $_GET["hely"] ?? "";
$email = $_GET["email"] ?? "";
$tel = $_GET["tel"] ?? "";
$p_fajta = $_GET["p_fajta"] ?? "";
$p_meret = $_GET["p_meret"] ?? "";
$p_lmentes = $_GET["p_lmentes"] ?? "";
function ki($string)
{
    return htmlspecialchars($string,ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzamizéria</title>
    <link rel="shortcut icon" href="M1.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="brain.js"></script>
</head>
<body onload="init();">
    <form>
        <div id="szem_adatok">
            <h2 onclick="init();">
                Személyes adatok
            </h2>
            <div class="szemelyes">
                <Label for="nev">Név</Label>
                <input id="nev" name="nev" type="text" placeholder="Név" value="<?php echo ki($nev)?>">
                <?php 
                if($nev=== "" && isset($_GET["kuldott"])){
                    echo "<p class='hiba'>Hiányzik a név!</p>";
                }
                ?> 
                <Label for="hely">Cím</Label>  
                <input id="hely" name="hely" type="text" placeholder="Cím" value="<?php echo ki($hely)?>">
                <?php 
                if($hely=== "" && isset($_GET["kuldott"])){
                    echo "<p class='hiba'>Hiányzik a cím!</p>";
                }
                ?> 
                <Label for="email">E-mail</Label>
                <input id="email" name="email" type="e-mail" placeholder="E-mail" value="<?php echo ki($email)?>">
                <?php 
                if($email=== "" && isset($_GET["kuldott"])){
                    echo "<p class='hiba'>Hiányzik az e-mail!</p>";
                }
                ?> 
                <Label for="tel">Telefonszám</Label>
                <input id="tel" name="tel" type="tel" placeholder="Telefon" value="<?php echo ki($tel)?>">
                <?php 
                if($tel=== "" && isset($_GET["kuldott"])){
                    echo "<p class='hiba'>Hiányzik a telefonszám!</p>";
                }
                ?> 
                <input name="kuldott" value="1" hidden>
                <input type="submit" value="Temp">
            </div>
        </div>
        <div id="pizza_adatok">
            <h2>
                Pizza Adatai
            </h2>
            <div class="pizzaadatok">
                <div class="fajtak">
                    <label for="pizza_fajta">
                    Pizza fajtája<?php 
                    if($p_fajta=== "" && isset($_GET["kuldott"])){
                        echo "<span class='hiba'> (Kötelező)</span>";
                    }
                    ?> :
                    </label>
                    <input list="pizzak" name="pizza_fajta" id="pizza_fajta"/>
                    <datalist id="pizzak">
                    </datalist>
                </div>
            </div>
        </div>
    </form>
</body>
</html>