<!DOCTYPE html>
<!-- 
Úkol č. 1 - Hledání maxima a minima v dvourozměrném poli
--------------------------------------------------------
Úkolem je naprogramovat algoritmus, ktery najde ve dvourozměrném poli (matici) maximum a minimum. Výstupem je HTML stránka, kde si uživatel zadá rozměry matice, ta se vygeneruje s náhodnými čísly a poté se na stránce zobrazí i s označeným minimem a maximem. 
Výsledek nahrajte na Github
-->

<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úkol č. 1 - Hledání maxima a minima v dvourozměrném poli</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>

        * {
            text-align:center;
        }
        
        .jv_cisla_layout {
            width: 50%;
            margin: 0 auto;
            position: relative;
            display: block;
            display: flex;
            flex-wrap: wrap;
        }

        .jv_item {
            position: relative;
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
        }

        .jv_item input {
            border: 0px;
            width: 70%;
            box-shadow: 0 0 5px #9ecaed;
            border-radius: 5px;
        }

        .jv_item input:focus{
            border: 0px;
            box-shadow: 0 0 5px #91b5d1;
            border-radius: 5px;
        }

        .jv_input_box {
            border-radius: 10px 0px 0px 0px;
            width: 100%;
        }

        .jv-left {
            text-align: left;
        }

        .jv-right {
            text-align: right;
        }

        .jv_nadpis_box {
            text-transform: uppercase;
            display: block;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        .jv_cara_right {
            width: 20%;
            border: 0px;
            position: absolute;
            right: 10px;
            height: 5px;
            background: #e7f2fbb5;
            border-radius: 0px 10px 0px 10px;
        }

        .jv_cara_left {
            width: 20%;
            border: 0px;
            position: absolute;
            left: 10px;
            height: 5px;
            background: #e7f2fbb5;
            border-radius: 0px 10px 0px 10px;
        }

        .jv_nadpis_h1 {
            width: 100%;
            text-align: center;
            font-size: 150%;
        }

        .jv_cislo_max {
            color: white;
            background: green;
            border-radius: 100px;
        }

        .jv_cislo_min {
            color: white;
            background: red;
            border-radius: 100px;
        }

        .jv_submit {
            border: 0px;
            border-radius: 0px 10px 0px 10px;
            background: #e7f2fbb5;
            color: black;
            width: 20%;
            height: 50px;
            text-align: center;
            margin: 0 auto;
        }

        .jv_table {
            position: relative;
            margin: 30px auto;
            border-spacing: 10px 10px;
            border-collapse: inherit;
        }

        .jv_table > tbody > tr > td {
            width: 5%;
            height: 20px;
            text-align: center;
            padding: 5px;
            border-radius: 10px;
        }

        p {
            margin: 10px;
        }


        @media only screen and (max-width: 600px) {
            .jv_cisla_layout {
            width: 100%;
        }
}

    </style>
</head>
<form method="GET" action="">
<div class="jv_cisla_layout">
<div class="jv_nadpis_h1">Matice</div>
    <div class="jv_item">
        <span class="jv_nadpis_box jv-right">
            Počet řádků
        </span>
        <div class="jv_cara_right"></div>
        <div class="jv_input_box jv-right">
            <input type="text" id="pocet_radku" name="pocet_radku">
        </div>
    </div>
    <div class="jv_item">
            <span class="jv_nadpis_box jv-left">
                Počet sloupců
            </span>
            <div class="jv_cara_left"></div>
        <div class="jv_input_box jv-left">
            <input type="text" id="pocet_sloupcu" name="pocet_sloupcu">
        </div>  
    </div>
    <div class="jv_nadpis_h1">S čísly</div>
    <div class="jv_item">
        <span class="jv_nadpis_box jv-right">
            Od
        </span>
        <div class="jv_cara_right"></div>
        <div class="jv_input_box jv-right">
            <input type="text" id="cislo_min" name="cislo_min">
        </div>
    </div>
    <div class="jv_item">
        <span class="jv_nadpis_box jv-left">
            Do
        </span>
        <div class="jv_cara_left"></div>
        <div class="jv_input_box jv-left">
            <input type="text" id="cislo_max" name="cislo_max">
        </div>
    </div>
    <input type="submit" name="odeslat" value="Odeslat" class="jv_submit">
</div>


</body>
</html>
<?php
// Získáme hodnoty z inputů
if (isset($_GET['odeslat']))
{
    $radky = $_GET['pocet_radku'];
    $sloupce = $_GET['pocet_sloupcu'];
    $cislo_min = $_GET['cislo_min'];
    $cislo_max = $_GET['cislo_max'];

    if ($radky != '' && is_numeric($radky) &&
        $sloupce != '' && is_numeric($sloupce) && 
        $cislo_min != '' && is_numeric($cislo_min) &&
        $cislo_max != '' && is_numeric($cislo_max) &&
        $cislo_min <= $cislo_max)
    {
        $random_cisla = getRandomNumbers($radky, $sloupce, $cislo_min, $cislo_max);
        $max = max($random_cisla);
        $min = min($random_cisla);
        $a = 1;

        // Vypíšeme číselnou matici
        $_html = '<table class="jv_table"><tr>';
        foreach ($random_cisla as $cislo) 
        {
            // Jestliže číslo je v max nebo v min, zvýrazníme
            if ($cislo == $max) {
                $_html.= '<td class="jv_cislo_max">'.$cislo.'</td>';
            } elseif ($cislo == $min) {
                $_html.= '<td class="jv_cislo_min">'.$cislo.'</td>';
            } else {
                $_html.= '<td>'.$cislo.'</td>';
            }

            // Každých x čísel zalomíme řádek
            if($a % $sloupce == 0) 
            {
                $_html.= '<tr>';
            }
            
            $a++;
        }

        $_html.= '</table>';
        echo '<p>Maximální číslo je: ' . max($random_cisla).'<br>';
        echo 'Minimální číslo je: ' . min($random_cisla) . '</p>';
        echo $_html;
    } else {
        echo "Chyba - vyplňte všechna pole číslicemi a hodnota MAX musí být větší nebo rovno MIN";
    }
}

// Funkce pro získání náhodných čísel do matice
function getRandomNumbers($radky, $sloupce, $min = 0, $max = 10){
$random_number_arr = array();
for ($i=0; $i<($radky*$sloupce); $i++){
        $random_number_arr[] = rand($min,$max);
    }
return $random_number_arr;
}


?>