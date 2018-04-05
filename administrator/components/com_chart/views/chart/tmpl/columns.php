<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 4/3/2018
 * Time: 3:47 PM
 */

defined('_JEXEC') or die();

echo "Second form";

//var_dump($this->columnsList);
//var_dump($this->tableName);
?>

<form method="post" action="<?php echo JRoute::_('index.php?option=com_chart&task=save.record')?>" name="adminform" id="adminform">
    <div class="form-horizontal">
        <div class="row-fluid control-group">
            <div class="span6">
                <div class="control-label"><?php echo "Coloana interval de analizat"; ?></div>
            </div>
            <div class="span6 controls">
                <select name="interval">
                    <?php foreach ($this->columnsList as $coloana):?>
                        <option value="<?php echo $coloana->Field;?>"><?php echo $coloana->Field;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="row-fluid control-group">
            <div class="span6">
                <div class="control-label"><?php echo "Coloana subiect"; ?></div>
            </div>
            <div class="span6 controls">
                <select name="subiect">
                    <?php foreach ($this->columnsList as $coloana):?>
                        <option value="<?php echo $coloana->Field;?>"><?php echo $coloana->Field;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="row-fluid control-group">
            <div class="span6">
                <div class="control-label"><?php echo "Coloana valoare de agregat"; ?></div>
            </div>
            <div class="span6 controls">
                <select name="valoare">
                    <?php foreach ($this->columnsList as $coloana):?>
                        <option value="<?php echo $coloana->Field;?>"><?php echo $coloana->Field;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <input type="hidden" name="tablename" value="<?php echo $this->tableName;?>">

        <div class="row-fluid control-group">
            <div class="span6">
                <input type="submit" name="save" value="Validati selectia">
            </div>
            <div class="span6">
                <input type="submit" name="cancel" value="Anulare">
            </div>
        </div>


    </div>
</form>
