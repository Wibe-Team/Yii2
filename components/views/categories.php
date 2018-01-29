<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.09.2017
 * Time: 9:41
 */
use yii\helpers\Url;
?>
<?php if(!empty($data)): ?>
    <?php foreach ($data as $cat):?>
        <p><a href="<?= Url::to(['cats/view', 'id'=>$cat->id]) ?>">
                <i class="fa fa-angle-right"></i> <?= $cat->name ?></a>
            <span class="badge badge-theme pull-right"><?php echo count($cat->posts) ?></span></p>
    <?php endforeach; ?>
<?php endif; ?>
