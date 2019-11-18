<div class='page-header'>
<h1><?= $data['page_title'] ?></h1>
    </div>
<?php //var_dump($this) ?>
<div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                  <?php if(!empty($data['errors'])){
                      foreach($data['errors'] as $error) {?>
                    <div class="alert alert-danger">
                       <?= $error ?>
                    </div>
                <?php  }  } ?>
                </div>
                <div class="module-body">

                <form method="post" action="?">

                <input type="hidden" name="id" value="<?= $this->check_form('id', $data['emp']) ?>"?>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Imię</label>
                        <div class="controls">
                            <input type="text" name="emp[fname]" value="<?= $this->check_form('fname', $data['emp']) ?>" class="span8 tip">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Nazwisko</label>
                        <div class="controls">
                            <input type="text" name="emp[lname]" value="<?= $this->check_form('lname', $data['emp']) ?>" class="span8 tip">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Miejsce urodzenia</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <input class="span8 tip" type="text" name="emp[birth_place]" value="<?= $this->check_form('birth_place', $data['emp']) ?>">

                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Data urodzenia</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="date" name="emp[birth_date]" value="<?= $this->check_form('birth_date', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="control-group">
                        <label class="control-label" for="basicinput">Imię ojca</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="father_fname" value="<?= $this->check_form('father_fname', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Imię matki</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="mother_fname" value="<?= $this->check_form('mother_fname', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="control-group">
                        <label class="control-label" for="basicinput">PESEL</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="pesel" value="<?= $this->check_form('fname', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="control-group">
                        <label class="control-label" for="basicinput">NIP</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="nip" value="<?= $this->check_form('nip', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div> -->

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Miejscowość</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="emp[city]" value="<?= $this->check_form('city', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="control-group">
                        <label class="control-label" for="basicinput">Dzielnica / Gmina</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="district" value="<?= $this->check_form('district', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div> -->
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Ulica</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="emp[street]" value="<?= $this->check_form('street', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Nr domu</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="emp[street_nr]" value="<?= $this->check_form('street_nr', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Nr mieszkania</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="emp[home_nr]" value="<?= $this->check_form('home_nr', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="basicinput">Kod pocztowy</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="emp[zip]" value="<?= $this->check_form('zip', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="control-group">
                        <label class="control-label" for="basicinput">Poczta</label>
                        <div class="controls">  
                            <div class="input-append">
                                <input type="text" name="post" value="<?= $this->check_form('post', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="control-group">
                        <label class="control-label" for="basicinput">Adres koresp.</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="address" value="<?= $this->check_form('address', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div> -->
                    <!-- </div>
                    <div class="control-group">
                        <label class="control-label" for="basicinput">Urząd Skarbowy</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" name="us_address" value="<?= $this->check_form('us_address', $data['emp']) ?>" class="span8 tip">
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="control-group">
                        <label class="control-label" for="basicinput">Nr kont</label>
                        <div class="controls">
                            <input type="text" name="bank_acc" id="basicinput" class="span8" value="<?= $this->check_form('bank_acc', $data['emp']) ?>">
                        </div> -->
                    <!-- </div> -->
                    <div class="control-group">
                        <label class="control-label">Koszty %</label>
                        <div class="controls">
                        <label class="radio inline">
                                <input type="radio" name="emp[cost_pcent]" id="optionsRadios1" value="20" checked="">
                                20%
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="emp[cost_pcent]" id="optionsRadios2" value="50">
                                50%
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Forma zapłaty</label>
                        <div class="controls">
                        <label class="radio inline">
                                <input type="radio" name="emp[bank_transfer]" id="optionsRadios1" value="1" checked="">
                                przelew
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="emp[bank_transfer]" id="optionsRadios2" value="0">
                                gotówka
                            </label>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Rodzaj umowy</label>
                        <div class="controls">
                            <label class="radio inline">
                                <input type="radio" name="emp[task_contract]" id="optionsRadios1" value="D" checked="">
                                dzieło
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="emp[task_contract]" id="optionsRadios2" value="Z">
                                zlecenie
                            </label>
                        </div>
                    </div>
<hr>
                    
                            <input class="btn btn-hover btn-block"  name="<?=  $data['submit']  ?>" type="submit" value="<?=  $data['value']  ?>" />
                           
                   
                            </form>
                </div>
            </div>



        </div>
        <!--/.content-->
    </div>
    <!--/.span9-->