<p>Тип недвижимости: {{ $data['estate-type'] }}</p>
<p>Адрес: {{ $data['address'] }}</p>
<p>Площадь: {{ $data['square'] }}</p>
@if($data['square-yard'])
    <p>Площадь земельного участка: {{ $data['square-yard'] }}</p>
@endif
<p>Желаемая стоимость продажи: {{ $data['cost'] }}</p>
<p>Имя: {{ $data['name'] }}</p>
<p>Телефон: {{ $data['phone'] }}</p>
