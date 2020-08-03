<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @endif
            <div class="row">
                <div class="col-sm">
                    <form action="{{route('supplies.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="providers">Поставщик</label>
                            <select class="form-control" id="providers" name="provider">
                                @foreach($providerList as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="products">Товар</label>
                            <select class="form-control" id="products" name="product">
                                @foreach($productList as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
                <div class="col-sm">
                    <h5>Поставщики, которые сделали больше 1 поставки</h5>
                    <ul class="list-group">
                        @forelse($providersWithMoreThanOneSupply as $provider)
                            <li class="list-group-item">{{$provider->name}}</li>
                            @empty
                            <li class="list-group-item">Нет поставщиков</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
