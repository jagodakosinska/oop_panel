
<div class="container">
    <div class='page-header'>
        <h1><?= $data['page_title'] ?></h1>
    </div>

<?php 


foreach($data['all_bills'] as $bill){
    ?>

<ul class="bill__list">
    <li class="bill__item"><a href="?show_bill_item=<?= $bill['id'] ?>" ><?= $bill['full_number'] ?></a></li>
</ul>


<?php } ?>
</div>