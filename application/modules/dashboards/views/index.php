<div id="dashboard">
    <form method="get">
    <div style="margin-bottom: 10px; padding:10px 5px; background: #CDE9FF;">
        วันที่ <input type="text" name="start" value="<?php echo DB2Date($start); ?>" class="text datepicker" style="width:100px;text-align:center;">
        ถึง <input type="text" name="end" value="<?php echo DB2Date($end); ?>" class="text datepicker" style="width:100px;text-align:center;">
        <button type="submit"class="btn">ตกลง</button>
    </div>
    </form>

    <h1>ภาพรวมของผู้เข้าชม</h1>
    <div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <div style="width:50%;float:left;">
        <div style="padding:10px">
            <h1>สถิติผู้เข้าชมทั้งหมด</h1>
            <table id="tbl-summary" class="form">
                <tr><th>วันนี้</th><td id="col-today" width="80"></td></tr>
                <tr><th>เดือนนี้</th><td id="col-month"></td></tr>
                <tr><th>ทั้งหมด</th><td id="col-total"></td></tr>
                <tr><th>สถิติระหว่าง วันที่ <?php echo DB2Date($start); ?> ถึง <?php echo DB2Date($end); ?></th><td id="col-totalSearch"></td></tr>
            </table>
        </div>
        <div style="padding:10px;">
            <h1>ประเทศที่เข้าชมสูงสุด 10 อันดับ</h1>
            <table id="tbl-country" class="form"></table>
        </div>
        <div style="padding:10px;">
            <h1>แหล่งที่มาของการเข้าชม</h1>
            <table id="tbl-referrer" class="form"></table>
        </div>
        <div style="padding:10px;">
            <h1>OS ยอดนิยม</h1>
            <table id="tbl-os" class="form"></table>
        </div>
    </div>

    <div style="width:50%;float:right;">
        <div style="padding:10px;">
            <h1>คำค้นยอดนิยม</h1>
            <table id="tbl-keyword" class="form"></table>
        </div>
        <div style="padding:10px;">
            <h1>เนื้อหายอดนิยม</h1>
            <table id="tbl-page" class="form"></table>
        </div>
        <div style="padding:10px;">
            <h1>Browser ยอดนิยม</h1>
            <table id="tbl-browser" class="form"></table>
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="media/js/gaApi.js" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){

        $.ajax({
            dataType: "json",
            url: '<?php echo $report; ?>',
            success: function (data) {
                var result = data.rows.map(function(val,i) {
                     return [val[0].replace( /(\d{4})(\d{2})(\d{2})/, "$3/$2/$1"), parseInt(val[1])];
                });
                console.log(result);
                Highcharts.chart('chart', {
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: 'จำนวนผู้เข้าชม'
                    },
                    xAxis: {
                        labels: {
                            enabled: true,
                            formatter: function() {
                                if(result[this.value] instanceof Array){
                                    return result[this.value][0].substr(0,5);
                                }else{
                                    return result[this.value];
                                }
                            },
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'จำนวนผู้เข้าชม'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: {
                                    x1: 0,
                                    y1: 0,
                                    x2: 0,
                                    y2: 1
                                },
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },
                    series: [{
                        type: 'area',
                        name: 'ผู้เข้าชม',
                        data: result
                    }]
                });
            },
            error: function(xhr, status) {

            }
        });

        gaApi('<?php echo $today; ?>', '#col-today');
        gaApi('<?php echo $month; ?>', '#col-month');
        gaApi('<?php echo $total; ?>', '#col-total');
        gaApi('<?php echo $totalSearch; ?>', '#col-totalSearch');

        gaApiTopDataTable('<?php echo $country; ?>', '#tbl-country');
        gaApiTopDataTable('<?php echo $keyword; ?>', '#tbl-keyword');
        gaApiTopDataTable('<?php echo $referrer; ?>', '#tbl-referrer');
        gaApiTopDataTable('<?php echo $page; ?>', '#tbl-page');
        gaApiTopDataTable('<?php echo $os; ?>', '#tbl-os');
        gaApiTopDataTable('<?php echo $browser; ?>', '#tbl-browser');
    });

    function gaApiTopDataTable(apiUrl, target){
        $.ajax({
            dataType: "json",
            url: apiUrl,
            success: function (data) {
                $.each(data.rows, function(i, item){
                    var row = "<tr><th>"+item[0]+"</th><td width='80'>"+item[1].replace(/(.)(?=(\d{3})+$)/g,'$1,')+"</td></tr>";
                    $(target).append(row);
                });
            },
            error: function(xhr, status) {
                gaApiTopDataTable(apiUrl, target);
            }
        });
    }
</script>
