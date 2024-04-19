@extends("layouts.app")

@section("form")
    <div class="container">
      <div class="row">
          <div class="row">
              <div class="flex-column mb-2">
                <h1>Форма для обновления статуса доставки</h1>
                <form action="/update-delivery-status" method="post">
                  @method('PUT')
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
                      <label for="delivery_id">Идентификатор доставки</label>
                      <input
                              type="number" class="form-control" id="delivery_id" placeholder="Введите идентификатор доставки" name="delivery_id"
                      >
                  </div>
                  <div class="form-group">
                    <label for="status">Статус доставки</label>
                    <select id="status" class="form-select" name="status" size="1">
                        <option value="processing">Готовится к отправке</option>
                        <option value="in_transit">В пути</option>
                        <option value="delivered">Доставлен в пункт выдачи</option>
                        <option value="picked_up">Забран получателем</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="current_location">Текущее местоположение</label>
                    <input
                            type="text" class="form-control" id="current_location" placeholder="Введите город в котором сейчас находится заказ" name="current_location"
                    >
                  </div>
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </form>
                <h1>Форма для удаления доставки</h1>
                <form action="/delete-delivery">
                    @method('DELETE')
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
                      <label for="delivery_id">Идентификатор доставки</label>
                      <input
                              type="number" class="form-control" id="delivery_id" placeholder="Введите идентификатор доставки" name="delivery_id"
                      >
                  </div>
                  <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <h1>Получить все активные доставки</h1>
            <form action="/get-all-deliveries" method="get">
              @csrf
                <div class="form-group">
                <label for="text-area">Информация по доставкам</label>
                <textarea class="form-control" id="text-area" rows="3">
                    @foreach ($deliveries as $delivery){{json_encode($delivery, JSON_UNESCAPED_UNICODE) . PHP_EOL}}@endforeach
                </textarea>
              </div>
              <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
          </div>
      </div>
@endsection