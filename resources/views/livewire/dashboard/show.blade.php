<div class="row">
    <div class="col-xl-6 col-sm-2">
        <div class="card">
            <div class="card-body" dir="ltr">
                <h4 class="header-title mb-4">Mis ventas</h4>
                <div class="bar-container" style="width: 100%;height: 300px;">
                    <svg class="britechart bar-chart" width="600.8375244140625" height="300">
                        <g class="container-group " transform="translate(65, 10)">

                            @php
                            $variacion=5;
                            $var=0;
                            @endphp

                            <g class="chart-group  rotate-90 ">
                                @foreach($pedidos_graficos as $index=> $pedido)
                                @php
                                $y = (270/25000)*$pedido->total;
                                $alto=(270-$y);
                                $variacion+=20;
                                @endphp
                                <rect class="bar" x="{{$variacion }}" y="{{$alto}}" width="15" height="{{$y}}" fill="#56c2d6" data-toggle="tooltip" data-placement="top" title="{{round($pedido->total,2)}} Bs"></rect>
                                @endforeach
                            </g>
                            <g class="x-axis-group axis" transform="translate(0, 270)" fill="none" font-size="10" font-family="sans-serif" text-anchor="middle">
                                <g class="x-axis-label"></g>
                                <path class="domain" stroke="#000" d="M0.5,6V0.5H524.3375244140625V6"></path>
                                @foreach($pedidos_graficos as $index=> $pedido)
                                @php
                                $var+=20;
                                @endphp
                                <g class="tick" opacity="1" transform="translate({{$var}},0)">
                                    <line stroke="#000" y2="6"></line><text fill="#000" y="9" dy="0.71em">{{$index}}</text>
                                </g>
                                @endforeach


                            </g>
                            <g transform="translate(-10, 0)" class="y-axis-group axis" fill="none" font-size="10" font-family="sans-serif" text-anchor="end">
                                <g class="y-axis-label"></g>
                                <path class="domain" stroke="#000" d="M-6,270.5H0.5V0.5H-6"></path>
                                <g class="tick" opacity="1" transform="translate(0,270.5)">
                                    <line stroke="#000" x2="-6"></line><text fill="#000" x="-9" dy="0.32em">
                                        <tspan x="0" dy="0.32em">0</tspan>
                                    </text>
                                </g>
                                <g class="tick" opacity="1" transform="translate(0,258.5)">
                                    <line stroke="#000" x2="-6"></line><text fill="#000" x="-9" dy="0.32em">
                                        <tspan x="0" dy="0.32em">1,000</tspan>
                                    </text>
                                </g>
                                <g class="tick" opacity="1" transform="translate(0,210.5)">
                                    <line stroke="#000" x2="-6"></line><text fill="#000" x="-9" dy="0.32em">
                                        <tspan x="0" dy="0.32em">5,000</tspan>
                                    </text>
                                </g>
                                <g class="tick" opacity="1" transform="translate(0,160.5)">
                                    <line stroke="#000" x2="-6"></line><text fill="#000" x="-9" dy="0.32em">
                                        <tspan x="0" dy="0.32em">10,000</tspan>
                                    </text>
                                </g>
                                <g class="tick" opacity="1" transform="translate(0,104.5)">
                                    <line stroke="#000" x2="-6"></line><text fill="#000" x="-9" dy="0.32em">
                                        <tspan x="0" dy="0.32em">15,000</tspan>
                                    </text>
                                </g>
                                <g class="tick" opacity="1" transform="translate(0,62.5)">
                                    <line stroke="#000" x2="-6"></line><text fill="#000" x="-9" dy="0.32em">
                                        <tspan x="0" dy="0.32em">20,000</tspan>
                                    </text>
                                </g>
                                <g class="tick" opacity="1" transform="translate(0,21.5)">
                                    <line stroke="#000" x2="-6"></line><text fill="#000" x="-9" dy="0.32em">
                                        <tspan x="0" dy="0.32em">25,000</tspan>
                                    </text>
                                </g>
                            </g>


                        </g>
                    </svg>
                </div>

            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->


    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body" dir="ltr">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                <!-- end card body-->
            </div>
        </div>
        <!-- end col-->
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body" dir="ltr">
                <div id="chartContainers" style="height: 370px; width: 100%;"></div>
                <span id="timeToRender"></span>
                <!-- end card body-->
            </div>
        </div>
        <!-- end col-->
    </div>


    @php
     $y = 100;
    $dataPoint2 = [];
    $data2=[];
    foreach($pedidos_graficos as $pedido){
        array_push($data2, ["x" => $pedido->id, "y" => $pedido->total]);

    }
     $dataPoint2 = array_merge($dataPoint2, $data2);

        $dataPoints = [];
        $data = [];
        foreach($productos as $producto) {
        array_push($data, ["label" => $producto->nombre, "y" => $producto->total]);
        }

        $dataPoints = array_merge($dataPoints, $data);
        @endphp
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    exportEnabled: true,
                    title: {
                        text: "Mis ventas"
                    },
                    subtitles: [{
                        text: "Productos"
                    }],
                    data: [{
                        type: "pie",
                        showInLegend: "true",
                        legendText: "{label}",
                        indexLabelFontSize: 16,
                        indexLabel: "{label} - #percent%",
                        yValueFormatString: "Bs#,##0",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
                //-------------------------------------------------
                var data = [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoint2, JSON_NUMERIC_CHECK); ?>
                }];

                //Better to construct options first and then pass it as a parameter
                var options = {
                    zoomEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "Pedidos"
                    },
                    axisY: {
                        lineThickness: 1
                    },
                    data: data // random data
                };

                var chart = new CanvasJS.Chart("chartContainers", options);
                 chart.render();
 
            }
        </script>