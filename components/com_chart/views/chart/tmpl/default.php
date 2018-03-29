<?php
/**
 * Created by PhpStorm.
 * User: SKEPSIS-DEV40
 * Date: 12/28/2017
 * Time: 2:29 PM
 */

defined('_JEXEC') or die();

//$resultList = $this->model->getCount(4, 7);

//var_dump($this->resultList);
$resultList = $this->resultList;

if($resultList)
{
    $minX = $resultList[0]['abscisa'];
    $maxX = 0;
    $minY = $resultList[0]['ordonata'];
    $maxY = 0;
}

foreach ($resultList as $point)
{
    if($point['abscisa'] < $minX) $minX = $point['abscisa'];
    if($point['ordonata'] < $minY) $minY = $point['ordonata'];
    if($point['abscisa'] > $maxX) $maxX = $point['abscisa'];
    if($point['ordonata'] > $maxY) $maxY = $point['ordonata'];
    //echo "abscisa = ".$point['abscisa']; echo " - ordonata = ".$point['ordonata']."</br>";
}

//var_dump($minX);var_dump($maxX); var_dump($minY); var_dump($maxY);

?>


<style>
    #mycanvas
    {
        width: 100%;
        height : 100%;
        border : 1px solid;
        background-color : #f2e376;
        color : #0966e8;
    }
</style>

<canvas id="mycanvas" width = 600 height = 300 >

</canvas>

<script>
    var c = document.getElementById("mycanvas");
    var ctx = c.getContext("2d");

    var W = c.width;
    var H = c.height;

    var xmin = parseInt(<?php echo floor($minX)?>);
    var xmax = parseInt(<?php echo floor($maxX)?>);
    var ymin = parseInt(<?php echo floor($minY)?>);
    var ymax = parseInt(<?php echo floor($maxY)?>);

    var Wxmin = Math.floor(0.11 * W);
    var Wxmax = Math.floor(0.89 * W);
    var Hymin = Math.floor(0.11 * H);
    var Hymax = Math.floor(0.89 * H);

    var xstart = Wxmin + (parseInt(<?php echo floor($resultList[0]['abscisa'])?>) - xmin) * (Wxmax - Wxmin) / (xmax - xmin);
    var ystart = H - (Hymin + (parseInt(<?php echo floor($resultList[0]['ordonata']) ?>) - ymin) * (Hymax - Hymin) / (ymax - ymin));

    var xcurent;
    var ycurent;

    //alert(xmax);

    ctx.beginPath();

    ctx.moveTo(xstart, ystart);

    <?php foreach($resultList as $point) :?>
    xcurent = Wxmin + (parseInt(<?php echo floor($point['abscisa']) ?>) - xmin) * (Wxmax - Wxmin) / (xmax - xmin);
    ycurent = H - (Hymin + (parseInt(<?php echo floor($point['ordonata']) ?>) - ymin) * (Hymax - Hymin) / (ymax - ymin));
    ctx.lineTo(xcurent, ycurent);
    <?php endforeach; ?>

    //drax Oy
    ctx.moveTo(Math.floor(0.1 * W), Math.floor(H - 0.098 * H));
    ctx.lineTo(Math.floor(0.1 * W), Math.floor(H - 0.9 * H));

    //draw Ox
    ctx.moveTo(Math.floor(0.098 * W), Math.floor(H - 0.1 * H));
    ctx.lineTo(Math.floor(0.9 * W), Math.floor(H - 0.1 * H));

    ctx.stroke();

</script>
