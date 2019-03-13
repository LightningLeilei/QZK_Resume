<h1 class="page_title">最新简历</h1>

<?php if( $resume_list ): ?>
    <ul class="list-group">
    <?php foreach( $resume_list as $item ): ?>
        <li id="rlist-<?=$item['id']?>" class="list-group-item list-group-item-action" >
            <a href="resume_detail.php?id=<?=$item['id']?>" class="btn btn-light" tagret="_black"><?=$item['title'] ?></a>

            <a href="resume_detail.php?id=<?=$item['id']?>" tagret="_black"><img src="image/opennew.png" alt="查看"></a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif;?>