<div class="panel panel-primary"> <!-- farba a typ formatovania otázky -->

    <div class="panel-heading"><font size="2">Uživateľ <a href='profil_other.php?id_uzivatel=<?php echo $id_uzivatela_o; ?>'><font color="Lime"><?php echo $nick_uzivatela_o; ?></font></a> uviedol nasledovnú otázku</font></div> <!-- Hlavička otázky (meno uživateľa) -->
    <form action="komentovanie.php" method="post"> <!-- začiatok formu na odoslanie ID otazky -->
<!--<input type="hidden" name="id_otazky" value="<?php //echo $jedna_otazka['id_otazky']; ?>">  hidden input na odoslanie ID otazky -->        
    <div class="panel-body"><button class="otazka" type="submit" name="id_otazky" value="<?php echo $jedna_otazka['id_otazky']; ?>"><font size="3"><?php echo $jedna_otazka['otazka']; ?></font></button></div> <!-- telo otázky, slúži ako submit button no zároveň ako zobrazenie otázky -->     
    </form> 
    <div class="panel-footer"><?php echo $jedna_otazka['cas']; ?></div> <!-- Päta otázky s časom uvedenia otázky -->
</div>