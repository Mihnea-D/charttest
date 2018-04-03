<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 3/13/2018
 * Time: 10:30 AM
 */

defined('_JEXEC') or die();

//echo "default layout of Chart View";

//var_dump($this->form->getFieldSet());

//var_dump($this->tableList);

?>

<form method="post" action="<?php echo JRoute::_('index.php?option=com_chart&layout=columns'); ?>" name="adminform" id="adminform">
    <div class="form-horizontal">
        <?php foreach($this->formTables->getFieldSet() as $field) :?>
            <div class="control-group">
                <div class="control-label"><?php echo $field->label; ?></div>
                <div class="controls"><?php echo $field->input; ?></div>
            </div>
        <?php endforeach;?>
        <input type="submit" value="Alegeti coloanele">
    </div>
</form>

