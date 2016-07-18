<?php use app\components\menu_widget\MenuWidget;
    use yii\helpers\Html; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p class="lead">Shop Name</p>
            <div class="list-group" id="accordion">
                <?=MenuWidget::widget(['tpl' => 'menu']);?>
            </div>
        </div>
        <div class="col-md-9">
            <!--Carousel-->
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="/images/carousel//800x300.png" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="/images/carousel//800x300.png" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="/images/carousel//800x300.png" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!--Content-->
            <div class="row">
                <?php if (!empty($hits)) :
                    foreach ($hits as $hit) : ?>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <?= Html::img('@web/images/products/' . $hit->img, ['alt' => $hit->name])?>
                                <div class="caption">
                                    <h4><a href="#"><?=$hit->name ?></a></h4>
                                    <h4 class="text-center" style="font-weight: bold; color: #e51717;">$<?=$hit->price ?></h4>
                                    <p><?=$hit->content ?></p>
                                </div>
                                <div class="add_to_cart_button">
                                    <a class="btn btn-sm btn-success center-block" href="">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                else: ?>
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        Товары не найдены...
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->