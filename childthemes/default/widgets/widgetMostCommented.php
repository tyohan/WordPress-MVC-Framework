<?php
$pagesize=isset($pagesize)?$pagesize:5;
$popularPost=TPost::findAll('orderby=comment_count&order=DESC&posts_per_page='.$pagesize);?>
<div class="widget most-commented">
    <h3>Most Commented</h3>
    <ul>
        <?php foreach($popularPost as $popPost):?>
        <li><a href="<?php echo $popPost->permalink;?>"><?php echo $popPost->title;?></a> (<?php echo $popPost->commentCount;?>)</li>
        <?php    endforeach;?>
    </ul>
</div>

