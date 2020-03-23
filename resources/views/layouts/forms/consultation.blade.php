<form action="{{ route('send.consultation') }}" class="check__availability" id="form__consultation" method="post">
    @csrf
    <div class="row">
        <div class="col-3">
            <div class="check__availability-name">
                Заказать консультацию
            </div>
        </div>
        <div class="col-9 right">
            <div class="single__block">
                <label for="name">Имя*:</label>
                <input type="text" name="name" id="name" autocomplete="off" required="">
            </div>
            <div class="single__block">
                <label for="phone">Телефон*:</label>
                <input type="text" name="phone" id="phone" class="phone__mask" autocomplete="off" required="">
            </div>
            <div class="single__block">
                <label for="email">E-mail*:</label>
                <input type="email" name="email" id="email" autocomplete="off" required="">
            </div>
            <div class="single__block submit">
                <button type="submit" class="btn">Узнать</button>
            </div>
        </div>
    </div>
</form>
