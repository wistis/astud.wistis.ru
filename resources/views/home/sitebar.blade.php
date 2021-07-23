<div class="col-sm-3 col-xs-12 hidden-xs">
@auth
    <div class="left">
        <h4>Мой аккаунт</h4>
        <div class="filter">
            <ul class="list-unstyled">
                <li class="list-unstyled">
                   <a href="/home/balance">Баланс {{auth()->user()->balance}}р.</a>
                </li>
                <li class="list-unstyled">
                    <a href="/home/messages">Сообщения</a>
                </li>
                <li class="list-unstyled">
                    <a href="/home/orders">Заказы</a>
                </li>
                <li class="list-unstyled">
                    <a href="/home/profile">Редактировать профиль</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="left">
        <h4>Готовые работы</h4>
        <div class="filter">
            <ul class="list-unstyled">
                <li class="list-unstyled">
                   <a href="/home/works/bayed">Я купил работы</a>
                </li>    <li class="list-unstyled">
                   <a href="/home/works">Я продаю работы</a>
                </li>


            </ul>
            <a href="/works/create" class="btn btn-info">Продать работу</a>
        </div>
    </div>
    <div class="left">
        <h4>Тех поддержка</h4>
        <div class="filter">
            <ul class="list-unstyled">
                <li class="list-unstyled">
                   <a href="mailto:">E-mail</a>
                </li>    <li class="list-unstyled">
                   <a href="/faq">FAQ</a>
                </li>


            </ul>
        </div>
    </div>
    @endauth
</div>