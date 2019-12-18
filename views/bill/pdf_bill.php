<div class="container">
   <div class="bill__date">Wrocław dn. <?= date('Y-m-d') ?></div>
   <h1 class="bill__title"> Rachunek</h1>
   <div class="bill__content">
      <p class="bill__subtitle">Rachunek nr <?= $bill->full_number ?>, z dnia <?= $bill->bill_date ?>
      </p>
      <Br>
      <p class="bill__content--left">
         Zleceniobiorca: <?= $employee->fname . " " . $employee->lname ?>
         <br>
         Dla Emin Jacek Kosiński
         <br>
         za wykonanie pracy, której przedmiotem jest: <?= $contract->title ?>
         <br>
      </p>
      <h3 class="bill__subtitle"> ROZLICZENIE </h3>
      <p class="bill__content--left">
         <br>
         1. Kwota brutto: .............................................
         <br>
         2. Ubezpieczenia społeczne: ..................................... (opłacane przez pracownika)
         <br>
         3. Koszty uzyskania przychodów: ................................
         <br>
         4. Podstawa opodatkowania: ......................................
         <br>
         5.Składka na ubezpieczenie zdrowotne: ...........................
         <br>
         6. Zaliczka na podatek dochodowy: ...............................
         <br>
         7. Kwota do wypłaty: <?= $bill->netto ?>
         <br>
         (słownie: ........................................................................................................................................)
         <br>
      </p>
      <br>
      
      <div class="bill__content--center">
         <div class="bill__content--item">
            ................................
            <br>
            (podpis zleceniobiorcy)
         </div>
         <div class="bill__content--item">
            .................................
            <br>
            (podpis zleceniodawcy)
         </div>
      </div>
      <br>

      <br>
      <p class="bill__content--left">
         Powyższą kwotę otrzymałem gotówką/przelewem:

         <br>
         <br>

         ….................................. dn. ...............................
         (podpis zleceniobiorcy) (data otrzymania zapłaty)
      </p>
   </div>
</div>


</body>

</html>