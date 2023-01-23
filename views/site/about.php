<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1 style='color: #2a5674'><?= Html::encode($this->title) ?></h1>

    <div class="container">

            <div class="col">
                <img class='m-auto' style='width: 20%' src='/web/SiteImage/logo.png' alt="logo"/>
            </div>
            <div class="col">
                <h2 style='color: #2a5674'>Мир цветов</h2>
                <br>
                <h4 style='color: #2a5674'>Наш дивиз</h4>
                <p>Я ничего не понимаю в этой жизни, ПАМАГИТИ.</p>
                <br>
                <h4 style='color: #2a5674'>О компании</h4>
                <p>Я ничего не понимаю уже очень давно, наверное года с 2019-2020.</p>
            </div>

    </div>

    <h1 class='text-center' style='color: #2a5674'>Новинки компании</h1>

    <code>
        <?php $articles=\app\models\Product::find()->orderBy(['id_product'=>SORT_DESC])->limit(5)->all();
        $items=[];

        foreach ($articles as $article){
            $items[]="<div class='m-1 p-2 d-flex flex-column justify-content-center' style='background-color: #3b738f; max-height: 560px; min-height: 150px;'>
    <h1 class='text-center text-light m-1'>{$article->name}</h1>
    <img class='m-auto' style='height: auto; overflow: hidden' src='{$article->image}' alt='photo'/></div>";
        }
        echo yii\bootstrap5\Carousel::widget(['items'=>$items]);
        ?>

    </code>
</div>
