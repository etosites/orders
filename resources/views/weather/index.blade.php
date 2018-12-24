@extends ('layout')

@section ('content')
 <div class="page-header">
 <h1>
Погода в Брянске
 </h1>
 </div>
 <div class="row">
 @foreach ( $weather as $key => $value )
                                @if ($key == 'Иконка погоды')
                                       <img width = "100" src = "{{'https://yastatic.net/weather/i/icons/blueye/color/svg/'.$value.'.svg'}}">
                                @else

                                @if ($key == 'Время замера')
                                        {{$key}} : 
                                        {{date('Y-m-d H:i:s', $value)}}
                                @else
  

                                @if ($key == 'Признак полярного дня или ночи')
                                        {{$key}} : 
                                        @if ($value == TRUE)
                                        Да
                                        @else
                                        Нет
                                        @endIf
                                @else

                                {{$key}} : {{$value}}
                                @endIf
                                @endIf
                                @endIf
                                <br>
                        @endforeach   


</div>
@endsection