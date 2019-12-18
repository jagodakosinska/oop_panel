<div class="container">
    <h1 class="bill__title"><a href="emp_show=<?= $data['employee']['id'] ?>" ><?= $data['employee']['fname'] ?> <?= $data['employee']['lname'] ?></a></h1>
    <ul class="bill__list">
        <li class="bill__item"><span class="contract__important">Numer rachunku: </span><?= $data['bill']['full_number'] ?></li>
        <li class="bill__item"><span class="contract__important">Data wystawienia: </span><?= $data['bill']['bill_date']  ?></li>
        <li class="bill__item"><span class="contract__important">Kwota netto: </span><?= $data['bill']['netto']  ?></li>
        <li class="bill__item"><span class="contract__important">Koszty: </span><?= $data['bill']['cost_pcent']  ?> %</li>
        <li class="bill__item"><span class="contract__important">PDF:</span>
        <?php if(!is_null($data['bill']['pdf'])){ ?> 
            <a href="?display_bill_pdf=<?= $data['bill']['id'] ?>" target="_blank" ><i class="menu-icon icon-file" ></i>Otwórz</a> 
        <?php } else { ?> 
            Brak
        <?php }  ?>
    </li>
    </ul>
<hr>
<div class="bill__button"> 
<?php if(is_null($data['bill']['pdf'])){ ?>
        <button class="btn btn-default"><a href="?bill_pdf=<?= $data['bill']['id'] ?>">Generuj PDF</a>
        </button>
<?php } else { ?>
    <a href="?delete_bill=<?=$data['bill']['id']?>" class="btn btn-danger">Usuń rachunek</a>
<?php } ?>

        </div>
</div>

