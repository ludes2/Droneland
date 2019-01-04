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

        <?php
            $result = array("January" => 0, "February" => 0, "March" => 0, "April" => 0, "May" => 0, "June" => 0, "July" => 0, "August" => 0, "September" => 0, "October" => 0, "November" => 0, "December" => 0);
            $purchases = 0;
            foreach ($orders as $order){
                echo 'totalPrice: ' . $purchases = $order->cart->totalPrice . ', ';
                echo '<br>';

                echo 'Date: ' . date_format($order->created_at, 'F');
                echo '<br>';
                echo '<br>';

                $result[date_format($order->created_at, 'F')] += $order->cart->totalPrice;
            }
            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        ?>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($months); ?>,
                    datasets: [{
                        label: 'test',
                        data: <?php echo json_encode(array_values($result));?>,
                        backgroundColor: [
                            'rgba(51, 153, 255, 0.2)',
                            'rgba(45, 89, 134, 0.2)',
                            'rgba(102, 0, 102, 0.2)',
                            'rgba(255, 102, 0, 0.2)',
                            'rgba(102, 0, 0, 0.2)',
                            'rgba(102, 51, 0, 0.2)',
                            'rgba(255, 255, 0, 0.2)',
                            'rgba(159, 255, 128, 0.2)',
                            'rgba(0, 153, 51, 0.2)',
                            'rgba(0, 51, 0, 0.2)',
                            'rgba(71, 107, 107, 0.2)',
                            'rgba(0, 0, 77, 0.2)'
                        ],
                        borderColor: [
                            'rgba(51, 153, 255, 1)',
                            'rgba(45, 89, 134, 1)',
                            'rgba(102, 0, 102, 1)',
                            'rgba(255, 102, 0, 1)',
                            'rgba(102, 0, 0, 1)',
                            'rgba(102, 51, 0, 1)',
                            'rgba(255, 255, 0, 1)',
                            'rgba(159, 255, 128, 1)',
                            'rgba(0, 153, 51, 1)',
                            'rgba(0, 51, 0, 1)',
                            'rgba(71, 107, 107, 1)',
                            'rgba(0, 0, 77, 1)'
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
                        text: 'Money Spent per Month'
                    }
                }
            });
        </script>
    </div>
</div>
