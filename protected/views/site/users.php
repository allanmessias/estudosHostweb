<?php
$dataProvider = new CActiveDataProvider('User');
$this->widget('zii.widgets.grid.CGridView', [
    'dataProvider' => $dataProvider, 
]);
?>