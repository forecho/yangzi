<div class="add">
	<h1>添加文章</h1>
	<dl>
		<dt>文章标题：</dt>
		<dd><?php $class = 'class=":required"';echo form_input('title','',$class);?></dd>
		<dt>发表时间：</dt>
		<dd><?php $class = 'id="d11" onClick="WdatePicker()" autocomplete="off"';echo form_input('addtime',date("Y-m-d"),$class);?></dd>
		<dt>文章内容：</dt>
		<dd>
			<div type="text/plain" id="myEditor"></div>
	 		<script type="text/javascript">
			    var editor = new baidu.editor.ui.Editor();
			    editor.render("myEditor");
			</script>
		</dd>
		<dt>所属分类</dt>
		<dd>
			<select name="" id="">
			<?php foreach($selclassify as $row):?>
				<option value="<?php echo $row['classify']?>"><?php echo $row['classify']?></option>
			<?php endforeach;?>
			</select>
		</dd>
		<dt>所属标签</dt>
		<dd>
			<span><?php echo form_checkbox('title','css');?>css</span>
		</dd>
	</dl>
</div>