@extends ('layout')

@section ('content')
 <div class="page-header">
 <h1>
Список заказов
 </h1>
 </div>
 <div class="row">



 <table class="table table-bordered">
   <caption>Таблица заказов</caption>
   <thead>
    <th>ид_заказа</th>
    <th>название_партнера</th>
    <th>стоимость_заказа</th>
    <th>наименование_состав_заказа</th>
    <th>статус_заказа</th>
   </tr>
   </thead>
   <tbody>
        
        @foreach ( $orders as $k=>$order )
        <tr>
                <td>
                        <a target="_blank" href='{{route('orders.update', $order->id.'/edit')}}'>{{$order->id}}</a>
                </td>
                <td>
                        {{$order->partner->name}}
                </td>
                <td>
                        {{$order->price}}
                </td>
                <td>
                        @foreach ( $order->orderProducts as $product )
                                {{$product->name}} *
                                {{$product->quantity}} шт. по
                                {{$product->price}} руб
                                <br>
                        @endforeach        
                </td>
                <td>
                @switch($order->status)
                        @case(0)
                                Новый
                                @break

                        @case(10)
                                Подтвержден
                                @break
                        @case(20)
                                Завершен
                                @break

                        
                        @endswitch
                        
                </td>
        </tr>
        @endforeach
        </tbody>
 </div>
 {{ $orders->links() }}
@endsection