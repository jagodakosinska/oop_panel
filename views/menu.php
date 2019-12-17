<div class="navbar">
    <div class="container">

        <div class="nav-collapse collapse navbar-inverse-collapse">
        <ul class="nav pull-left">
        <li> <a class="title" href="?">Home
                    </a> </li>
        </ul>
            <ul class="nav pull-right">
               
                <li><a href="?add_emp">Dodaj Pracownika</a></li>
                <li><a href="?show_emp">Pracownicy
                <li><a href="?show_contracts">Umowy</a></li>
                <li><a href="?show_bills">Rachunki</a></li>

                </a></li>
            </ul>
        </div><!-- /.nav-collapse -->


    </div>
</div>
<hr>

<div class="span3">
    <ul class="widget widget-menu unstyled">
        <li><a href="#"><i class="menu-icon icon-tasks"></i>Year
                <select class="select_year">
                    <?php

                    for ($i = $data['params']['start_year']; $i <= $data['params']['end_year']; $i++) {
                        $selected = ($i == $data['year']) ? "selected='selected'" : '';  ?>
                        <option <?= $selected ?>> <?= $i ?> </option>

                    <?php }
                    ?>

                </select> </a></li>
        <li><a href="#"><i class="menu-icon icon-tasks"></i>Month
                <select class="select_month">
                    <?php
                        foreach($data['params']['months'] as $key => $month){ ?>
                        <?php $selected = ($key == $data['month']) ? "selected='selected'" : '';  ?>
                            <option value="<?= $key ?>" <?= $selected ?>> <?= $month ?> </option>
                    <?php }
                    ?>

                </select> </a></li>
    </ul>
    <!--/.widget-nav-->
    <?php // dump($data['month']) ?>
</div>
<!-- /navbar -->