<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>


<div class="user-model-channel">

    <h1>渠道数据报表</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <div class="form-group">
            <label>时间范围</label>

            <div class="input-group col-lg-2">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation">
            </div>
        </div>
    </p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th><a href="#" data-sort="mobile">日期</a></th>
                <th><a href="#" data-sort="login_num">渠道</a></th>
                <th><a href="#" data-sort="login_ip">uv(独立ip访问量)</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) {?>
            <tr data-key="15">
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['log_date']?></td>
                <td><?php echo $value['channel']?></td>
                <td><?php echo $value['count']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
$this->registerJs("

", \yii\web\View::POS_END);
?>