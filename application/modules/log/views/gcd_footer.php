<div id="footer">
	<ul>
    	<li><a href="home">หน้าแรก</a></li>
        <li>-</li>
        <li><a href="pages/aboutus">เกี่ยวกับสำนัก</a></li>
        <li>-</li>
        <li><a href="executives">ผู้บริหาร</a></li>
        <li>-</li>
        <li><a href="groups">กลุ่มงาน</a></li>
        <li>-</li>
        <li><a href="knowledges/17">ความรู้เรื่องโรคติดต่อ</a></li>
        <li>-</li>
        <li><a href="#">ดาวน์โหลด</a></li>
        <li>-</li>
        <li><a href="pages/contactus">ติดต่อสอบถาม</a></li>
    </ul>
    
    <div class="banner-w3c">
    
    <a href="#">
    <img src="themes/thaigcd2015/images/icon-w3c.png" width="68" height="24" />
    </a>
    &nbsp;&nbsp;
    <a href="#">
    <img src="themes/thaigcd2015/images/icon-thaiwebAccessibility.png" width="99" height="25" />
    </a>
    
    </div>
    
    <div class="address">
    88/21 สำนักโรคติดต่อทั่วไป กรมควบคุมโรค ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000 โทรศัพท์. 02 590 3162 อีเมล์ 
    
    <a href="mailto:nhubenja@gmail.com" target="_blank">nhubenja@gmail.com</a>
    
    <br>
<span class="Copyright">Copyright @ 2015 www.thaigcd.ddc.moph.go.th All Rights Reserved. 

<a href="pages/view/70" class="linkpolicy">PrivacyPolicy</a> | 

<a href="pages/view/71" class="linkpolicy">WebsitePolicy</a> | 

<a href="pages/view/72" class="linkpolicy">WebsiteSecurityPolicy</a>

</span>

</div>

</div>

<div class="shadow-footer">&nbsp;</div>

<!-- <div class="visitor">
	ผู้เข้าชมวันนี้ <?=$todayip?> คน, ผู้เข้าชมเดือนนี้ <?=$monthip?> คน, ผู้เข้าชมปีนี้ <?=$yearip?> คน,
     เริ่มเก็บสถิติวันที่ <?=mysql_to_th($beginip)?>    
	 <span class="visitorAll">
	 
	 <a href="log/lists">ดูสถิติทั้งหมด</a>
	 
	 </span>
</div> -->

<!-- analytics stat -->
<div class="visitor">
	ผู้เข้าชมวันนี้ <span id="col-today" width="80"></span> คน, 
	ผู้เข้าชมเดือนนี้  <span id="col-month" width="80"></span> คน, 
	ผู้เข้าชมปีนี้  <span id="col-total" width="80"></span> คน,
</div>
<script src="media/js/gaApi.js" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        gaApi('<?php echo $today; ?>', '#col-today');
        gaApi('<?php echo $month; ?>', '#col-month');
        gaApi('<?php echo $total; ?>', '#col-total');
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
<!-- analytics stat -->

<!------------------------------------------------------------END FOOTER------------------------------------------------------>