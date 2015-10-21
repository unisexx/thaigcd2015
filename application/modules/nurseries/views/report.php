<script type="text/javascript">
$(function(){
	var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'ผลการดำเนินงานโครงการศูนย์เด็กเล็กปลอดโรคปีงบประมาณ',
                x: -20 //center
            },
            subtitle: {
                text: ' ',
                x: -20
            },
            xAxis: {
                categories: ['สคร.1', 'สคร.2', 'สคร.3', 'สคร.4', 'สคร.5', 'สคร.6',
                    'สคร.7', 'สคร.8', 'สคร.9', 'สคร.10', 'สคร.11', 'สคร.12']
            },
            yAxis: {
                title: {
                    text: ' '
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'ศูนย์';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'เข้าร่วมโครงการ',
                //data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                data: [<?php
                		for ($i=1; $i<=12; $i++){
							$nursery[$i] = new Nursery();
							$nursery[$i]->select("COUNT(area_id) AS regis_count")->where("area_id = ".$i)->get();
							echo $nursery[$i]->regis_count.',';
						}
                	?>]
            }, {
                name: 'ผ่านเกณฑ์',
                data: [<?php
                		for ($i=1; $i<=12; $i++){
							$nursery[$i] = new Nursery();
							$nursery[$i]->select("COUNT(area_id) AS status_count")->where("area_id = ".$i." and status = 1")->get();
							echo $nursery[$i]->status_count.',';
						}
                	?>]
            }]
        });
    });
});
</script>
<div id="container"></div>