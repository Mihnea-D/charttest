<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 12/28/2017
 * Time: 1:35 PM
 */

//echo "Administrator section: message from chart.php";

defined('_JEXEC') or die();

$controller = \Joomla\CMS\MVC\Controller\BaseController::getInstance('Chart');
$app = \Joomla\CMS\Factory::getApplication();
$task = $app->input->get('task');
$controller->execute($task);
$controller->redirect();