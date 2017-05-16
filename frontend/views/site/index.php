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

        <!--= Menu =-->
        <ul class="menu" id="menu">
            <li class="menu__item">
                <a class="menu__link menu__link--active" href="#proposition">пропонуємо</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="#profit">Переваги</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="#projects">Проекти</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="#contacts">контакти</a>
            </li>
        </ul>
        <!--= End menu =-->

        <!--= Phones =-->
        <div class="phones">
            <a class="phones__item" href="tel:+30731328156">(073) 132-81-56</a>
            <a class="phones__link ownbox-show" href="<?= Url::to(['/send']) ?>">замовити дзвінок</a>
        </div>
        <!--= End phones =-->

        <!--= Mobile menu =-->
        <div class="mobile-menu">
            <a class="mobile-menu__button" href="javascript:void(0)">
                <i class="mobile-menu__button-line"></i>
            </a>
            <div class="mobile-menu__drop">
                <a class="mobile-menu__close" href="#"></a>
                <div class="mobile-menu__wrapper">
                    <div class="mobile-menu__content">

                        <div class="mobile-menu__list" id="mob_menu">
                            <div class="mobile-menu__list-item">
                                <a class="mobile-menu__list-link mobile-menu__list-link--active" href="#proposition">пропонуємо</a>
                            </div>
                            <div class="mobile-menu__list-item">
                                <a class="mobile-menu__list-link" href="#profit">Переваги</a>
                            </div>
                            <div class="mobile-menu__list-item">
                                <a class="mobile-menu__list-link" href="#projects">Проекти</a>
                            </div>
                            <div class="mobile-menu__list-item">
                                <a class="mobile-menu__list-link" href="#contacts">контакти</a>
                            </div>
                        </div>

                        <div class="mobile-menu__phones">
                            <a class="mobile-menu__phones-item" href="tel:+30731328156">(073) 132-81-56</a>
                            <a class="mobile-menu__phones-link ownbox-show" href="/send">замовити дзвінок</a>
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
                <div class="slider__title lightSpeedIn wow">Сендвіч панелі з поліуретану від німецького виробника</div>
                <div class="slider__button">
                    <div class="slider__button-line slider__button-line--before"></div>
                    <div class="slider__button-line slider__button-line--after"></div>
                    <a class="slider__button-btn" href="#proposition">Детальніше
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
            <div class="proposition__title">пропонуємо</div>
            <div class="proposition__title-bg">Панелі</div>
            <div class="proposition__list">
                <div class="proposition__item-wrapper">
                    <div class="proposition__item fadeIn wow">
                        <div class="proposition__item-title">
                            <img class="proposition__item-icon" src="data/proposition/wall.png" alt="">Сендвіч панелі
                            <b>для Стін</b>
                        </div>
                        <div class="proposition__item-box">
                            <div class="proposition__item-table">
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Ширина</div>
                                    <div class="proposition__item-value">1,02, 1.18 м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Товщина</div>
                                    <div class="proposition__item-value">40-200мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Щільність</div>
                                    <div class="proposition__item-value">43кг/м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Зовнішня товщина металу</div>
                                    <div class="proposition__item-value">0,5-0,75 мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Внутрішня товщина металу</div>
                                    <div class="proposition__item-value">0,5мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Покриття</div>
                                    <div class="proposition__item-value">Кольоровий полімер</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Захисне покриття</div>
                                    <div class="proposition__item-value">Плівка</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="proposition__item-wrapper">
                    <div class="proposition__item fadeIn wow">
                        <div class="proposition__item-title">
                            <img class="proposition__item-icon" src="data/proposition/roof.png" alt="">Сендвіч панелі
                            <b>для даху</b>
                        </div>
                        <div class="proposition__item-box">
                            <div class="proposition__item-table">
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Ширина</div>
                                    <div class="proposition__item-value">1,02, 1.18 м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Товщина</div>
                                    <div class="proposition__item-value">30-150мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Щільність</div>
                                    <div class="proposition__item-value">43кг/м</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Зовнішня товщина металу</div>
                                    <div class="proposition__item-value">0,5-0,75 мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Внутрішня товщина металу</div>
                                    <div class="proposition__item-value">0,5мм</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Покриття</div>
                                    <div class="proposition__item-value">Кольоровий полімер</div>
                                </div>
                                <div class="proposition__item-field">
                                    <div class="proposition__item-name">Захисне покриття</div>
                                    <div class="proposition__item-value">Плівка</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--= End proposition =-->

    <!--= Profit =-->
    <div class="profit" id="profit">
        <div class="container">
            <div class="profit__title">Переваги
                <span class="profit__title-accent">сендвіч-панелей</span>
            </div>
            <div class="profit__list">
                <div class="profit__item undefined bounceInLeft wow">
                    <div class="profit__picture">
                        <img class="profit__image" src="data/profit/1.png" alt="">
                    </div>
                    <div class="profit__data">
                        <div class="profit__data-number">01</div>
                        <div class="profit__data-title">Тепло та звукоізоляця</div>
                        <div class="profit__data-text">Високі звукоізоляційні характеристики сендвіч-панелей роблять їх особливо популярними в разі будівництва будівель і споруд поблизу автострад, залізничних магістралей та інших джерел шуму й створюють чудову акустику всередині збудованих приміщень.</div>
                    </div>
                </div>
                <div class="profit__item profit__item--reverse bounceInUp wow">
                    <div class="profit__picture">
                        <img class="profit__image" src="data/profit/2.png" alt="">
                    </div>
                    <div class="profit__data">
                        <div class="profit__data-number">02</div>
                        <div class="profit__data-title">Легкість монтажу</div>
                        <div class="profit__data-text">Мала вага та легкість монтажу сендвіч-панелей дозволяють монтувати конструкції без додаткового обладнання та в максимально короткі строки, що практично неможливо при використанні інших будівельних матеріалів.</div>
                    </div>
                </div>
                <div class="profit__item undefined bounceInRight wow">
                    <div class="profit__picture">
                        <img class="profit__image" src="data/profit/3.png" alt="">
                    </div>
                    <div class="profit__data">
                        <div class="profit__data-number">03</div>
                        <div class="profit__data-title">Естетика та високі гігієнічні якості</div>
                        <div class="profit__data-text">Притаманні сендвіч панелям високі гігієнічні якості дозволяють використовувати їх в будівництві об'єктів з високими вимогами гігієни будь то заклади харчової промисловості чи медичні установи.</div>
                    </div>
                </div>
                <div class="profit__item profit__item--reverse bounceInUp wow">
                    <div class="profit__picture">
                        <img class="profit__image" src="data/profit/4.png" alt="">
                    </div>
                    <div class="profit__data">
                        <div class="profit__data-number">04</div>
                        <div class="profit__data-title">Довговічність</div>
                        <div class="profit__data-text"> Хімічні властивості сендвіч панелей роблять їх несприйнятливими до дії хімічних речовин, грибків і цвілі, що значно збільшує термін їх служби та робить можливим їх вживання в агресивних середовищах.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--= End profit =-->

    <!--= Calculation =-->
    <div class="calculation" style="background-image: url(data/calculation/bg.png);">
        <div class="container">
            <div class="calculation__box zoomIn wow">
                <div class="calculation__title">ОТРИМАЙТЕ індивідуальний прорахунок ВАРТОСТІ</div>
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
                            'placeholder' => "Введіть Ваше ім`я",
                        ]) ?>
                    </div>
                    <div class="calculation__field-item calculation__field-item--phone">
                        <?= $form->field($model, 'phone', [
                            'template' => '{input}',
                        ])->textInput([
                            'class' => 'calculation__input',
                            'maxlength' => true,
                            'placeholder' => "Введіть Ваш телефон",
                        ]) ?>
                    </div>
                    <div class="calculation__field-item">
                        <input class="calculation__button ajax-submit" type="button" value="Отримати розрахунок">
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <!--= End calculation =-->

    <!--= Projects =-->
    <div class="projects fadeInUp wow" id="projects">
        <div class="container">
            <div class="projects__title">Проекти з сендвіч-панелей</div>
            <div class="projects__list">
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/1.png" alt="">
                        </div>
                        <div class="projects__name">Торгові павільйони</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/2.png" alt="">
                        </div>
                        <div class="projects__name">Торгові точки</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/3.png" alt="">
                        </div>
                        <div class="projects__name">Блок-пости</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/4.png" alt="">
                        </div>
                        <div class="projects__name">Будівельні вагончики</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/5.png" alt="">
                        </div>
                        <div class="projects__name">Офісні приміщення</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/6.png" alt="">
                        </div>
                        <div class="projects__name">Логістичні центри</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/7.png" alt="">
                        </div>
                        <div class="projects__name">Спортивні комплекси</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/8.png" alt="">
                        </div>
                        <div class="projects__name">Швидкомонтовані мобільні будівлі</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/9.png" alt="">
                        </div>
                        <div class="projects__name">Морозильні камери</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/10.png" alt="">
                        </div>
                        <div class="projects__name">Овоче-сховища</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/11.png" alt="">
                        </div>
                        <div class="projects__name">Холодильні камери</div>
                    </div>
                </div>
                <div class="projects__item zoomIn wow">
                    <div class="projects__box">
                        <div class="projects__picture">
                            <img class="projects__image" src="data/projects/12.png" alt="">
                        </div>
                        <div class="projects__name">Двері для холодильників</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--= End projects =-->

    <!--= Equipment =-->
    <div class="equipment">
        <div class="container">
            <div class="equipment__title">Холодильне обладнання</div>
            <div class="equipment__list">
                <div class="equipment__item fadeInRight wow">
                    <div class="equipment__box">
                        <div class="equipment__picture">
                            <img class="equipment__image" src="data/equipment/1.png" alt="">
                        </div>
                        <div class="equipment__name">холодильні установки</div>
                    </div>
                </div>
                <div class="equipment__item fadeInRight wow">
                    <div class="equipment__box">
                        <div class="equipment__picture">
                            <img class="equipment__image" src="data/equipment/2.png" alt="">
                        </div>
                        <div class="equipment__name">чиллери</div>
                    </div>
                </div>
                <div class="equipment__item fadeInRight wow">
                    <div class="equipment__box">
                        <div class="equipment__picture">
                            <img class="equipment__image" src="data/equipment/3.png" alt="">
                        </div>
                        <div class="equipment__name">льодогенератори</div>
                    </div>
                </div>
                <div class="equipment__item fadeInRight wow">
                    <div class="equipment__box">
                        <div class="equipment__picture">
                            <img class="equipment__image" src="data/equipment/4.png" alt="">
                        </div>
                        <div class="equipment__name">компресори</div>
                    </div>
                </div>
                <div class="equipment__item fadeInRight wow">
                    <div class="equipment__box">
                        <div class="equipment__picture">
                            <img class="equipment__image" src="data/equipment/5.png" alt="">
                        </div>
                        <div class="equipment__name">конденсатори</div>
                    </div>
                </div>
                <div class="equipment__item fadeInRight wow">
                    <div class="equipment__box">
                        <div class="equipment__picture">
                            <img class="equipment__image" src="data/equipment/6.png" alt="">
                        </div>
                        <div class="equipment__name">повітряохолоджувачі</div>
                    </div>
                </div>
                <div class="equipment__item fadeInRight wow">
                    <div class="equipment__box">
                        <div class="equipment__picture">
                            <img class="equipment__image" src="data/equipment/7.png" alt="">
                        </div>
                        <div class="equipment__name"> теплообмінники</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--= End equipment =-->

    <!--= Contacts =-->
    <div class="contacts bounceInUp wow" id="contacts">
        <div class="contacts__info">
            <div class="contacts__wrapper">
                <div class="contacts__title">КОНТАКТИ</div>
                <div class="contacts__address">м.Рівне вул. Старицького 45</div>
                <a class="contacts__phone" href="tel:+30731328156">(073) 132 81 56</a>
                <div class="contacts__email">sandvich.panels@gmail.com</div>
                <div class="contacts__subtitle">ЗАЛИШИЛИСЯ ЗАПИТАННЯ?</div>
                <div class="contacts__text">Замовте зворотній дзвінок і наші менеджери зв'яжуться з Вами найближчим часом</div>
                <a class="contacts__button ownbox-show" href="<?= Url::to(['/send']) ?>">замовити дзвінок</a>
            </div>
        </div>
        <!-- нужно попробовать повесить класс "contacts__map" на будуюший элемент iframe :)-->
        <div class="contacts__map" style="background: url(data/contacts/map.png);"></div>
    </div>
    <!--= End contacts =-->

</main>
<!--= End main =-->

<!--= Ownbox =-->
<div id="ownbox">
    <div id="box"></div>
</div>
<!--= End ownbox =-->