<form action="{{ route('send.recall') }}" class="form__order" id="form__recall" method="post">
    @csrf
    <div class="close__box" title="Закрыть форму">
        <div class="close"></div>
    </div>
    <div class="single__block">
        <div class="title">
            Заказать звонок
        </div>
    </div>
    <div class="single__block">
        <input type="text" name="fio" placeholder="Ваше имя*" autocomplete="off" required="">
    </div>
    <div class="single__block">
        <input type="text" name="phone" placeholder="Ваш телефон*" autocomplete="off" class="phone__mask" required="">
    </div>
    <div class="single__block i__agree">
        <input type="checkbox" name="agree" id="i_agree{{ $unique ?? '' }}" value="1" checked="checked">
        <label for="i_agree{{ $unique ?? '' }}">Оставляя заявку, Вы соглашаетесь на обработку персональных данных</label>
        <p class="error">Согласитесь на обработку персональных данных</p>
    </div>
    <div class="single__block center submit">
        <button type="submit" class="btn">Отправить</button>
    </div>
</form>
