<h1></h1>

<?php 
$this->widget('zii.widgets.grid.CGridView', [
    'itemsCssClass' => 'table table-striped',
    'dataProvider' => $user->search(),
    'filter' => $user,
    'columns' => [
        'id',
        'username',
        'email',
        [
            'class' => 'CButtonColumn'
        ]
    ] 
]); 

