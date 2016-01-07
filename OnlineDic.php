<form class="am-form">
	<input id='in' oninput='showValue(this.value)' onPropertyChange="showValue(this.value)" type="text">
</form>
<div id='divid' class="am-g" style="text-align:center;font-size:30px;">
	
</div>
<script> 
function showValue(obj){ 
	$.AMUI.progress.start();
	$("#divid").load("fanyi.php?word="+escape(obj));
	$.AMUI.progress.done();
} 
</script> 
