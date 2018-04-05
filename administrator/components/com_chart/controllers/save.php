<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 4/4/2018
 * Time: 12:54 PM
 */

defined('_JEXEC') or die();

class ChartControllerSave extends \Joomla\CMS\MVC\Controller\BaseController
{
    public function record()
    {
        $app = \Joomla\CMS\Factory::getApplication();
        $data = $app->input->post->getArray();
        var_dump($data);

        if(isset($data['cancel'])) $this->setRedirect(JRoute::_('index.php?option=com_chart'), "Reluati operatia");

        if($data['save'])
        {
            $model = $this->getModel();
            if($model->save($data)) $this->setRedirect(JRoute::_('index.php?option=com_chart'), "Informatiile au fost salvate");
        }

    }
}