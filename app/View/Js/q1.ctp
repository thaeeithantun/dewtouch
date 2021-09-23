<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover" id="assets">
<thead>
	<th>
		<span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false"><i class="icon-plus"></i></span>
	</th>
	<th>Description</th>
	<th>Quantity</th>
	<th>Unit Price</th>
</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td style="width: 40%;" class="description" data-id="1"><div></div></td>
			<td style="width: 20%;" class="quantity" data-id="1"><div></div></td>
			<td style="width: 20%;" class="unitprice" data-id="1"><div></div></td>
		</tr>
	</tbody>
</table>

<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>


<style>
	td {
		height: 20px;
	}
	td div {
	width: 100%;
	height: 100%;
}
</style>


<?php $this->start('script_own');?>
<script>
$(document).ready(function(){
	var lineNo = 2

	$('#assets').on('click', 'div', function() {
        var $e = $(this).parent();
		className = $e.attr('class')
		id = $e.data('id')
        if(className === 'description') {
            var val = $(this).html();
			$e.html('<textarea name="data['+id+']['+className+']" class="m-wrap  description required" rows="2" >'+val+'</textarea>')
            var $newE = $e.find('textarea');
            $newE.focus();
        } else {
			var val = $(this).html();
            $e.html('<input type="text" name="data['+id+']['+className+']" value="'+val+'" />');
            var $newE = $e.find('input');
            $newE.focus();
		}
        $newE.on('blur', function() {
            $(this).parent().html('<div>'+$(this).val()+'</div>');
        });
    });
    
	
	$("#add_item_button").click(function(){
		markup = '<tr> <td>'+lineNo+'</td> <td style="width: 40%;" class="description" data-id="'+lineNo+'"><div></div></td> <td style="width: 20%;" class="quantity" data-id="'+lineNo+'"><div></div></td> <td style="width: 20%;" class="unitprice" data-id="'+lineNo+'"><div></div></td> </tr>';
		tableBody = $("table tbody");
		tableBody.append(markup);
		lineNo++;
	});

	
});
</script>
<?php $this->end();?>

