<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 3/13/2018
 * Time: 10:28 AM
 */

defined('_JEXEC') or die();

class ChartViewChart extends \Joomla\CMS\MVC\View\HtmlView
{
    protected $resultList;

    public function display($tpl = null)
    {
        $model = $this->getModel();
        $this->resultList = $model->getDatabaseTables();
        return parent::display($tpl); // TODO: Change the autogenerated stub
    }
}