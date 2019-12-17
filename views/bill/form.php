<div class="span9">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Nowy rachunek:</h3>
                </div>
                <div class="module-body">
<?php  // dump($data) ; ?>
                    <br />
                    <form method="post" action="?">
    <div class="module-body">
                    <div class="control-group">
                        <label class="control-label" for="date">Data wystawienia</label>
                        <div class="controls">
                            <input type="date" name="bill[bill_date]" value="<?= $this->check_form('bill_date', $data['bill']) ?>" class="span8 tip">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="netto">Kwota netto</label>
                        <div class="controls">
                            <input type="text" name="bill[netto]" value="<?= $this->check_form('netto', $data['bill'])  ?>" class="span8 tip">
                        </div>
                    </div>
                    </div>
                
                <input class="form-control" type="hidden" name="bill[cont_id]" value="<?= $this->check_form('cont_id', $data) ?>">
                <input class="form-control" type="hidden" name="bill[cost_pcent]" value="<?= $this->check_form('cost_pcent', $data) ?>">
                <input class="form-control" type="hidden" name="bill[bank_transfer]" value="<?= $this->check_form('bank_transfer', $data) ?>">
                <hr>
        <input class="btn btn-hover btn-block" name="<?= $data['submit'] ?>" type="submit" value="<?= $data['value'] ?>">
        </form>
        
                </div>
            </div>
        </div>
       
    </div>

