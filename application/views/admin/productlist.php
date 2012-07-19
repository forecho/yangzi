<div class="list">
	<h1>产品列表</h1>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>产品备注</th>
				<th>内容简略</th>
				<th>时间（按最新时间排序）</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($sel_product['sel_product'] as $row):?>
			<tr>
				<td><?php echo $row['title'];?></td>
				<td><a href="<?php echo 'uploads/img/'.$row['image'];?>" target="_blank" title="点击查看大图"><img src="<?php echo 'uploads/img/'.$row['image'];?>" alt="" width="50"/></a></td>
				<td><?php echo $row['addtime'];?></td>
				<td><?php echo anchor('feadmin/main/changeproduct/'.$row['id'],'修改')?> | <a href="feadmin/delproduct/<?php echo $row['image'];?>" onclick="return(confirm('确定删除?'))">删除</a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4" align="left" style="padding:5px 0; border-bottom:none;">
					<div id="page">
						<?php echo $sel_product['pag_links']; ?>
					</div>
				</td>
			</tr>
		</tfoot>
	</table>
</div>