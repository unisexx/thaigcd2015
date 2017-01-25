<span style="margin-left: 30px;">

<?php //echo youtube($video->url,'258','157');?>


<div style="width:258px; height:157px; overflow:hidden;">
<?php echo $video->embed;?>
</div>


</span>

<br>
        <ul>
           <!-- <li style="overflow: hidden;height: 40px;"><?=$video->title?></li>-->
             <li style="overflow: hidden;height: 40px;"><?=lang_decode($video->title)?></li>
            <div class="vdoall">
            
            <!--<a href="executives/video_view/<?=$video->id?>">ดููวีดีโอทั้งหมด</a>-->
            <a href="executives/all_video">ดููวีดีโอทั้งหมด</a>
            
            </div>
      </ul>