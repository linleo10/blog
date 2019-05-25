<table>
	<colgroup>
		<col width="15%">
			<col width="45%">
				<col width="18%">
	</colgroup>
	<thead>
		<tr>
			<th>
			</th>
			<th>
				标题
			</th>
			<th>
				分类
			</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) { ?>
			<tr id="post-<?= $row['aid'] ?>">
				<td>
					<input type="checkbox" value="<?= $row['aid'] ?>" name="cid[]">
				</td>
				<td>
					<a href="/admin_v2/edit?aid=<?= $row['aid'] ?>">
						<?= $row[ 'title'] ?>
					</a>
					<a href="admin_v2/edit?aid=<?= $row['id'] ?>">
						<i class="i-edit">
						</i>
					</a>
					<a href="https://blog.leoshen.cn/post/<?= $row['id'] ?>" target="_blank">
						<i class="i-exlink">
						</i>
					</a>
				</td>
				<td>
					<?php 
					$index = new Index; $cates = $index->get_cate($row['aid']); foreach ($cates as $c) { 
					?>
						<a href="/cate/<?= $c['cid'] ?>">
							<span class="cate">
								<?=
								$c[ 'name'], ' ' ?>
							</span>
						</a>
						<?php } ?>
				</td>
				<!-- li><a href="edit.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li></br>-->
				<?php } ?>
	</tbody>