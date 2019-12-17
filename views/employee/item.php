<div class="container">
<div class='page-header'>
        <h1><?= $data['emp']['fname'] ?> <?= $data['emp']['lname'] ?></h1>
    </div>

<?php 


    ?>

<ul class="employee__list">
    
    <li class="employee__item"><span>Imię i Nazwisko: </span><?= $data['emp']['fname'] ?> <?= $data['emp']['lname'] ?></li>
 
    <li class="employee__item"><span>Imię Matki: </span><?= $data['emp']['mother_fname'] ?></li>
    
    <li class="employee__item"><span>Imię Ojca: </span><?= $data['emp']['father_fname'] ?></li>
    
    <li class="employee__item"><span>Miejsce urodzenia: </span><?= $data['emp']['birth_place'] ?></li>
    <li class="employee__item"><span>Data urodzenia: </span> <?= $data['emp']['birth_date'] ?></li>
    <li class="employee__item"><span>Gmina: </span> <?= $data['emp']['pesel'] ?></li>
    <li class="employee__item"><span>Miasto: </span> <?= $data['emp']['nip'] ?></li>
    <li class="employee__item"><span>Ulica: </span> <?= $data['emp']['district'] ?></li>
    <li class="employee__item"><span>Nr domu: </span> <?= $data['emp']['city'] ?></li>
    <li class="employee__item"><span>Nr mieszkania: </span> <?= $data['emp']['street'] ?> <?= $data['emp']['street_nr'] ?><?= $data['emp']['home_nr']>0 ? '/' . $data['emp']['home_nr'] : ''?></li>
    <li class="employee__item"><span>Kod pocztowy: </span> <?= $data['emp']['zip'] ?></li>
    <li class="employee__item"><span>Poczta: </span> <?= $data['emp']['post'] ?></li>
    <li class="employee__item"><span>Adres US: </span> <?= $data['emp']['us_address'] ?></li>
    <li class="employee__item"><span>Koszty uzyskania przychodu: </span> <?= $data['emp']['cost_pcent'] ?> %</li>
    <li class="employee__item"><span>Rodzaj umowy: </span> <?= $data['emp']['task_contract'] == 'D' ?'Dzieło' : 'Zlecenie' ?></li>
    <li class="employee__item"><span>Adres do korespondencji: </span> <?= $data['emp']['address'] ?></li>
    <li class="employee__item"><span>Nr konta: </span> <?= $data['emp']['bank_acc'] ?></li>
    <li class="employee__item"><span>Rodzaj płatności: </span> <?= $data['emp']['bank_transfer'] == 1 ? 'Przelew' : 'Gotówka' ?></li>
</ul>

<div class="employee__contracts"> 
    <p> Umowy pracownika:</p>
   <ul>
   <?php

   if(isset($data['cont'])){ 
       foreach($data['cont'] as $cont){ ?>
        <li class="contract__item"> <a href="?show_item=<?= $cont['id'] ?>" ><?= $cont->full_number ?></a></li>
      <?php } ?>
   </ul>
   <?php } else { ?>
    <p>brak umów dla tego pracownika w wybranym okresie <?php // $month . "/" . $year ?></p>
 <?php  } ?>
 </div>
    <hr>
    <div class="employee__button">
        <a class="btn btn-secondary" href="?add_cont=<?= $data['emp']['id'] ?>&task_contract=<?= $data['emp']['task_contract'] ?>">Dodaj umowę</a>
        <a class="btn btn-primary" href="?edit_emp=<?= $data['emp']['id'] ?>">Edycja</a>
    </div>
</div>
 