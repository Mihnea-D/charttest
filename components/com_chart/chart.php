<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 12/28/2017
 * Time: 1:35 PM
 */


defined('_JEXEC') or die();

//echo "Site section: message from chart.php";

$controller = Joomla\CMS\MVC\Controller\BaseController::getInstance('Chart');
$task = \Joomla\CMS\Factory::getApplication()->input->get('task');

$controller->execute($task);
$controller->redirect();