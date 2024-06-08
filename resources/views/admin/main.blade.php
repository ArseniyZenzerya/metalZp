@extends('layouts.admin')

@section('content')
    <div class="container">
        <div>
            Перегляд статистики продуктів
        </div>
        <canvas id="productViewsChart" width="800" height="400"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: '/admin/api/product-views',
                method: 'GET',
                success: function(response) {
                    var data = response.data;

                    var dates = [];
                    var products = [];
                    var datasets = [];

                    var totalViews = {};

                    var productsViews = {};
                    data.forEach(function(product) {
                        if (!dates.includes(product.date)) {
                            dates.push(product.date);
                        }
                        if (!products.includes(product.product_name)) {
                            products.push(product.product_name);
                        }
                        if (!productsViews[product.date]) {
                            productsViews[product.date] = {};
                        }
                        if (!productsViews[product.date][product.product_name]) {
                            productsViews[product.date][product.product_name] = 0;
                        }
                        productsViews[product.date][product.product_name] += product.views;

                        if (!totalViews[product.date]) {
                            totalViews[product.date] = 0;
                        }
                        totalViews[product.date] += product.views;
                    });

                    products.forEach(function(product) {
                        var viewsData = [];
                        var cumulativeViews = 0;
                        dates.forEach(function(date) {
                            cumulativeViews += productsViews[date][product] || 0;
                            viewsData.push(cumulativeViews);
                        });
                        var dataset = {
                            label: product,
                            data: viewsData,
                            backgroundColor: getRandomColor(),
                            borderColor: getRandomColor(),
                            borderWidth: 1
                        };
                        datasets.push(dataset);
                    });

                    var ctx = document.getElementById('productViewsChart').getContext('2d');
                    var productViewsChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: dates,
                            datasets: datasets
                        },
                        options: {
                            scales: {
                                x: {
                                    stacked: true
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>
@endsection
