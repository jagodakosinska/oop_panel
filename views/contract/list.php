
<div class='page-header'>
        <h1><?= $data['page_title'] ?></h1>
    </div>

<?php 
// dump($data);

foreach($data['all_contracts'] as $cont){
    ?>

<ul class="employee__list">
    <li class="employee__item"><a href="?show_cont_item=<?= $cont['id'] ?>" ><?= $cont['full_number'] ?></a></li>
</ul>


<?php } ?>
