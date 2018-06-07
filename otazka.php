<div class="media text-muted pt-3"> <!-- orámovanie celej otázky -->
    <img src="img_avatar1.png" alt="" class="mr-2 rounded" width="38" height="38"> <!-- možno raz obrázok uživateľa -->
    <form action="komentovanie.php" method="post"> <!-- začiatok formu na odoslanie ID otazky -->  
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">

            <strong class="d-block text-gray-dark"><span style="font-size:15px"><a href='profil_other.php?id_uzivatel=<?php echo $id_uzivatela_o; ?>'><?php echo $nick_uzivatela_o; ?></a></span> <span style="font-size:10px"><?php echo $jedna_otazka['cas']; ?></span></strong><!-- Hlavička otázky (meno uživateľa) -->
            <big><?php echo $jedna_otazka['otazka']; ?></big> <!-- telo otázky -->
          
            <p class="d-block text-gray-dark"><?php echo $jedna_otazka['cas']; ?></p> <!-- Päta otázky s časom uvedenia otázky -->
            
            <button type="submit" name="id_otazky" value="<?php echo $jedna_otazka['id_otazky']; ?>">Zobraziť komentáre</button>
        </p>
    </form> 
</div>