<?php

/* @var $this yii\web\View */
/** @var $model \frontend\forms\FeedbackForm */

use \yii\helpers\Url;
use \yii\bootstrap\ActiveForm;

$this->title = Yii::$app->name;
?>
<!--= Header =-->
<header class="header" id="header">
    <div class="container">

        <!--= logo =-->
        <span class="logo"></span>
        <!--= End logo =-->

        <?php if(!empty($menu)) : ?>
        <!--= Menu =-->
        <ul class="menu" id="menu">
            <?php foreach ($menu as $value) : ?>
                <li class="menu__item">
                    <a class="menu__link" href="<?= $value['slug'] ?>"><?= $value['translationDefault']['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--= End menu =-->
        
        <!--= Language =-->
            <div class="language">
                <?php foreach ($locale as $key => $value) : ?>
                    <div class="language__item">
                        <a class="language__link <?php if($language == $key) echo 'language__link--active'; ?>" href="<?= Url::toRoute(['/set-locale', 'locale' => $key]) ?>"><?= $value ?></a>
                    </div>
                <?php endforeach; ?>
                
            </div>
        <!--= End language =-->
        <?php endif; ?>

        <!--= Phones =-->
        <div class="phones">
            <a class="phones__button ownbox-show" href="<?= Url::to(['/send']) ?>"><?= Yii::t('frontend', 'get a call') ?></a>
            <div class="phones__list">
                <?php foreach ($phone as $value) : ?>
                    <a class="phones__item" href="<?= $value['slug'] ?>"><?= $value['phone'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <!--= End phones =-->
        
        <!--= Mobile menu =-->
        <div class="mobile-menu">
            <a class="mobile-menu__button" href="javascript:void(0);">
                <i class="mobile-menu__button-line"></i>
            </a>
            <div class="mobile-menu__drop">
                <a class="mobile-menu__close" href="javascript:void(0);"></a>
                <div class="mobile-menu__wrapper">
                    <div class="mobile-menu__content">

                        <?php if(!empty($menu)) : ?>
                            <div class="mobile-menu__list" id="mob_menu">
                                <?php foreach ($menu as $value) : ?>
                                    <div class="mobile-menu__list-item">
                                        <a class="mobile-menu__list-link" href="<?= $value['slug'] ?>"><?= $value['translationDefault']['title'] ?></a>
                                    </div>
                                <?php endforeach; unset($value); ?>
                            </div>
                        <?php endif; ?>

                        <div class="mobile-menu__phones">
                            <?php foreach ($phone as $value) : ?>
                                <a class="mobile-menu__phones-item" href="<?= $value['slug'] ?>"><?= $value['phone'] ?></a>
                            <?php endforeach; ?>
                            <a class="mobile-menu__phones-button ownbox-show" href="<?= Url::to(['/send']) ?>"><?=Yii::t('frontend', 'get a call') ?></a>
                        </div>
                        <div class="mobile-menu__lang">
                            <?php foreach ($locale as $key => $value) : ?>
                                <div class="mobile-menu__lang-item">
                                    <a class="mobile-menu__lang-link <?php if($language == $key) echo 'mobile-menu__lang-link--active'; ?>" href="<?= Url::toRoute(['/set-locale', 'locale' => $key]) ?>"><?= $value ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--= End mobile menu =-->

    </div>
</header>
<!--= End header =-->

<!--= Main =-->
<main class="main" id="main">

    <!--= Slider =-->
    <div class="slider" id="slider" style="background-image: url(data/slider/bg.png);">
        <div class="container">
            <div class="slider__item">
                <div class="slider__title lightSpeedIn wow"><?= $page['translationDefault']['title'] ?></div>
                <div class="slider__button">
                    <div class="slider__button-line slider__button-line--before"></div>
                    <div class="slider__button-line slider__button-line--after"></div>
                    <a class="slider__button-btn" href="#proposition"><?= Yii::t('frontend', 'More') ?>
                        <span class="slider__button-btn-arrow"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--= End slider =-->

    <!--= Proposition =-->
    <div class="proposition bounceInUp wow" id="proposition" data-wow-delay="0.2s">
        <div class="container">
            <div class="proposition__title"><?= Yii::t('frontend', 'offer') ?></div>
            <div class="proposition__title-bg"><?= Yii::t('frontend', 'Panels') ?></div>
            <div class="proposition__list">
                <div class="proposition__item-wrapper">
                    <div class="proposition__item fadeIn wow">
                        <div class="proposition__item-title">
                            <img class="proposition__item-icon" src="data/proposition/wall.png" alt=""><?= Yii::t('frontend', 'Sandwich panels') ?>
                            <b><?= Yii::t('frontend', 'for wall') ?></b>
                        </div>
                        <div class="proposition__item-box">
                            <div class="proposition__item-table">
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Width') ?></div>
                                    <div class="proposition__item-value">1,02, 1.18 м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Depth') ?></div>
                                    <div class="proposition__item-value">40-200мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Density') ?></div>
                                    <div class="proposition__item-value">43кг/м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Outer metal depth') ?></div>
                                    <div class="proposition__item-value">0,5-0,75 мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Internal metal depth') ?></div>
                                    <div class="proposition__item-value">0,5мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Coating') ?></div>
                                    <div class="proposition__item-value"><?= Yii::t('frontend', 'Colored polymer') ?></div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Resist') ?></div>
                                    <div class="proposition__item-value"><?= Yii::t('frontend', 'Film') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="proposition__item-wrapper">
                    <div class="proposition__item fadeIn wow">
                        <div class="proposition__item-title">
                            <img class="proposition__item-icon" src="data/proposition/roof.png" alt=""><?= Yii::t('frontend', 'Sandwich panels') ?>
                            <b><?= Yii::t('frontend', 'for roof') ?></b>
                        </div>
                        <div class="proposition__item-box">
                            <div class="proposition__item-table">
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Width') ?></div>
                                    <div class="proposition__item-value">1,02, 1.18 м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Depth') ?></div>
                                    <div class="proposition__item-value">30-150мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Density') ?></div>
                                    <div class="proposition__item-value">43кг/м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Outer metal depth') ?></div>
                                    <div class="proposition__item-value">0,5-0,75 мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Internal metal depth') ?></div>
                                    <div class="proposition__item-value">0,5мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Coating') ?></div>
                                    <div class="proposition__item-value"><?= Yii::t('frontend', 'Colored polymer') ?></div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name"><?= Yii::t('frontend', 'Resist') ?></div>
                                    <div class="proposition__item-value"><?= Yii::t('frontend', 'Film') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--= End proposition =-->

    <?php if(!empty($checkerboard)) : ?>
        <!--= Profit =-->
        <div class="profit" id="profit">
            <div class="container">

                <div class="profit__title"><?= Yii::t('frontend', 'Advantages') ?>
                    <span class="profit__title-accent"><?= Yii::t('frontend', 'sandiwich-panels') ?></span>
                </div>
                <div class="profit__list">
                    <?php foreach ($checkerboard as $key => $value) : ?>
                        <div class="profit__item <?php if($i % 2 == 0) : ?>bounceInLeft<?php else : ?>profit__item--reverse bounceInUp<?php endif; ?> wow">
                            <div class="profit__picture">
                                <img class="profit__image" src="<?= Yii::$app->glide->createSignedUrl($value->getGlideImage()) ?>" alt="">
                            </div>
                            <div class="profit__data">
                                <div class="profit__data-number">0<?= $key+1 ?></div>
                                <div class="profit__data-title"><?= $value->title ?></div>
                                <div class="profit__data-text"><?= $value->body ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--= End profit =-->
    <?php endif; ?>

    <!--= Calculation =-->
    <div class="calculation" style="background-image: url(data/calculation/bg.png);">
        <div class="container">
            <div class="calculation__box zoomIn wow">
                <div class="calculation__title"><?= Yii::t('frontend', 'GET VALUE individual miscalculation') ?></div>
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'calculation__field',
                    ],
                    'action' => Url::to(['/send']),
                    'enableClientValidation' => true,
                    'validateOnBlur' => true,
                    'validateOnChange' => true,
                    'validateOnSubmit' => true,
                ]); ?>
                    <div class="calculation__field-item calculation__field-item--email">
                        <?= $form->field($model, 'name', [
                            'template' => '{input}',
                        ])->textInput([
                            'class' => 'calculation__input',
                            'maxlength' => true,
                            'placeholder' => Yii::t('frontend', 'Enter your name'),
                        ]) ?>
                    </div>
                    <div class="calculation__field-item calculation__field-item--phone">
                        <?= $form->field($model, 'phone', [
                            'template' => '{input}',
                        ])->widget(\yii\widgets\MaskedInput::className(), [
                            'mask' => '+38 - (999) - 999 - 99 - 99',
                            'options' => [
                                'class' => 'calculation__input',
                                'maxlength' => true,
                                'placeholder' => Yii::t('frontend', 'Enter your phone'),]
                        ]) ?>
                    </div>
                    <div class="calculation__field-item">
                        <input class="calculation__button ajax-submit" type="button" value="<?= Yii::t('frontend', 'Get miscalculation') ?>">
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <!--= End calculation =-->

    <?php if(!empty($project)) : ?>
        <!--= Projects =-->
        <div class="projects fadeInUp wow" id="projects">
            <div class="container">
                <div class="projects__title"><?= Yii::t('frontend', 'Projects of sandwich panels') ?></div>
                <div class="projects__list">
                    <?php foreach ($project as $value) : ?>
                        <div class="projects__item zoomIn wow">
                            <div class="projects__box">
                                <div class="projects__picture">
                                    <img class="projects__image" src="<?= Yii::$app->glide->createSignedUrl($value->getGlideImage()) ?>" alt="">
                                </div>
                                <div class="projects__name"><?= $value->title ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--= End projects =-->
    <?php endif; ?>

    <?php if(!empty($equipment)) : ?>
        <!--= Equipment =-->
        <div class="equipment">
            <div class="container">
                <div class="equipment__title"><?= Yii::t('frontend', 'Refrigeration equipment') ?></div>
                <div class="equipment__list">
                    <?php foreach ($equipment as $value) : ?>
                        <div class="equipment__item fadeInRight wow">
                            <div class="equipment__box">
                                <div class="equipment__picture">
                                    <img class="equipment__image" src="<?= Yii::$app->glide->createSignedUrl($value->getGlideImage()) ?>" alt="">
                                </div>
                                <div class="equipment__name"><?= $value->title ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--= End equipment =-->
    <?php endif; ?>

    <!--= Contacts =-->
    <div class="contacts bounceInUp wow" id="contacts">
        <div class="contacts__info">
            <div class="contacts__wrapper">
                <div class="contacts__title"><?= Yii::t('frontend', 'CONTACTS') ?></div>
                <div class="contacts__address"><?= $key_value['address'] ?></div>
                
                <?php foreach ($phone as $value) : ?>
                    <a class="contacts__phone" href="<?= $value['slug'] ?>"><?= $value['phone'] ?></a>
                <?php endforeach; ?>
                    
                <div class="contacts__email"><?= $key_value['email'] ?></div>
                <div class="contacts__subtitle"><?= Yii::t('frontend', 'STILL HAVE QUESTIONS?') ?></div>
                <div class="contacts__text"><?= Yii::t('frontend', 'Sign up for a call back and our managers will contact you shortly') ?></div>
                <a class="contacts__button ownbox-show" href="<?= Url::to(['/send']) ?>"><?= Yii::t('frontend', 'get a call') ?></a>
                <div class="contacts__lang">
                    <?php foreach ($locale as $key => $value) : ?>
                        <div class="contacts__lang-item">
                            <a class="contacts__lang-link <?php if($language == $key) echo 'contacts__lang-link--active'; ?>" href="<?= Url::toRoute(['/set-locale', 'locale' => $key]) ?>"><?= $value ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="contacts__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2530.68939202178!2d26.2295899!3d50.6327763!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472f6ca0fd276da7%3A0xb5b2d6886f2af092!2z0LLRg9C70LjRhtGPINCc0LjRhdCw0LnQu9CwINCh0YLQsNGA0LjRhtGM0LrQvtCz0L4sIDQ1LCDQoNGW0LLQvdC1LCDQoNGW0LLQvdC10L3RgdGM0LrQsCDQvtCx0LvQsNGB0YLRjCwg0KPQutGA0LDQuNC90LA!5e0!3m2!1sru!2sua!4v1495011064407"></iframe>
        </div>

    </div>
    <!--= End contacts =-->
    
    <!--= Pageup =-->
    <a class="pageup" id="top" href="javascript:void(0);"></a>
    <!--= End pageup =-->

</main>
<!--= End main =-->

<!--= Ownbox =-->
<div id="ownbox">
    <div id="box"></div>
</div>
<!--= End ownbox =-->
