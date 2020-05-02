@extends('layouts.app')

@section('block-title')
    Order
@endsection

@section('content')
    <section class="main-pods">
        <div class="pod-wrapper">
            <div class="pod-image">
                <h3>ГЛАВНАЯ</h3>
                <h3 class="opacity">ГЛАВНАЯ</h3>
            </div>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('gallery')}}">
                <div class="pod-image">
                    <h3>ГАЛЕРЕЯ ЭФФЕКТОВ</h3>
                    <h3 class="opacity">ЭФФЕКТОВ</h3>
                </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('order-mask')}}">
                <div class="pod-image">
                    <h3>ЗАКАЗАТЬ МАСКУ</h3>
                    <h3 class="opacity">МАСКУ</h3>
                </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('questions')}}">
                <div class="pod-image">
                    <h3>ЧАСТЫЕ ВОПРОСЫ</h3>
                    <h3 class="opacity">ВОПРОСЫ</h3>
                </div>
            </a>
        </div>
    </section>


    <section class="order-information">
        <h3>Расскажите, как должна выглядить маска</h3>
        <h4>Авторизуйтесь пожалуйста и мы свяжемся с вами для уточнения деталей</h4>

        <div class="order-form">
        <form class="order-description" id="order-description">
            <textarea name="" id="" cols="30" rows="10">

            </textarea>

        </form>
            <p>
                Я НЕ УМЕЮ ЧИТАТЬ ВАШИ МЫСЛИ! У меня нет такого навыка :)<br>
                По этому старайтесь как можно точнее выразить все ваши пожелания,<br>
                желательно с графическими примерами. <br>
            </p>
            <button type="submit" class="order-information-submit" onClick="document.getElementById('order-description').submit()">прикрепить</button>
        </div>
    </section>

    <section class="order-opportunities">
        <h2>Возможности маски</h2>

        <div class="order-opportunities-pods">
            <div class="order-opportunities-pod ">
                <h2>отслеживание <br>
                    нескольких лиц
                </h2>
                <p>Эффекты и  анимации <br>
                    можно накладывать <br>
                    на несколько лиц.
                </p>
            </div>
            <div class="order-opportunities-pod face ">
                <h2>
                    сглаживание <br>
                    лица
                </h2>
                <p>
                    Удаление прыщиков, складок, <br>
                    морщин. <br>
                    Выравнивание цветового тона кожи <br>
                </p>
            </div>
            <div class="order-opportunities-pod texture">
                <h2>текстура</h2>
                <p>
                    Добавление на лицо <br>
                    любой текстуры <br>
                    (бороду картинку, надпись).
                </p>
            </div>

            <div class="order-opportunities-pod">
                <h2>изменение формы</h2>
                <p>
                    Меняйте размеры <br>
                    любой части лица.
                </p>
            </div>
            <div class="order-opportunities-pod d_obj">
                <h2>3D объекты</h2>
                <p>Возможность добавления <br>
                    3D объектов: очки, маски, <br>
                    головные уборы, шлем
                </p>
            </div>
            <div class="order-opportunities-pod fly">
                <h2>
                    добавление <br>
                    летающих частиц
                </h2>
                <p>
                    Возможность добавить разные частицы: <br>
                    снежинки, воздушные шары и.т.д
                </p>
            </div>
            <div class="order-opportunities-pod">
                <h2>звук</h2>
                <p>
                    Возможность добавления <br>
                    звука и связи его с анимацией.
                </p>
            </div>
            <div class="order-opportunities-pod segment">
                <h2>сегментация фона</h2>
                <p>
                    Изменение фона на любое изображение <br>
                    или анимацию
                </p>
            </div>
        </div>

        <p>
            После обработки заказа, цена маски будет установлена вличном кабинете. <br>
            Стоимость заказа рассчитывается исходя из его сложности.
        </p>
    </section>
@endsection
