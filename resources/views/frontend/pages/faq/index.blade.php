@extends('frontend.layouts.master')
@section('content')
    <section class="section-standart section-faq">
        <div class="container">
            <div class="row">
                <div class="col-12 col-heading">
                    <div class="heading">
                        <h2>Часто задаваемые вопросы</h2>
                    </div>
                </div>
                <div class="col-12 col-faq">
                    <div class="accordion">
                        <div class="accordion-item">
                            <a class="active">Как сделать заказ?</a>
                            <div class="content active">
                                <ul>
                                    <li>
                                        <p>1. Оформить заказ можно только в личном кабинете. Войдите или зарегистрируйтесь в системе.</p>
                                    </li>
                                    <li>
                                        <p>
                                            2. После регистрации на сайте Oki Post Вы получите почтовый адрес в Китае, Росси, Турции, Америке, Англии, Грузии и Германии.
                                            Этот адрес вы будете использовать при осуществлении покупок посылок в интернет-магазинах, которые мы вам доставим.
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a>Как оплатить?</a>
                            <div class="content">
                                <p>Оплата посылки происходит в личном кабинете пользоваетля. Чтобы опалить посылку, перейдите на "Панель управления" и выберите раздел "Посылки -> Неоплаченные". В раскрывающемся меню выберите пункт - "Оплатить посылку". Посылка будет опллачена в случае, если на вашем балансе достаточно средств. *Поддерживаемая валюта для оплаты USD(MDL/USD согласно курсу Национального Банка Молдовы).</p>
                            </div>
                        </div>
                        <!--<div class="accordion-item">-->
                        <!--    <a>Инструкция по оплате:</a>-->
                        <!--    <div class="content">-->
                        <!--        <p>После оформления заказа нажмите "Перейти к оплате"-->
                        <!--            Введите номер карты, срок действия, имя держателя карты (латинскими буквами, как на карте) и код CVC2/CVV2-->
                        <!--            Нажмите <b>"Оплатить"</b>-->
                        <!--        </p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="accordion-item">
                            <a>Где моя посылка?</a>
                            <div class="content">
                                <p>Узнать где находится посылка Вы можете в вашем личном кабинете в разделе <b>«Мои посылки»</b></p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a>Что означает статус?</a>
                            <div class="content">
                                <ul>
                                    <li><p>Ожидает оплату - оплатите заказ, и мы подготовим его к доставке.</p></li>
                                    <li><p>В обработке - этот статус означает, что мы трудимся над упаковкой и доставкой заказа, и скоро Вы получите оповещение о его готовности в виде СМС.</p></li>
                                    <li><p>Готово к выдаче – Ваш заказ уже ждет, когда Вы заберете его домой из пункта выдачи или мы свяжемся с Вами и доставим его в удобное для Вас время.</p></li>
                                    <li><p>Выдано/ Отменено/ Возврат – это конечные статусы заказа, означающие либо его отмену, либо получение, либо возврат.</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-heading col-heading-second">
                    <div class="heading">
                        <h2>Список запрещенных предметов</h2>
                    </div>
                </div>
                <div class="col-12 col-prohibited">
                    <div class="wrap">
                        <ul class="prohibited">
                            <li>Наркотики&nbsp; и психотропные вещества</li>
                            <li>Взрывчатое или огнестрельное оружие или содержимые вещества</li>
                            <li>Легковоспламеняющиеся или другие опасные предметы (например, зажигалки, предметы с токсичным и инфекционным содержимым, новогодние взрывчатые вещества, предметы, содержащие коррозионные, радиоактивные и другие неизвестные вещества)</li>
                            <li>Порнографическая продукция</li>
                            <li>Духи, маникюр, ацетон или другие жидкие чистящие средства</li>
                            <li>Бытовые чистящие средства и жидкости, предметы, содержащие аэрозоли, легковоспламеняющиеся вещества, клеи, коррозионные, пищевые предметы и т. д .</li>
                            <li>Ценные и дорогостоящие вещи: монеты, банкноты, банкноты и другие ценности. Банкноты, кредитные карты, дорожные или дорожные чеки, ценные бумаги из платины, золота или серебра, ювелирные изделия или необработанные драгоценные камни, ювелирные изделия или другие ювелирные изделия</li>
                            <li>Животные, чучела, кости, органы и аналогичные части животных</li>
                            <li>Растения или их семена</li>
                            <li>Рыба, птицы, грызуны, рептилии и многое другое</li>
                            <li>Продукты, содержащие асбест</li>
                            <li>Жидкие вещества</li>
                            <li>Предметы, которые могут подвергнуть опасности и / или загрязнить другие посылки</li>
                        </ul>
                        <p class="prohibited-info">Перевозка почтовых отправлений, противоречащих правилам Всемирного почтового союза (UniversalPostalUnion), запрещена. Также предметы, ввоз или употребление которых запрещены в стране назначения.</p>
                        <p class="prohibited-china">А такжеиз <strong>Китая</strong> запрещена перевозка следующих предметов:</p>
                        <ul class="china-list">
                            <li>Все виды батарей и содержащих их продуктов</li>
                            <li>Зажигалка (в том числе электрическая)</li>
                            <li>Все жидкости и содержащие их продукты</li>
                            <li>Переносное зарядное устройство</li>
                            <li>Аккумулятор</li>
                            <li>Электронная сигарета</li>
                            <li>Свеча</li>
                            <li>Ножи</li>
                            <li>Косметика, в том числе тени для век, ацетон, лак для ногтей и другие</li>
                            <li>Все виды порошка</li>
                            <li>Зубные пасты</li>
                            <li>Опасные, взрывоопасные и/или легковоспламеняющиеся продукты. (Дезодорант, аэрозоль, спрей, распылитель и т.д.)</li>
                            <li>Духи</li>
                            <li>Растения</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
