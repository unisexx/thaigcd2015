    <ul>
 		<?php
 		$no=0; 
 		foreach($Banner as $item): 
            $no++;            
            $padd = $no==5 ? "padding-right: 0px!important;" : "padding-right: 22px;";
            $no = $no==5 ? 0 : $no;
 		?>   
        <li style="<?php echo $padd;?>">
        
	        <a href="<?php echo $item->url; ?>">
	        
	        	<img src="themes/thaigcd2015/images/<?php echo $item->image; ?>" width="178" height="65" />
	        
	        </a>
        
        </li>
		<?php endforeach;?>   
     
        <!--<li>
        
        <a href="http://support.ddc.moph.go.th/gcd_vaccine_report">
        <img src="themes/thaigcd2015/images/bannerSystem-02.png" width="178" height="65" />
        
        </a>
        
        </li>
        <li>
        
        <a href="http://dpis.ddc.moph.go.th:8080/admin/index.html">
        <img src="themes/thaigcd2015/images/bannerSystem-03.png" width="178" height="65" />
        </a>
        
        </li>
        <li>
        
        <a href="http://www.sasuk12.com/umrak/">
        <img src="themes/thaigcd2015/images/bannerSystem-04.png" width="178" height="65" />
        </a>
        
        </li>
        
        <li style="padding-right:0 !important;">
        
        <a href="http://thaigcd.ddc.moph.go.th/asset_gcd/user/admin/user/index">
        
        <img src="themes/thaigcd2015/images/bannerSystem-05.png" width="178" height="65" />
        
        </a>
        
        </li>
        <li>
        
        <a href="http://thaigcd.ddc.moph.go.th/human_new/index.php">
        <img src="themes/thaigcd2015/images/bannerSystem-06.png" width="178" height="65" />
        </a>
        
        </li>
        <li>
        
        <a href="http://thaigcd.ddc.moph.go.th/meetings">
        <img src="themes/thaigcd2015/images/bannerSystem-07.png" width="178" height="65" />
        </a>
        
        </li>
        <li>
        
        <a href="http://thaigcd.ddc.moph.go.th/docs">
        <img src="themes/thaigcd2015/images/bannerSystem-08.png" width="178" height="65" />
        </a>
        
        </li>
        <li>
        
        <a href="http://thaigcd.ddc.moph.go.th/documents">
        <img src="themes/thaigcd2015/images/bannerSystem-09.png" width="178" height="65" />
        </a>
        
        </li>
        <li style="padding-right:0 !important;">
        
        <a href="http://thaigcd.ddc.moph.go.th/calendars">
        
        <img src="themes/thaigcd2015/images/bannerSystem-10.png" width="178" height="65" />
        
        </a>
        
        </li>-->
        
    </ul>