
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php $options_new = array(
 		'Type1' => __('<a class="test" href="#" data-toggle="tooltip" data-html="true" data-placement="right" title="<ul><li>test desc one</li><li>test desc two</li></ul>">Type1</a>'),
		'Type2' => __('<a class="test" href="#" data-toggle="tooltip" data-html="true" data-placement="right" title="<ul><li>test desc one</li><li>test desc two</li></ul>">Type2</a>')
		);?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>
<?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary')); ?>

<?php echo $this->Form->end();?>

</div>

<style>

	/* Tooltip */
	.tooltip > .tooltip-inner {
    background-color: #fff; 
    color: #111; 
    border: 1px solid #111; 
    padding: 15px;
  }
  
  /* Tooltip on right */
  .tooltip.right > .tooltip-arrow {
    border-right: 5px solid #111;
  }

.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){

	$('[data-toggle="tooltip"]').tooltip();  

})


</script>
<?php $this->end()?>