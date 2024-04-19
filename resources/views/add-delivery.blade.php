@extends("layouts.app")

@section("form")
    <div class="container">
    <h1>Форма заказа</h1>
    <form action="/add-delivery" method="post">
      @csrf
      @if($errors->any())
        <div>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="form-group">
        <label for="name">Название заказа</label>
        <input type="text" class="form-control" id="name" placeholder="Введите название заказа" name="order_name">
      </div>
      <div class="form-group">
        <label for="weight">Вес заказа</label>
        <input type="number" class="form-control" id="weight" placeholder="Введите вес заказа" name="order_weight">
      </div>
      <div class="form-group">
        <label for="city">Город</label>
        <input type="text" class="form-control" id="city" placeholder="Введите город" name="current_location">
      </div>
      <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" placeholder="Введите имя" name="client_name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Введите email" name="email">
      </div>
      <div class="form-group">
        <label for="phone">Телефон</label>
        <input type="tel" class="form-control" id="phone" placeholder="Введите телефон" name="phone">
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="notification" name="need_notify"> Нужно отправлять уведомления
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
  </div>
@endsection