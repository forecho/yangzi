<div class="list">
	<h1>幻灯片列表</h1>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>标题</th>
				<th>缩略图</th>
				<th>链接地址</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($sel_banner as $row):?>
			<tr>
				<td><?php echo $row['title'];?></td>
				<td><a href="<?php echo 'uploads/'.$row['image'];?>" target="_blank" title="点击查看大图"><img src="<?php echo 'uploads/'.$row['image'];?>" alt="" width="50"/></a></td>
				<td><?php echo $row['link'];?></td>
				<td><?php echo anchor('feadmin/main/changebanner/'.$row['id'],'修改')?> | <a href="feadmin/delbanner/<?php echo $row['image'];?>" onclick="return(confirm('确定删除?'))">删除</a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>