<?php
$dataProvider = new CActiveDataProvider('User');
$this->widget('zii.widgets.grid.CGridView', array(
    'itemsCssClass' => 'table table-striped', 
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        'username',
        'email',
        'gerenciamento'
    )
   
));
?>