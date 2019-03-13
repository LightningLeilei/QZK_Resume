<?php if($resume_list): ?>
<ul class="list-group">
<?php foreach($resume_list as $item ): ?>
    <li id="rlist-<?=$item['id']?>" class="list-group-item list-group-item-action">
    <a href="/?m=resume&amp;a=detail&amp;id=<?=$item['id']?>" target="_blank" class="btn btn-light"><?=$item['title']?></a>

    <a href="/?m=resume&amp;a=detail&amp;id=<?=$item['id']?>" target="_blank" class="btn btn-light"><img src="image/opennew.png" alt="查看"></a>

    <a href="/?m=resume&amp;a=modify&amp;id=<?=$item['id']?>" target="_blank" class="btn btn-light"><img src="image/pencil.png" alt="编辑"></a>

    <a href="javascript:confirm_delete('<?=$item['id']?>');void(0);"><img src="image/close.png" alt="删除"></a>

    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<p><a href="/?m=resume&amp;a=add" class="btn resume_add btn-light"><img src="image/plus.png" alt="添加简历" id="resume_add_link">添加简历</a></p>

