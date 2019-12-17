<div class="container">
<div class="span9">
    <div class="content">
    <div class='page-header'>
<h1><?= $data['page_title'] ?></h1>
    </div>
        <div class="module">
            <div class="module-head">
                <h3>Nowa umowa:</h3>
            </div>
            <div class="module-body">
<?php // dump($data) ?> 
                <br />
                <form method="post" action="?">

                <div class="control-group">
                    <label class="control-label" for="bdate">Data rozpoczęcia umowy</label>
                    <div class="controls">
                        <input type="date" name="cont[bdate]" value="<?= $this->check_form('bdate', $data['cont'])  ?>" class="span8 tip">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="edate">Data zakończenia umowy</label>
                    <div class="controls">
                        <input type="date" name="cont[edate]" value="<?= $this->check_form('edate', $data['cont'])  ?>" class="span8 tip">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="title">Tytuł</label>
                    <div class="controls">
                        <textarea type="text" name="cont[title]" value="<?= $this->check_form('title', $data['cont'])  ?>" class="span8 tip"></textarea>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?= $data['id'] ?>"?>
                <input class="form-control" type="hidden" name="cont[uid]" value="<?=  $data['uid']  ?>">

                <input class="form-control" type="hidden" name="cont[task]" value="<?=  $data['task']  ?>">
                <hr>
                <input class="btn btn-hover btn-block" name="<?=  $data['submit']  ?>" type="submit" value="<?=  $data['value']  ?>" />
            </div>
        </div>
        </form>
    </div>

</div>
</div>