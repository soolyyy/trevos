<?php
// Úkol č. 1 - Hledání maxima a minima v dvourozměrném poli
// --------------------------------------------------------

// Úkolem je naprogramovat algoritmus, ktery najde ve dvourozměrném poli (matici) maximum a minimum. Výstupem je HTML stránka, kde si uživatel zadá rozměry matice, ta se vygeneruje s náhodnými čísly a poté se na stránce zobrazí i s označeným minimem a maximem. 

// Výsledek nahrajte na Github

// Úkol č. 2 - Sčítání libovolně velkých čísel
// -------------------------------------------

// Úkolem je naprogramovat algoritmus, který dokáže sečíst dvě libovolně velká celá čísla. Algoritmus tak umí sečíst i číslo větší než INT 64. Výstupem je funkce, která umí čísla sečíst.

// Výsledek nahrajte na Github


// Získáme hodnoty z inputů
if (isset($_GET['pocet_radku']) && isset($_GET['pocet_sloupcu']))
{
$radky = $_GET['pocet_radku'];
$sloupce = $_GET['pocet_sloupcu'];
$random_cisla = getRandomNumbers($radky, $sloupce);
$a = 1;

// Vypíšeme číselnou matici
$_html = '<table><tr>';
foreach ($random_cisla as $cislo) {
$_html.= '<td>'.$cislo.'</td>';

// Každých x čísel zalomíme řádek
if($a % $sloupce == 0)
$_html.= '<tr>';
$a++;
}

$_html.= '</table>';

echo $_html;
echo "Maximální číslo je:" . max($random_cisla);
echo "Minimální číslo je:" . min($random_cisla);
echo '<a href="http://localhost/test/zadani1.php">zpět</a>';
} 

else {
    $_html = '<form action="" method="GET">';
    $_html.= 'Počet řádků: <br><input type="text" name="pocet_radku">';
    $_html.= 'X';
    $_html.= 'Počet sloupců: <br> <input type="text" name="pocet_sloupcu">';
    $_html.= '<input type="submit">';
    $_html.= '</form>';
    echo $_html;
}

// Funkce pro získání náhodných čísel do matice
function getRandomNumbers($radky, $sloupce){
$random_number_arr = array();
for ($i=0; $i<($radky*$sloupce); $i++){
        $random_number_arr[] = rand(0,30);
    }
return $random_number_arr;
}

?>