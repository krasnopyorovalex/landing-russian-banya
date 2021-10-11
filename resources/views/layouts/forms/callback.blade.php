<form action="{{ route('send.callback') }}" class="form__order" id="form__callback" method="post">
    @csrf
    <div class="close__box" title="Закрыть форму">
        <div class="close"></div>
    </div>
    <div class="single__block">
        <div class="title">
            Напишите нам
        </div>
    </div>
    <div class="single__block">
        <input type="text" name="fio" placeholder="ФИО*" autocomplete="off" required="">
    </div>
    <div class="single__block">
        <input type="text" name="phone" placeholder="Телефон*" autocomplete="off" class="phone__mask" required="">
    </div>
    <div class="single__block">
        <input type="email" name="email" placeholder="E-mail*" autocomplete="off" required="">
    </div>
    <div class="single__block">
        <textarea name="message" placeholder="Введите текст сообщения"></textarea>
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
