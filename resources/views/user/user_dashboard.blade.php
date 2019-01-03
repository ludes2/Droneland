<div class="row pt-4 justify-content-lg-center">
    <div class="col-md-10">

        <div class="card">
            <div class="card-header bg-light my-auto">
                <h6>@lang('messages.my_orders')</h6>
                <a href="#"  class="btn btn-primary" arole="button">show as list</a>
                <a href="#" class="btn btn-primary" arole="button">show as Chart</a>
            </div>
            <div class="card-body">

                <canvas id="myChart" width="400" height="400"></canvas>

                @foreach($orders as $order)
                    <div class="card mt-2">
                        <div class="card-header">
                            @lang('messages.orderdate'): {{ $order->created_at }}
                        </div>
                        <div class="card-body">
                            <table class="table table-sm text-center">
                                <thead>
                                <tr>
                                    <th class="text-left" scope="col">@lang('messages.product')</th>
                                    <th scope="col">@lang('messages.price')</th>
                                    <th scope="col">@lang('messages.quantity')</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->cart->items as $item)
                                    <tr>
                                        <td class="text-left">{{ $item['item']['title'] }}</td>
                                        <td>{{ number_format($item['item']['price'], 0, ',', "'") }}.-</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>{{ number_format($item['price'], 0, ',', "'") }}.-</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tr>
                                    <td class="text-right" colspan="4"><b>@lang('messages.amount_payed'): {{ number_format($order->cart->totalPrice, 0, ',', "'") }}.-</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Januar", "Febraur", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                    datasets: [{
                        label: '# of Orders',
                        data: [12, 19, 3, 5, 2, 3, 8, 12, 19, 3, 5, 2, 3, 8],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'My Orders'
                    }
                }
            });
        </script>
    </div>
</div>
