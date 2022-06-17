<?php
$dataProvider = new CActiveDataProvider('User');
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'filter'=>$user, 
    'columns' => array(
        array(
            'name' =>'username', 
        )
    ) 
));
?>