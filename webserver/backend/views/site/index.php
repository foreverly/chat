
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin([ 
  'action' => ['site/upload'], //提交地址(*可省略*) 
  'method'=>'post',  //提交方法(*可省略默认POST*) 
  'id' => 'form-save', //设置ID属性 
  'options' => [ 
    // 'class' => 'form-horizontal', //设置class属性 
    'enctype'=>'multipart/form-data'
  ], 
  'enableAjaxValidation' => true, 
  'validationUrl' => 'validate-view', 
]); ?> 
  
<?=$form->field($model,'inputFile[]')->fileInput(['multiple'=>true])?>
  
<?=Html::submitButton('保存',['class'=>'btn btn-primary']); ?> 

<?php ActiveForm::end(); ?> 

<?php
$this->registerJs("
$(function(){ 
  $(document).on('beforeSubmit', 'form#form-save', function (event) { 
    event.preventDefault();
    var form = $(this); 
    //返回错误的表单信息 
    if (form.find('.has-error').length) 
    { 
      return false; 
    } 
    //表单提交 
    $.ajax({ 
      url: form.attr('action'), 
      type: 'post', 
      cache:false,
      data: new FormData($('#form-save')[0]),
      processData: false,
      contentType: false ,
      success: function (response){ 
        if(response.success){ 
          alert('保存成功'); 
          window.location.reload(); 
        } 
      }, 
      error : function (){ 
        alert('系统错误'); 
        return false; 
      } 
    }); 
    return false; 
  }); 
}); 
", \yii\web\View::POS_END);
 ?>

 