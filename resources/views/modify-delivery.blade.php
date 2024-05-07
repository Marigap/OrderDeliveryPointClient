@extends("layouts.app")

@section("form")
    <div class="container">
        <div class="row">
      <div class="col">
          <div class="row">
              <div class="flex-column mb-2">
                <h1>Форма для обновления статуса доставки</h1>
                <form id="update_delivery_status_form">
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
                  <button type="submit" class="btn btn-primary update_delivery_status">Обновить</button>
                </form>
                <h1>Форма для удаления доставки</h1>
                <form id="delete_delivery_form" >
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
                  <button type="submit" class="btn btn-primary delete_delivery">Удалить</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col">
            <h1>Получить все активные доставки</h1>
            <form id="get_all_deliveries">
                @csrf
                <div class="form-group">
                <label for="text-area">Информация по доставкам</label>
                <textarea class="form-control" id="all-deliveries-text-area" rows="8" readonly>
                </textarea>
              </div>
              <button type="submit" class="btn btn-primary get_all_deliveries">Отправить</button>
            </form>
             <h1>История запросов</h1>
                <textarea class="form-control" id="history-text-area" rows="10" readonly>
                </textarea>
          </div>
            </div>
      </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.get_all_deliveries', function (e) {
                e.preventDefault();

                $.ajax({
                    method: "GET",
                    url: "/get-all-deliveries",
                    success: function (response) {
                        console.log(response);
                        $('#all-deliveries-text-area').val('\nData: ' + JSON.stringify(response.data));
                        $('#all-deliveries-text-area').val($('#all-deliveries-text-area').val() + '\nMessage: ' + response.message);
                    }
                });
            });

            $(document).on('click', '.update_delivery_status', function (e) {
                e.preventDefault();

                let data = $('#update_delivery_status_form').serialize();

                $('#history-text-area').val($('#history-text-area').val() + '\nRequest: ' + data);

                console.log(data);

                $.ajax({
                    method: "PUT",
                    url: "/update-delivery-status",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('#history-text-area').val($('#history-text-area').val() + '\nData: ' + JSON.stringify(response.data));
                        $('#history-text-area').val($('#history-text-area').val() + '\nMessage: ' + response.message);
                    }
                });
            });

            $(document).on('click', '.delete_delivery', function (e) {
                e.preventDefault();

                let data = $('#delete_delivery_form').serialize();

                $('#history-text-area').val($('#history-text-area').val() + '\nRequest: ' + data);

                console.log(data);

                $.ajax({
                    method: "DELETE",
                    url: "/delete-delivery",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('#history-text-area').val($('#history-text-area').val() + '\nData: ' + JSON.stringify(response.data));
                        $('#history-text-area').val($('#history-text-area').val() + '\nMessage: ' + response.message);
                    }
                });
            });
        });
    </script>
@endsection