<div class="list">
	<h1>留言列表</h1>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<form name="form1" action="<?php echo site_url('admin/del_message')?>" method="post" id="form1">
			<thead>
				<tr>
					<th>留言用户</th>
					<th>留言简略</th>
					<th>留言时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sel_message['sel_message'] as $row):?>
				<tr>
					<td><?php echo $row['user'];?></td>
					<td><?php
						$content=strip_tags("$row[content]");
						echo mb_substr($content, 0,50)."...";?>
					</td>
					<td><?php echo $row['addtime'];?></td>
					<td><?php echo anchor('/feadmin/main/reply/'.$row['id'],'查看、回复留言')?> | <a href="feadmin/del_message/<?php echo $row['id'];?>" onclick="return(confirm('确定删除?'))">删除留言及回复</a></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="left" style="padding:5px 0; border-bottom:none;">
						<div id="page">
							<?php echo $sel_message['pag_links']; ?>
						</div>
					</td>
				</tr>
			</tfoot>
		</form>
	</table>
</div>