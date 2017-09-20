/*
 * Author: iyottt@gmail.com
 * ver: 2.0.0
 *
 * ตัวอย่างการใช้งาน
 * HTML
 * <span id="today"></span> วันนี้ <span id="gaToday">-</span> คน &nbsp;
 * <span id="month"></span> เดือนนี้ <span id="gaMonth">-</span> คน &nbsp;
 * <span id="all"></span> ทั้งหมด <span id="gaTotal">-</span> คน
 * JS
 * $(function(){
 * <?php $ga = new Analytics(); ?>
 * gaApi('<?php echo $ga->getToday(); ?>', '#gaToday');
 * gaApi('<?php echo $ga->getMonth(); ?>', '#gaMonth');
 * gaApi('<?php echo $ga->getTotal(); ?>', '#gaTotal');
 * });
 */

function gaApi(apiUrl, target) {
    $.ajax({
        dataType: "json",
        url: apiUrl,
        success: function (data) {
            $(target).text(data.totalsForAllResults[data.columnHeaders[0].name].replace(/(.)(?=(\d{3})+$)/g,'$1,'));
        },
        error: function(xhr, status) {
            gaApi(apiUrl, tableId);
        }
    });
}
