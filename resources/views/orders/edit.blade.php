@extends ('layout')

@section ('content')

<h3>Редактирование партнера: 
{{$order->partner->name}}
</h3><hr>
{{   Form::open(['url' => route('orders.update', $order->id), 'method' => 'PATCH']) }}
{{ Form::hidden('partnerId', $order->partner->id)}}
{{ Form::text('partnerEmail', $order->partner->email)}} <br><br>
{{ Form::text('partnerName', $order->partner->name)}} <br><br>
<p>
@foreach ( $order->orderProducts as $product )
            {{$product->name}} *
            {{$product->quantity}} шт. по
            {{$product->price}} руб
            <br>
@endforeach  </p>

{{  Form::select('orderStatus', [
    '0' => 'Новый', 
    '10' => 'Подтвержден',
    '20' => 'Завершен',
    ], $order->status)  }}
    <br><br>

<p>Стоимость заказа: {{$order->price}}</p>
<br>                   
{{Form::submit('Сохраненить изменения в заказе')}}
{{ Form::close() }}
@endsection