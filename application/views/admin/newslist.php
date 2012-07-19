<div class="list">
	<h1>新闻列表</h1>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<form name="form1" action="<?php echo site_url('admin/del_news')?>" method="post" id="form1">
			<thead>
				<tr>
					<th>标题</th>
					<th>内容简略</th>
					<th>发表时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sel_news['sel_news'] as $row):?>
				<tr>
					<td><?php echo $row['title'];?></td>
					<td><?php
						$content=strip_tags("$row[content]");
						echo mb_substr($content, 0,50)."...";?>
					</td>
					<td><?php echo $row['addtime'];?></td>
					<td><?php echo anchor('/feadmin/main/changenews/'.$row['id'],'修改')?> | <a href="feadmin/del_news/<?php echo $row['id'];?>" onclick="return(confirm('确定删除?'))">删除</a></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="left" style="padding:5px 0; border-bottom:none;">
						<div id="page">
							<?php echo $sel_news['pag_links']; ?>
						</div>
					</td>
				</tr>
			</tfoot>
		</form>
	</table>
</div>