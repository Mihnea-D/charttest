<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 12/28/2017
 * Time: 2:29 PM
 */

defined('_JEXEC') or die();

class ChartModelChart extends \Joomla\CMS\MVC\Model\BaseDatabaseModel
{
    protected $table = '#__chart_dummydata';
    protected $abscissa = 'abscisa';
    protected $ordinate = 'ordonata';

    protected $result = array();

    /**
     * index.php?option=com_chart&task=jobToExecute&start=startinterval&end=endinterval
     * start and end represent the limit of the interval for which is the chart drawn
     */

    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $start reprezents the low margin of the abscissa
     * @param string $end reprezents the top margin of the abscissa
     * Aggregate functions group results based on the abscisa values and provide one cumulative
     * value for each abscisa values (within the abscisa limits $start and $end)
     */
    public function getAggregateAvg($start = 0, $end = 0)
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select($db->qn($this->abscissa))
            ->select('avg('.$db->qn($this->ordinate).') as ordonata')
            ->from($db->qn($this->table))
            ->group($db->qn($this->abscissa));

        if($start)
        {
            $query->where($db->qn($this->abscissa).' >= '.$db->q("$start"));
        }
        if($end)
        {
            $query->where($db->qn($this->abscissa).' <= '.$db->q("$end"));
        }

        $db->setQuery($query);
        $db->execute();

        //return $db->loadAssocList();
        $this->result = $db->loadAssocList();
    }

    public function getAggregateMax($start = '', $end = '')
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select($db->qn($this->abscissa))
            ->select('max('.$db->qn($this->ordinate).') as ordonata')
            ->from($db->qn($this->table))
            ->group($db->qn($this->abscissa));

        if($start)
        {
            $query->where($db->qn($this->abscissa).' >= '.$db->q("$start"));
        }
        if($end)
        {
            $query->where($db->qn($this->abscissa).' <= '.$db->q("$end"));
        }

        $db->setQuery($query);
        $db->execute();

        //return $db->loadAssocList();
        $this->result = $db->loadAssocList();
    }

    public function getAggregateMin($start = '', $end = '')
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select($db->qn($this->abscissa))
            ->select('min('.$db->qn($this->ordinate).') as ordonata')
            ->from($db->qn($this->table))
            ->group($db->qn($this->abscissa));

        if($start)
        {
            $query->where($db->qn($this->abscissa).' >= '.$db->q("$start"));
        }
        if($end)
        {
            $query->where($db->qn($this->abscissa).' <= '.$db->q("$end"));
        }

        $db->setQuery($query);
        $db->execute();

        //return $db->loadAssocList();
        $this->result = $db->loadAssocList();
    }

    public function getAggregateCount($start = '', $end = '')
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select($db->qn($this->abscissa))
            ->select('count('.$db->qn($this->ordinate).') as ordonata')
            ->from($db->qn($this->table))
            ->group($db->qn($this->abscissa));

        if($start)
        {
            $query->where($db->qn($this->abscissa).' >= '.$db->q("$start"));
        }
        if($end)
        {
            $query->where($db->qn($this->abscissa).' <= '.$db->q("$end"));
        }

        $db->setQuery($query);
        $db->execute();

        //return $db->loadAssocList();
        $this->result = $db->loadAssocList();
    }

    public function getAggregateSum($start = '', $end = '')
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select($db->qn($this->abscissa))
            ->select('sum('.$db->qn($this->ordinate).') as ordonata')
            ->from($db->qn($this->table))
            ->group($db->qn($this->abscissa));

        if($start)
        {
            $query->where($db->qn($this->abscissa).' >= '.$db->q("$start"));
        }
        if($end)
        {
            $query->where($db->qn($this->abscissa).' <= '.$db->q("$end"));
        }

        $db->setQuery($query);
        $db->execute();

        //return $db->loadAssocList();
        $this->result = $db->loadAssocList();
    }

    public function getPercentage($start = '', $end = '')
    {

        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $subquery = $db->getQuery(true);

        $subquery->select('sum('.$db->qn($this->ordinate).') as total')
            ->from($db->qn($this->table));

        $db->setQuery($subquery);
        $db->execute();
        $total = $db->loadResult();

        $query->select($db->qn($this->abscissa))
            ->select('sum('.$db->qn($this->ordinate).') * 100 / '.$total.' as ordonata')
            ->from($db->qn($this->table))
            ->group($db->qn($this->abscissa));


        if($start)
        {
            $query->where($db->qn($this->abscissa).' >= '.$db->q("$start"));
        }
        if($end)
        {
            $query->where($db->qn($this->abscissa).' <= '.$db->q("$end"));
        }

        $db->setQuery($query);
        $db->execute();

        $this->result = $db->loadAssocList();
    }

    /**
     * @param string $start
     * @param string $end
     * @return mixed
     * The non-Aggregate functions bellow provide a net value for the ordinate axis
     */

    
    public function getLast()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select($db->qn(array($this->abscissa, $this->ordinate)))
            ->from($db->qn($this->table))
            ->order($db->qn('id').' DESC');

        $db->setQuery($query, 0, 1);
        $db->execute();

        //return $db->loadAssoc();
        $this->result = $db->loadAssocList();
    }

}