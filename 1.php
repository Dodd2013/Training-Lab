<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div id="div1"></div>
	<script src="assets/js/jquery.min.js"></script>
  	<script src='js/highcharts.js'></script>
	<script type="text/javascript">
		function parseArrayInt(data){
			var dat=new Array();
			for (var i = data.length - 1; i >= 0; i--) {
				dat[i]=parseInt(data[i]);
			};
			return dat;
		}
		 function display(div,categoriesstr,datastr) {
		 	var categorie=categoriesstr.split(',');
		 	var dat=parseArrayInt(datastr.split(','));

		    $(div).highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: ''
		        },
		        xAxis: {
		            categories: categorie
		        },
		        yAxis: {
		            min: 0,
		            title: {
		                text: 'Rainfall (mm)'
		            }
		        },
		        tooltip: {
		            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
		            footerFormat: '</table>',
		            shared: true,
		            useHTML: true
		        },
		        plotOptions: {
		            column: {
		                pointPadding: 0.2,
		                borderWidth: 0
		            }
		        },
		        credits: {
		                  enabled:false
		        },
		        series: [{
		            name: 'Tokyo',
		            data: dat

		        }]
		    });
		}
		//display('#div1',"'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug'","");
	</script>
	<div id='dispaly40'></div>
	<script type="text/javascript">
	//display('#display40',"'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug'","");
	display('#display40',"'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug'","");
	</script>
</body>
</html>