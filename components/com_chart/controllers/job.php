<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 2/27/2018
 * Time: 3:12 PM
 */

defined('_JEXEC') or die();

class ChartControllerJob extends \Joomla\CMS\MVC\Controller\BaseController
{
    /*
     * Name of the model method to be executed
     * The model method is called bu the executeJob() method of this controller
     */
    protected $job;

    public function average()
    {
        $this->job = "getAggregateAvg";
        $this->executeJob();
    }

    public function count()
    {
        $this->job = "getAggregateCount";
        $this->executeJob();
    }

    public function minimum()
    {
        $this->job = "getAggregateMin";
        $this->executeJob();
    }

    public function maximum()
    {
        $this->job = "getAggregateMax";
        $this->executeJob();
    }

    public function sum()
    {
        $this->job = "getAggregateSum";
        $this->executeJob();
    }

    public function percentage()
    {
        $this->job = "getPercentage";
        $this->executeJob();
    }

    /*
     * Reads from the http request the limits start and end between which are the data extracted
     * Reads from the protected variable $job the name of the model method that must be called.
     * The name of the method is previous written into the variable $job by the task.
     * Initialize the model, calls the job method
     * Initialize the view, push the model into the view, calls display() method of the view
     */
    public function executeJob()
    {
        $app = \Joomla\CMS\Factory::getApplication();
        $start = $app->input->get('start', 0, 'int');
        $end = $app->input->get('end', 0, 'int');
        $job = $this->job;

        $model = $this->getModel('Chart', 'ChartModel');
        $model->$job($start, $end);

        $view = $this->getView('Chart', 'html', 'ChartView');
        $view->setModel($model);
        $view->display();
    }
}