
<div class='page-header'>
        <h1><?= $data['page_title'] ?></h1>
    </div>

<?php 
// var_dump($data);

foreach($data['all_employees'] as $emp){
    ?>

<ul class="employee__list">
    <li class="employee__item"><a href="?show_emp=<?= $emp['id'] ?>" ><?= $emp['fname'] ?> <?= $emp['lname'] ?></a></li>
</ul>


<?php } ?>
