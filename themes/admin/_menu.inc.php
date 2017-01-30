<ul class="menu">
	<?php if(is_publish('coverpages')): ?><li <?php echo menu_active('coverpages','coverpages')?> ><a href="coverpages/admin/coverpages">หน้าแรก</a></li><?php endif; ?>
	<?php if(is_superadmin()): ?>
	<li <?php echo menu_active('dashboards','dashboards')?>><a href="dashboards/admin/dashboards">สถิติโดยรวม</a></li>
	<li <?php echo menu_active('dashboards','overview')?>><a href="dashboards/admin/overview">สถิติเนื้อหาแบ่งตามกลุ่มงาน</a></li>
	<?php endif; ?>
	<li <?php echo menu_active('users','profiles')?>><a href="users/admin/profiles">ประวัติ</a></li>
	<?php if(is_publish('users')): ?><li <?php echo menu_active('users','users')?>><a href="users/admin/users">สมาชิก</a></li><?php endif; ?>
	<?php if(is_publish('levels')): ?><li <?php echo menu_active('users','levels')?>><a href="users/admin/levels">สิทธิการใช้งาน</a></li><?php endif; ?>
	<?php if(is_publish('groups')): ?><li <?php echo menu_active('groups','groups')?>><a href="groups/admin/groups">กลุ่มงาน</a></li><?php endif; ?>
	<?php if(is_publish('agencies')): ?><li <?php echo menu_active('agencies','agencies')?>><a href="agencies/admin/agencies">หน่วยงาน</a></li><?php endif; ?>

	<!-- <li><a href="executives/admin/histories">เกี่ยวกับผู้บริหาร</a></li> -->
	<!-- <?php if(is_publish('executives')): ?><li <?php echo menu_active('executives','executives')?>><a href="executives/admin/executives">ข่าวสารผู้บริหาร</a> <?php echo anchor('executives/admin/executives?status=draft',draft('executive'),'class="nopadding"') ?></li><?php endif; ?> -->
		
	<?php if(is_publish('informations')): ?><li <?php echo menu_active('informations','informations')?>><a href="informations/admin/informations">ข่าวประชาสัมพันธ์</a> <?php echo anchor('informations/admin/informations?status=draft',draft('information'),'class="nopadding"') ?></li><?php endif; ?>
	<?php if(is_publish('notices')): ?><li <?php echo menu_active('notices','notices')?>><a href="notices/admin/notices">ประกาศ/จัดจ้าง</a> <?php echo anchor('notices/admin/notices?status=draft',draft('notice'),'class="nopadding"') ?></li><?php endif; ?>
	<?php if(is_publish('laws')): ?><li <?php echo menu_active('laws','laws')?>><a href="laws/admin/laws">กฎหมายที่เกี่ยวข้อง</a><?php echo anchor('laws/admin/laws?status=draft',draft('law'),'class="nopadding"') ?></li><?php endif; ?>
	<?php if(is_publish('mediapublics')): ?><li <?php echo menu_active('mediapublics','mediapublics')?>><a href="mediapublics/admin/mediapublics">สื่อเผยแพร่</a> <?php echo anchor('mediapublics/admin/mediapublics?status=draft',draft('mediapublic'),'class="nopadding"') ?></li><?php endif; ?>

	<?php if(is_publish('downloads')): ?><li <?php echo menu_active('downloads','downloads')?>><a href="downloads/admin/downloads">ดาวน์โหลด</a> <?php echo anchor('downloads/admin/downloads?status=draft',draft('download'),'class="nopadding"') ?></li><?php endif; ?>

	<!--<?php if(is_publish('academics')): ?><li <?php echo menu_active('academics','academics')?>><a href="academics/admin/academics">ศูนย์รวมวิชาการ</a> <?php echo anchor('academics/admin/academics?status=draft',draft('academic'),'class="nopadding"') ?></li><?php endif; ?>-->

	<?php if(is_publish('knowledges')): ?><li <?php echo menu_active('knowledges','knowledges')?>><a href="knowledges/admin/knowledges">ความรู้วิชาการ</a> <?php echo anchor('knowledges/admin/knowledges?status=draft',draft('knowledge'),'class="nopadding"') ?></li><?php endif; ?>
	<?php if(is_publish('polls')): ?><li <?php echo menu_active('polls','polls')?>><a href="polls/admin/polls">โพล</a></li><?php endif; ?>
	<?php if(is_publish('galleries')): ?><li <?php echo menu_active('galleries','categories')?>><a href="galleries/admin/categories">ภาพถ่ายกิจกรรม</a> <?php echo anchor('galleries/admin/categories?status=draft',draft('category'),'class="nopadding"') ?></li><?php endif; ?>
	<?php if(is_publish('weblinks')): ?><li <?php echo menu_active('weblinks','weblinks')?>><a href="weblinks/admin/weblinks">เว็บลิ้งค์</a></li><?php endif; ?>
	<?php if(is_publish('faqs')): ?><li <?php echo menu_active('faqs','faqs')?>><a href="faqs/admin/faqs">คำถามที่ถามบ่อย</a></li><?php endif; ?>
	<?php if(is_publish('mediafiles')): ?><li <?php echo menu_active('mediafiles','mediafiles')?>><a href="mediafiles/admin/mediafiles">สื่อมัลติมีเดีย</a> <?php echo anchor('mediafiles/admin/mediafiles?status=draft',draft('mediafile'),'class="nopadding"') ?></li><?php endif; ?>
		
	<!-- <?php if(is_publish('newsletters')): ?><li <?php echo menu_active('newsletters','newsletters')?>><a href="newsletters/admin/newsletters">แจ้งข่าวสารทางอีเมล์</a></li><?php endif; ?> -->
		
	<!-- <?php if(is_publish('webboard_quizs')): ?><li <?php echo menu_active('webboards','categories')?>><a href="webboards/admin/categories">เว็บบอร์ด</a></li><?php endif; ?>
	<?php if(is_publish('chats')): ?><li <?php echo menu_active('chats','chats')?>><a href="chats/admin/chats">แชตออนไลน์</a></li><?php endif; ?> -->
		
	<?php if(is_publish('pages')): ?><li <?php echo menu_active('pages','pages')?>><a href="pages/admin/pages">หน้าเพจ</a></li><?php endif; ?>
	<?php if(is_publish('calendars')): ?><li <?php echo menu_active('calendars','calendars')?>><a href="calendars/admin/calendars">ปฎิทินกิจกรรม</a></li><?php endif; ?>
	<?php if(is_publish('hilights')): ?><li <?php echo menu_active('hilights','hilights')?>><a href="hilights/admin/hilights">ไฮไลท์</a> <?php echo anchor('hilights/admin/hilights?status=draft',draft('hilight'),'class="nopadding"') ?></li><?php endif; ?>
	<?php if(is_publish('contacts')): ?><li <?php echo menu_active('contacts','contacts')?>><a href="contacts/admin/contacts">ติดต่อสอบถาม</a></li><?php endif; ?>
	<?php if(is_publish('menus')): ?><li <?php echo menu_active('menus','menus')?>><a href="menus/admin/menus">เมนู</a> <?php echo anchor('menus/admin/menus?status=draft',draft('menu'),'class="nopadding"') ?></li><?php endif; ?>
	<?php if(is_publish('blogs')): ?><li <?php echo menu_active('blogs','blogs')?>><a href="blogs/admin/blogs">แจ้งลบความคิดเห็นเว็บบล็อค</a></li><?php endif; ?>
	<?php if(is_publish('information_alerts')): ?><li <?php echo menu_active('informations','information_alerts')?>><a href="informations/admin/information_alerts">แจ้งลบความคิดเห็นข่าว</a></li><?php endif; ?>
	<?php if(is_publish('listperpages')): ?><li <?php echo menu_active('listperpages','listperpages')?>><a href="listperpages/admin/listperpages">จัดการลิสต์</a></li><?php endif; ?>

	<?php

	if(is_publish('registers')):

	?>

		<li <?php echo menu_active('registers','registers')?>>

			<a href="registers/admin/registers">ใบสมัครศูนย์เด็กเล็กปลอดโรค</a>

		</li>

	<?php endif; ?>

	<?php

	//if(is_publish('modules_infograph')):

	?>

		<li <?php //echo menu_active('modules_infograph','modules_infograph')?>>

			<a href="modules_infograph/admin/modules_infograph/index">infographics</a>

		</li>

	<?php //endif; ?>


	<?php

	//if(is_publish('indicators_type')):

	?>

		<li <?php //echo menu_active('indicators_types','indicators_types')?>>

			<a href="indicators_types/admin/indicators_types/index">ประเภทตัวชี้วัด</a>

		</li>

	<?php //endif; ?>


	<?php

	//if(is_publish('indicators')):

	?>

		<li <?php //echo menu_active('indicators','indicators')?>>

			<a href="indicators/admin/indicators/index">ตัวชี้วัด</a>

		</li>

	<?php //endif; ?>

	<?php

	//if(is_publish('yearbook')):

	?>

		<li <?php //echo menu_active('yearbook','yearbook')?>>

			<a href="yearbook/admin/yearbook/index">รายงานประจำปี</a>

		</li>

	<?php //endif; ?>


	<?php

	//if(is_publish('coverpages_banner')):

	?>

		<li <?php //echo menu_active('coverpages_banner','coverpages_banner')?>>

			<a href="coverpages_banner/admin/coverpages_banner/index">แบนเนอร์หน้าแรก</a>

		</li>

	<?php //endif; ?>
    
    
	<?php

	//if(is_publish('coverpages_banner')):

	?>

		<li <?php //echo menu_active('coverpages_banner','coverpages_banner')?>>

			<a href="executives/admin/executives/index_polls">รับเรื่องร้องเรียน</a>

		</li>

	<?php //endif; ?>
    
    
	<?php

	if(is_publish('english_zones')):

	?>

		<li <?php echo menu_active('english_zones','english_zones')?>>

			<a href="english_zones/admin/english_zones">English Zone</a>

		</li>

	<?php endif; ?>

</ul>
