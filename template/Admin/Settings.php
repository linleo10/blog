<form action="/admin_v2/settings/post" method="POST">
</p>
                     <p class="title">
                     	<label>域名</label>
                        <input type="text" id="domain" name="domain" class="w-100 text title" autocomplete="off" value="<?= $domain ?>">
                    </p>
<p class="title">
                     	<label>是否开启SSL</label>
                        <input type="text" id="is_ssl_on" name="is_ssl_on" class="w-100 text title" autocomplete="off" value="<?= $is_ssl_on ?>">
                    </p>
<p class="title">
                     	<label>是否强制SSL</label>
                        <input type="text" id="force_ssl" name="force_ssl" class="w-100 text title" autocomplete="off" value="<?= $force_ssl ?>">
                    </p>
<p class="title">
                     	<label>cdn1</label>
                        <input type="text" id="cdn_host1" name="cdn_host1" class="w-100 text title" autocomplete="off" value="<?= $cdn_host1 ?>">
                    </p>
<p class="title">
                     	<label>cdn2</label>
                        <input type="text" id="" name="cdn_host2" class="w-100 text title" autocomplete="off" value="<?= $cdn_host2 ?>">
                    </p>
<label>数据库</label>
<p class="title">
                     	<label>dsn</label>
                        <input type="text" id="title" name="dsn" class="w-100 text title" autocomplete="off" value="<?= $dsn ?>">
                    </p>
<p class="title">
                     	<label>user</label>
                        <input type="text" id="title" name="user" class="w-100 text title" autocomplete="off" value="<?= $user ?>">
                    </p>
<p class="title">
                     	<label>pass</label>
                        <input type="text" id="title" name="pass" class="w-100 text title" autocomplete="off" value="<?= $pass ?>">
                    </p>
<p class="title">
                     	<label>prefix</label>
                        <input type="text" id="title" name="prefix" class="w-100 text title" autocomplete="off" value="<?= $prefix ?>">
                    </p>
<label>分页</label>
<p class="title">
                     	<label>page_size</label>
                        <input type="text" id="title" name="page_size" class="w-100 text title" autocomplete="off" value="<?= $page_size ?>">
                    </p>
                    <p class="title">
                     	<label>page_url</label>
                        <input type="text" id="title" name="page_url" class="w-100 text title" autocomplete="off" value="<?= $page_url ?>">
                    </p>
<label>API</label>
<p class="title">
                     	<label>words_api</label>
                        <input type="text" id="title" name="words_api" class="w-100 text title" autocomplete="off" value="<?= $words_api ?>">
                    </p>
<p class="title">
                     	<label>getcomments_api</label>
                        <input type="text" id="title" name="getcomments_api" class="w-100 text title" autocomplete="off" value="<?= $getcomments_api ?>">
                    </p>
<p class="title">
                     	<label>addcomments_api</label>
                        <input type="text" id="title" name="addcomments_api" class="w-100 text title" autocomplete="off" value="<?= $addcomments_api ?>">
                    </p>
<p class="title">
                     	<label>stat_api</label>
                        <input type="text" id="title" name="stat_api" class="w-100 text title" autocomplete="off" value="<?= $stat_api ?>">
                    </p>
<!--                     <section class="typecho-post-option category-option">
                            <label class="typecho-label">分类</label>
                                                        <ul>
  <li><input type="checkbox" id="category-1" value="<?= $rows_aaa['cid'] ?>" name="cid[]"><label for="category-1"><?= $rows_aaa['name'] ?></label></li>
 </ul>
 </section>-->
               <p><input type="submit" class="btn primary" id="btn-submit" value="提交"/></p>
 </form>