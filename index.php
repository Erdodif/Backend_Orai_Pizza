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
if($nev !== "" &&
    $hely !== "" &&
    $email !== "" &&
    $tel !== "" &&
    $p_fajta !==  "" &&
    $p_meret !== ""){
    $urlap = true;
}else{
    $urlap = false;
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
    <?php if($urlap){echo '<link rel="stylesheet" href="urlap.css">';}?>
    <script src="brain.js"></script>
</head>
<body <?php if($urlap){echo "onload='urlap();' id='body'";}else{echo 'onload="init();"';}?>>
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
            </div>
        </div>
        <div id="pizza_adatok">
            <h2>
                Pizza Adatai
            </h2>
            <div class="fajtak">
                <label for="pizza_fajta">
                Pizza fajtája<?php 
                if($p_fajta=== "" && isset($_GET["kuldott"])){
                    echo "<span class='hiba'> (Kötelező)</span>";
                }
                ?>:
                </label>
                <input list="pizzak" name="p_fajta" id="pizza_fajta" value="<?php echo ki($p_fajta)?>"/>
                <datalist id="pizzak">
                </datalist>
                <div class="checkers">
                    <p>Méret <?php 
                    if($p_meret=== "" && isset($_GET["kuldott"])){
                        echo "<span class='hiba'> (Kötelező)</span>";
                    }
                    ?>:
                    </p>
                    <div>
                        <label for="m35">35cm</label>
                        <input type="radio" name="p_meret" id="m35" value="35" 
                        <?php if($p_meret === "35" || $p_meret=== ""){ echo "checked";}?>>
                    </div>
                    <div>
                        <label for="m42">42cm</label>
                        <input type="radio" name="p_meret" id="m42" value="42"
                        <?php if($p_meret === "42"){ echo "checked";}?>>
                    </div>
                    <div>
                        <label for="m60">60cm</label>
                        <input type="radio" name="p_meret" id="m60" value="60"
                        <?php if($p_meret === "60"){ echo "checked";}?>>
                    </div>
                </div>
                <div class="box">
                    <label for="p_lmentes" id="lmentes_label">Laktózmentes feltét</label>
                    <input type="checkbox" name="p_lmentes" id="lmentes" value="1" 
                    <?php if($p_lmentes !==""){echo "checked";}?>>
                </div>
            </div>
            <input type="submit" value="Küldés" id="kuldes">
        </div>
    </form>
</body>
</html>