<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 3/13/2018
 * Time: 10:34 AM
 */

defined('_JEXEC') or die();

class ChartModelChart extends \Joomla\CMS\MVC\Model\BaseDatabaseModel
{
    /*
     *
     */
    public function getDatabaseTables()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query = "show tables";

        $db->setQuery($query);
        $db->execute();

        return $db->loadObjectList();
    }
}