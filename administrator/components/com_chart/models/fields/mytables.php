<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 3/30/2018
 * Time: 3:56 PM
 */

defined('_JEXEC') or die();

JFormHelper::loadFieldClass('list');

class JFormFieldMytables extends JFormFieldList
{
    protected $type = "Mytables";

    public function getOptions()
    {
        $db = \Joomla\CMS\Factory::getDbo();
        $query = $db->getQuery(true);

        $query = "SHOW TABLES";
        //$query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'charttest' ";

        $db->setQuery($query);
        $db->execute();

        $tables = $db->loadObjectList();
        $options = array();

        if($tables)
        {
            foreach($tables as $table)
            {
                $options[] = JHtml::_('select.option', $table->Tables_in_charttest);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;


    }
}