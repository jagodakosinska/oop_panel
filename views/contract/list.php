
<div class="container">
    <div class='page-header'>
        <h1><?= $data['page_title'] ?></h1>
    </div>

<?php 


foreach($data['all_contracts'] as $cont){
    ?>

<ul class="contract__list">
    <li class="contract__item"><a href="?show_cont_item=<?= $cont['id'] ?>" ><?= $cont['full_number'] ?></a></li>
</ul>


<?php } ?>
</div>