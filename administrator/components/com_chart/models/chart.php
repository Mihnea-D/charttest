<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 3/13/2018
 * Time: 10:34 AM
 */

defined('_JEXEC') or die();

class ChartModelChart extends \Joomla\CMS\MVC\Model\AdminModel
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

    public function getTableColumns($table)
    {
        $db = $this->getDbo();

        $query = $db->getQuery(true);
        $query = "DESCRIBE $table";

        $db->setQuery($query);
        $db->execute();

        return $db->loadObjectList();
    }

    public function getForm($data = array(), $loadData = true)
    {
        // TODO: Implement getForm() method.
        $form = $this->loadForm('com_chart.tables', 'tables', array('control'=>'jform'));

        if(empty($form)) return false;

        return $form;
    }

    public function save($data)
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $fields = array($db->qn('tabel').' = '.$db->q("$data[tablename]"),
                        $db->qn('selectie').' = '.$db->q("$data[interval]"),
                        $db->qn('subiect').' = '.$db->q("$data[subiect]"),
                        $db->qn('valoare').' = '.$db->q("$data[valoare]"),
                        );
        $conditions = array($db->qn('id').' = 1');

        $query->update($db->qn('#__chart_datasource'))->set($fields)->where($conditions);

        $db->setQuery($query);

        return $db->execute();
    }
}