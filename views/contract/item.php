<div class="container">
    <div class='page-header'>
        <h1 class="contract__title"><?= $data['emp']['fname'] ?> <?= $data['emp']['lname'] ?></h1>
    </div>

<?php 

    ?>

<ul class="contract__list">
    
    <li class="contract__item"><span class="contract__important">Numer umowy: </span><?= $data['cont']['full_number'] ?></li>
    <li class="contract__item"><span class="contract__important">Data rozpoczęcia umowy: </span><?= $data['cont']['bdate'] ?></li>
    <li class="contract__item"><span class="contract__important">Data zakończenia umowy: </span><?= $data['cont']['edate'] ?></li>
    <li class="contract__item"><span class="contract__important">Przedmiot umowy: </span><?= $data['cont']['title'] ?></li>
    <li class="contract__item"><span class="contract__important">PDF:</span>
        <?php if(!is_null($data['cont']['pdf'])){ ?> 
            <a href="?display_contract_pdf=<?= $data['cont']['id'] ?>" target="_blank" ><i class="menu-icon icon-file" ></i>Otwórz</a> 
        <?php } else { ?> 
            Brak
        <?php }  ?>
    </li>

</ul>
<div class="contract__button">

<?php if (is_null($data['cont']['bill'])) { ?>
                                <a class="btn btn-default" href="?add_bill=<?= $data['cont']['id'] ?>&bank_transfer=<?= $data['emp']['bank_transfer'] ?>&cost_pcent=<?= $data['emp']['cost_pcent'] ?>">Dodaj rachunek</a>
                            <?php }  ?>

                            <?php if(is_null($data['cont']['pdf'])){ ?>
        <button class="btn btn-default"><a href="?contract_pdf=<?= $data['cont']['id'] ?>">Generuj PDF</a>
        </button>
<?php } ?>
                                <a href="?delete_cont=<?= $data['cont']['id'] ?>" class="btn btn-danger">Usuń umowę</a>
                            
<a class="btn btn-primary"  href="?edit_cont=<?= $data['cont']['id'] ?>&uid=<?= $data['emp']['id'] ?>">Edycja</a>
</div>
</div>
