<div class="navbar">
    <div class="container">

        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
            <i class="icon-reorder shaded"></i></a><a class="brand" href="?">Home </a>
        <div class="nav-collapse collapse navbar-inverse-collapse">
            <ul class="nav nav-icons">
            </ul>
            <div class="span3">
                    <ul class="widget widget-menu unstyled">
                        <li><a href="#"><i class="menu-icon icon-tasks"></i>Year
                                <select id='select_year' class="select_year">
                                    <?php 
                                    
                                    for ($i = $data['params']['start_year']; $i <= $data['params']['end_year']; $i++) {
                                        $selected = ($i == $data['year']) ? "selected='selected'" : '';  ?>
                                        <option <?= $selected ?>> <?= $i ?> </option> 
                                        
                                    <?php }
                                    ?>
                                          
                                </select> </a></li>

                    </ul>
                    <!--/.widget-nav-->
                </div>
          
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">

                    <li><a href="?add_emp">Dodaj Pracownika</a></li>
                    <li><a href="?">Employees
                    <li><a href="?show_contracts">Umowy</a></li>
                    <li><a href="">Rachunki</a></li>
                  
                            </a></li>
                </ul>
            </div><!-- /.nav-collapse -->
            

        </div>
        <!-- /.nav-collapse -->

    </div>

    </div>
<!-- /navbar -->
<?php //dump($i) ?>
<hr>