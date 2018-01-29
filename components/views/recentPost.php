<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.09.2017
 * Time: 10:09
 */
use yii\helpers\Url;
?>
<?php if(!empty($posts)): ?>
    <?php foreach ($posts as $post):?>
        <li>
            <a href="<?= Url::to(['post/view', 'id'=>$post->id]) ?>"><img src="<?= $post->getImage(); ?>" style="max-width: 100px;" alt="Popular Post"></a>
            <p style="float: right; padding: 0;"><a href="<?=Url::to(['post/view', 'id'=>$post->id]) ?>"><?= $post->description ?></a></p>
            <em><?= $post->date ?></em>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
