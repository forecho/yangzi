<div class="container clearfix mauto">
<div class="i_left">
<div class="contact lian" id="com_singles_contact" editok="online">
联系我们</div>
<div class="mtop"></div>
<div class="left_list" id="com_sort_products" editok="online">
<div><img src="images/t1.gif" /></div>
<ul>
<li><?php echo $selcompany->company;?></li>
<li>电话：<?php echo $selcompany->phone;?></li>
<li>传真：<?php echo $selcompany->fax;?></li>
<li>电子邮件：<?php echo $selcompany->email;?></li>
<li>以安全为基础&nbsp;&nbsp;&nbsp;&nbsp;以质量谋发展</li>
<li>以诚信求生存&nbsp;&nbsp;&nbsp;&nbsp;以技术优先</li>
</ul>
<div><img src="images/bot1.gif" /></div>
</div>
</div>
<!--联系我们结束-->
<div class="i_n_list" id="com_indexistop_news" editok="online">
<div class="i_n_t clearfix">
<ul class="n1">
<li>
<a id="nsmenuid_1" onmouseover="changetab_objdiv('nsmenuid_','nsremark_',1,2,'activetab','')" href="welcome/company" class="activetab"> 公司介绍 </a></li>
<li><a id="nsmenuid_2" onmouseover="changetab_objdiv('nsmenuid_','nsremark_',2,2,'activetab','')" href="welcome/news">推荐新闻</a>
</li>
</ul>

</div>
<div class="clear"></div>
<div class="i_n_news1">
<div id="nsremark_1">
<dl class="i_n_te">
<dt>
	<strong><a href="welcome/company" title="江西扬子船舶制造有限公司">江西扬子船舶制造有限公司</a></strong><br>
	<?php echo $gsjj->content;?>
</dt>
<!--css里面有截取，所以你不用写字符串截取-->
</dl>
</div>
<div id="nsremark_2">
<div class="nlist">
<ul>
	<?php foreach($sel_news as $row){?>
		<li><a href="welcome/content/<?php echo $row['id'];?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a></li>
	<?php }?>
</ul>
</div>
</div>
</div>
</div>
<!--新闻和公司介绍结束-->
<div class="i_rig" id="com_indexistop_products" editok="online">
<dl>
<dt> 相关产品 </dt>
<dd class="color"><a href="welcome/product"> 更多 </a></dd>
</dl>
<div class="clear"></div>
<h1>
<?php
//	echo "<pre>";  
//	print_r($sel_product)
?>
<script language="javascript">
                        var sslide_widths=220;	//显示的宽度
                        var sslide_heights=160;	//显示的高度
                        var sslide_times=5500;	//轮换的间隔时间
                        var sslide_counts=0;
                        
                        
                            sslide_counts=<?php echo count($sel_product)?>;

                            
                      <?php
							$p=1;
                      		foreach($sel_product as $row){
                   
                      ?>
                      
                      				var sslide_img<?php echo $p;?>=new Image();
    			                    sslide_img<?php echo $p;?>.src="uploads/img/<?php echo $row['image'];?>";
   				                    var sslide_url<?php echo $p;?>=new Image();
                        			sslide_url<?php echo $p;?>.src="<?php echo base_url();?>uploads/img/<?php echo $row['image'];?>";
                        			var sslide_txt<?php echo $p;?>=new Image();
                        			sslide_txt<?php echo $p;?>.alt="江西扬子船舶制造有限公司";
                     <?php
                     		$p++;
                     		}                   
                       ?>
     
            
                        var sslide_nn=1;
                        var sslide_key=0;
                        
                        function sslide_change_img()
                        {
                            if(sslide_key==0){
                                sslide_key=1;
                            }
                            else if(document.all){
                                document.getElementById("sslide_pic").filters[0].Apply();
                                document.getElementById("sslide_pic").filters[0].Play(duration=2);
                            }
                            eval('document.getElementById("sslide_pic").src=sslide_img'+sslide_nn+'.src');
                            eval('document.getElementById("sslide_pic").alt=sslide_txt'+sslide_nn+'.alt');
                            eval('document.getElementById("sslide_url").href=sslide_url'+sslide_nn+'.src');
                            /* ------显示按钮功能开始------ */
                            for (var i=1;i<=sslide_counts;i++){
                                document.getElementById("sslide_ao"+i).className='sslide_axx';
                            }
                            document.getElementById("sslide_ao"+sslide_nn).className='sslide_bxx';
                            /* ------显示按钮功能结束------ */
                            sslide_nn++;
                            if(sslide_nn>sslide_counts){sslide_nn=1;}
                            sslide_tt=setTimeout('sslide_change_img()',sslide_times);
                        }
                        
                        function sslide_changeimg(the_sliden){
                            sslide_nn=the_sliden;
                            window.clearInterval(sslide_tt);
                            sslide_change_img();
                        }
                        document.write('<div class="sslide_outer" style="width:' + sslide_widths + 'px;height:' + sslide_heights + 'px;">');
                        document.write('<div><a id="sslide_url" target="_blank">');
                        document.write('<img id="sslide_pic" width="' + sslide_widths + '" height="' + sslide_heights + '" />');
                        document.write('</a></div>');
                        document.write('<div class="sslide_abtn">');
                        /* ------显示按钮功能开始------ */
                        for(var i=1;i<sslide_counts+1;i++){
                            document.write('<a href="javascript:sslide_changeimg(' + i + ');" id="sslide_ao' + i + '" class="sslide_axx" target="_self">' + i + '</a>');
                        }
                        /* ------显示按钮功能结束------ */
                        document.write('</div></div>');
                        sslide_change_img();
                    </script>
</h1>
</div>
<!--推荐产品结束-->
</div>