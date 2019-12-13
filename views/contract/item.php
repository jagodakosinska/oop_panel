<div class='page-header'>
        <h1 class="contract__title"><?= $data['emp']['fname'] ?> <?= $data['emp']['lname'] ?></h1>
    </div>

<?php 
//var_dump($data);

    ?>

<ul class="employee__list">
    
    <li class="employee__item"><span>Numer umowy: </span><?= $data['cont']['full_number'] ?></li>
    <li class="employee__item"><span>Data rozpoczęcia umowy: </span><?= $data['cont']['bdate'] ?></li>
    <li class="employee__item"><span>Data zakończenia umowy: </span><?= $data['cont']['edate'] ?></li>
    <li class="employee__item"><span>Przedmiot umowy: </span><?= $data['cont']['title'] ?></li>

</ul>
<div class="contract__button">
<a class="btn btn-primary"  href="?edit_emp=<?= $data['cont']['id'] ?>">Edycja</a>
</div>