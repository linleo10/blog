<?php
$row = $data[0];
$title = $row['title'];
$content = $row['content'];
$author = $row['author'];
?>
<form action="/admin_v2/edit/post?aid=<?= $aid ?>" method="POST">
</p>
                    <p class="title">
                        <textarea type="text" id="title" name="title" class="w-100 text title" style="height:70px" placeholder="标题" autocomplete="off"><?= $title; ?></textarea>
                    </p>
 <p><textarea style="height: 200px" name="content" placeholder="文章内容" id="text" class="w-100 mono" autocapitalize="off"> <?= $content ?> </textarea></p>
                     <p class="title">
                        <input type="text" id="title" name="author" class="w-100 text title" placeholder="作者" autocomplete="off" value="<?= $author ?>">
                    </p>
                     <section class="typecho-post-option category-option">
                            <label class="typecho-label">分类</label>
                                                        <ul>
 <?php
foreach ($get_cate as $rows_aaa) {
 ?>
  <li><input type="checkbox" id="category-1" value="<?= $rows_aaa['cid'] ?>" name="cid[]"><label for="category-1"><?= $rows_aaa['name'] ?></label></li>
 <?php
 }
 ?>
 </ul>
 </section>
               <p><input type="submit" class="btn primary" id="btn-submit" value="提交"/></p>
 </form>