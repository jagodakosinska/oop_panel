<div class="container">
<div class="contract__container">
    <h1 class="contract__title"> UMOWA O DZIEŁO</h1>
    
        <p class="contract__content">Umowa zawarta w dniu <span class="contract__important"><?= $data['contract']['bdate'] ?></span>, we Wrocławiu, pomiędzy stronami umowy:
        <br>
        <span class="contract__important">EMIN Jacek Kosiński</span> zwanym dalej <span class="contract__important">Zamawiającym</span>, a 
          
            <span class="contract__important"> <?= $employee->fname ?> <?= $employee->lname ?> </span> zwanym dalej <span class="contract__important">Wykonawcą</span>,
            o następującej treści:
        </p>
        <br>
        <h3 class="contract__paragraf">§ 1</h3>
        <p class="contract__content">
            Zamawiający powierza wykonanie, a Wykonawca zobowiązuje się wykonać dzieło polegające
            na: <?= $contract->title ?>.
        </p>
        <br>
        <h3 class="contract__paragraf">§ 2</h3>
        <p class="contract__content">
            Termin rozpoczęcia dzieła strony ustaliły na dzień <span class="contract__important"><?=  $data['contract']['bdate']  ?></span> a wykonania na dzień <span class="contract__important"><?=  $data['contract']['edate']  ?></span>.
        </p>
        <br>
        <h3 class="contract__paragraf">§ 3</h3>
        <p class="contract__content">
            Wykonawcy przysługuje wynagrodzenie za wykonanie dzieła w wysokości ................ zł. 
            Zamawiający wypłaci Wykonawcy wynagrodzenie w formie <?= $data['employee']['bank_transfer'] == 1 ? 'przelewu' : 'gotówki' ?> 
            w dniu odbioru wykonanego dzieła, na podstawie wystawionego przez Wykonawcę rachunku.
        </p>
        <br>
        <h3 class="contract__paragraf">§ 4</h3>
        <p class="contract__content">
            Zmiany umowy wymagają formy pisemnej pod rygorem nieważności.
        </p>
        <br>
        <h3 class="contract__paragraf">§ 5</h3>
        <p class="contract__content">
            W sprawach nieuregulowanych niniejszą umową będą miały zastosowanie przepisy kodeksu
            cywilnego.
        </p>
        <br>
        <h3 class="contract__paragraf">§ 6</h3>
        <p class="contract__content">
            Umowę sporządzono w dwuch jednobrzmiących egzemplarzach, po jednym dla każdej ze stron.
        </p>
    </div>
</div>


</body>
</html>