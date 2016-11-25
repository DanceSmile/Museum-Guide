jQuery(document).ready(function ($) {
    try {
        // Line Chart
        var chartOptions = {
            grid: {
                hoverable: true,
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                clickable: true,
                borderColor: "#f0f0f0",
                margin: {
                    top: 10,
                    right: 10,
                    bottom: 0,
                    left: 10
                },
                minBorderMargin: 1,
                labelMargin: 20,
                mouseActiveRadius: 30,
                backgroundColor: {
                    colors: ["#fff", "#fff"]
                }
            },
            legend: {
                noColumns: 0,
                show: false,
                labelFormatter: function (label, series) {
                    return "<span class=\"w_legend\">" + label + "</span>";
                },
                backgroundOpacity: 0.9,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            series: {
                stack: true,
                shadowSize: 1

            },
            xaxis: {
                show: true,
                color: '#eee',
                ticks: [
                    [1, "Sat"],
                    [2, "Sun"],
                    [3, "Mon"],
                    [4, "Tue"],
                    [5, "Wed"],
                    [6, "Thu"],
                    [7, "Fri"]
                ]

            },
            yaxis: {
                ticks: false,
                tickLength: 0

            },
            tooltip: {
                show: true,
                cssClass: "StatsFlotTip",
                content: "$%y(USD)"
            },
            colors: ["#87cfcb"]
        };
        var chartData = {
            label: "Earning",
            lines: {
                show: false,
                fill: true,
                lineWidth: 2
            },
            splines: {
                show: true,
                tension: 0.5,
                lineWidth: 2,
                fill: 0
            },
            points: {
                show: true,
                lineWidth: 2,
                radius: 4,
                symbol: "circle",
                fill: true,
                fillColor: "#ffffff"

            },
            data: [
                [1, 3500],
                [2, 3600],
                [3, 3100],
                [4, 3900],
                [5, 3500],
                [6, 3800],
                [7, 4200]
            ]
        };


        $.plot($("#weekly-earning"), [chartData], chartOptions);

        $("#weekly-earning").bind("plotclick", function (event, pos, item) {
            if (item) {
                var Ubox = bootbox.dialog({
                    title: "Information for: " + item.series.xaxis.ticks[item.dataIndex].label + ": $" + item.datapoint[1],
                    message: '<div class="row">  ' +
                        '<div class="col-md-12"> ' +
                        '<div class="sparkline" data-type="line" data-resize="true" data-height="200" data-width="100%" data-line-width="1" data-min-spot-color="#e65100" data-max-spot-color="#ffb300" data-line-color="#00acc1" data-spot-color="#00838f" data-fill-color="false" data-highlight-line-color="#00acc1" data-highlight-spot-color="#ff8a65" data-spot-radius="4" data-data="[450,480,500,590,600,640,560,530,500,540, 570,600,550,520,510,500,510,540,580,590,580,564,600,700]">' +

                        '</div>' +
                        '</div>  </div>',
                    buttons: {
                        cancel: {
                            label: "Cancel",
                            className: "btn-danger"
                        }
                    }
                });


            }
        });


        //Real Time Chart

        function RealTimeChart() {
            var data = [];
            var dataset;
            var totalPoints = 50;
            var updateInterval = 1000;
            var now = new Date().getTime();


            function GetData() {
                data.shift();

                while (data.length < totalPoints) {
                    var y = Math.random() * 100;
                    var temp = [now += updateInterval, y];

                    data.push(temp);
                }
            }

            var options = {
                series: {
                    lines: {
                        show: false,
                        lineWidth: 2,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.5,
                        lineWidth: 1.5,
                        fill: 0.0
                    }
                },
                xaxis: {
                    mode: "time",
                    color: "#eee",
                    tickLength: 0,
                    tickSize: [2, "second"],
                    tickFormatter: function (v, axis) {
                        var date = new Date(v);

                        if (date.getSeconds() % 20 == 0) {
                            var hours = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
                            var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                            var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

                            return hours + ":" + minutes + ":" + seconds;
                        } else {
                            return "";
                        }
                    },
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelPadding: 10
                },
                yaxis: {
                    min: 0,
                    max: 100,
                    color: "#eee",
                    tickSize: 10,
                    ticks: false,
                    tickFormatter: function (v, axis) {
                        if (v % 10 == 0) {
                            return v + "%";
                        } else {
                            return "";
                        }
                    },
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelPadding: 6
                },
                grid: {
                    hoverable: true,
                    borderWidth: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0
                    },
                    clickable: true,
                    borderColor: "#f0f0f0",
                    margin: {
                        top: 10,
                        right: 10,
                        bottom: 0,
                        left: 10
                    },
                    minBorderMargin: 1,
                    labelMargin: 20,
                    mouseActiveRadius: 30,
                    backgroundColor: {
                        colors: ["#fff", "#fff"]
                    }
                },
                legend: {
                    labelBoxBorderColor: "#fff",
                    container: $("#reatime-chart-legend")
                },
                colors: ["#1976d2"]
            };


            // Load Chart
            GetData();

            dataset = [{
                label: "Visitors",
                data: data
            }];

            $.plot($("#realtime-chart"), dataset, options);

            function update() {
                GetData();

                $.plot($("#realtime-chart"), dataset, options)
                setTimeout(update, updateInterval);
            }

            update();

        }
        RealTimeChart();




        var dt1 = [];
        for (var i = 0; i <= 10; i ++) {
            dt1.push([i, parseInt(Math.random() * 80)]);
        }
        var dt2 = [];
        for (var i = 0; i <= 10; i ++) {
            dt2.push([i, parseInt(Math.random() * 80)]);
        }
        var dt3 = [];
        for (var i = 0; i <= 10; i ++) {
            dt3.push([i, parseInt(Math.random() * 80)]);
        }

        dataOcean = [{
            data: dt1,
            label: "WP Theme",
            lines: {
                show: true,
                fill: 1,
                lineWidth: 0
            }
        }, {
            data: dt2,
            label: "Admin Template",
            lines: {
                show: true,
                fill: 0.8,
                lineWidth: 0
            }


        }, {
            data: dt3,
            label: "Joomla",
            lines: {
                show: true,
                fill: 0.8,
                lineWidth: 0
            }
        }];
        options = {
            legend: {
                position: "nw",
                noColumns: 1,
                container: $("#ocean-flot-legend")
            },
            grid: {
                hoverable: true,
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                clickable: false,
                borderColor: "#000",
                margin: {
                    top: 10,
                    right: 10,
                    bottom: 0,
                    left: 10
                },
                minBorderMargin: 1,
                labelMargin: 0,
                mouseActiveRadius: 30,
                backgroundColor: {
                    colors: ["#fff", "#fff"]
                }
            },
            series: {
                stack: true,
                shadowSize: 0,

                curvedLines: {
                    apply: true,
                    active: true,
                    monotonicFit: true
                }
            },
            xaxis: {
                show: true,
                color: '#eee',
                ticks: false
            },
            yaxis: {
                tickLength: 0,
                ticks: false
            },
            tooltip: {
                show: true,
                cssClass: "MainFlotTip",
                content: '<h5>%s</h5>' + "Sold: %y"
            },
            colors: ["#009688", "#43a047", "#8bc34a"]
        }


        MultiLine = [{
            data: dt1,
            label: "Bingo",
            lines: {
                show: true,
                fill: 0.8,
                lineWidth: 0
            }
        }, {
            data: dt2,
            label: "Srabon",
            lines: {
                show: true,
                fill: 0.8,
                lineWidth: 0
            }


        }, {
            data: dt3,
            label: "Falgun",
            lines: {
                show: true,
                fill: 0.8,
                lineWidth: 0
            }
        }];
        MultiLineOptions = {
            legend: {
                position: "nw",
                noColumns: 4,
                container: $("#ocean-chart-legend")
            },
            grid: {
                hoverable: true,
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                clickable: false,
                borderColor: "#000",
                margin: {
                    top: 10,
                    right: 20,
                    bottom: 0,
                    left: 20
                },
                minBorderMargin: 1,
                labelMargin: 20,
                mouseActiveRadius: 30,
                backgroundColor: {
                    colors: ["#fff", "#fff"]
                }
            },
            series: {
                stack: true,
                shadowSize: 0,

                curvedLines: {
                    apply: true,
                    active: true,
                    monotonicFit: true
                }
            },
            xaxis: {
                show: true,
                color: '#eee'
            },
            yaxis: {
                tickLength: 0,
                ticks: false
            },
            tooltip: {
                show: true,
                cssClass: "MainFlotTip",
                content: '<h5>%s</h5>' + "Sold: %y"
            },
            colors: ["#009688", "#43a047", "#8bc34a"]
        }



        var spdata1 = [
            [1, 300],
            [2, 200],
            [3, 390],
            [4, 420],
            [5, 300],
            [6, 406],
            [7, 500],
            [8, 600],
            [9, 650],
            [10, 700]
        ];
        var spdata2 = [
            [1, 340],
            [2, 250],
            [3, 420],
            [4, 500],
            [5, 350],
            [6, 470],
            [7, 590],
            [8, 680],
            [9, 700],
            [10, 780]
        ];
        var spdata3 = [
            [1, 300],
            [2, 200],
            [3, 390],
            [4, 420],
            [5, 300],
            [6, 406],
            [7, 500],
            [8, 600],
            [9, 650],
            [10, 700]
        ];

        MultiSpLine = [{
            data: spdata1,
            label: "SMS",
            lines: {
                show: false,
                fill: 0.8,
                lineWidth: 0
            }
        }, {
            data: spdata2,
            label: "CALL",
            lines: {
                show: false,
                fill: 0.8,
                lineWidth: 0
            }


        }, {
            data: spdata3,
            label: "EMAIL",
            lines: {
                show: false,
                fill: 0.8,
                lineWidth: 0
            }
        }];
        MultiSpLineOptions = {
            legend: {
                position: "nw",
                noColumns: 4,
                container: $("#ocean-chart-legend")
            },
            grid: {
                hoverable: true,
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                clickable: false,
                borderColor: "#000",
                margin: {
                    top: 10,
                    right: 20,
                    bottom: 0,
                    left: 20
                },
                minBorderMargin: 1,
                labelMargin: 20,
                mouseActiveRadius: 30,
                backgroundColor: {
                    colors: ["#fff", "#fff"]
                }
            },
            series: {
                stack: true,
                shadowSize: 0,

                splines: {
                    show: true,
                    tension: 0.3,
                    lineWidth: 2,
                    fill: .03
                },
                points: {
                    show: true,
                    lineWidth: 1.5,
                    radius: 2.5,
                    symbol: "circle",
                    fill: true,
                    fillColor: "#ffffff"

                }
            },
            xaxis: {
                show: true,
                color: '#eee'
            },
            yaxis: {
                tickLength: 0,
                ticks: false,
                color: '#eee'
            },
            tooltip: {
                show: true,
                cssClass: "MainFlotTip",
                content: "%s: %y"
            },
            colors: ["#1565c0", "#2e7d32", "#e65100"]
        }




        var maindata1 = [
            [1, 300],
            [2, 200],
            [3, 390],
            [4, 420],
            [5, 300],
            [6, 406],
            [7, 500],
            [8, 600],
            [9, 650],
            [10, 700]
        ];
        var maindata2 = [
            [1, 340],
            [2, 250],
            [3, 420],
            [4, 500],
            [5, 350],
            [6, 470],
            [7, 590],
            [8, 680],
            [9, 700],
            [10, 780]
        ];
        var maindata3 = [
            [1, 100],
            [2, 150],
            [3, 590],
            [4, 400],
            [5, 380],
            [6, 496],
            [7, 590],
            [8, 690],
            [9, 750],
            [10, 850]
        ];

        maindataSet = [{
            data: maindata1,
            label: "Joomla",
            lines: {
                show: false,
                fill: 0,
                lineWidth: 1.5
            },
            splines: {
                show: true,
                tension: 0.3,
                lineWidth: 2,
                fill: 0
            },
            points: {
                show: true,
                lineWidth: 1.5,
                radius: 3,
                symbol: "circle",
                fill: true,
                fillColor: "#ffffff"

            }
        }, {
            data: maindata2,
            label: "Admin Template",
            bars: {
                show: true,
                fill: 0.6,
                lineWidth: 0,
                barWidth: 0.6
            }


        }, {
            data: maindata3,
            label: "WP Theme",
            lines: {
                show: true,
                fill: 0,
                lineWidth: 1.5
            },
            points: {
                show: true,
                lineWidth: 1.5,
                radius: 3,
                symbol: "circle",
                fill: true,
                fillColor: "#ffffff"

            }
        }];
        maindataOptions = {
            legend: {
                position: "nw",
                noColumns: 3,
                container: $("#main-chart-legend")
            },
            grid: {
                hoverable: true,
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                clickable: true,
                borderColor: "#eee",
                margin: {
                    top: 10,
                    right: 20,
                    bottom: 0,
                    left: 20
                },
                minBorderMargin: 1,
                labelMargin: 20,
                mouseActiveRadius: 30,
                backgroundColor: {
                    colors: ["#fff", "#fff"]
                }
            },
            series: {
                stack: false,
                shadowSize: 0
            },
            xaxis: {
                tickLength: 0,
                ticks: false,
                show: true,
                color: '#eee'
            },
            yaxis: {
                show: true,
                color: '#f5f5f5'
            },
            tooltip: {
                show: true,
                cssClass: "MainFlotTip",
                content: "<strong>" + "%s" + ": </strong>" + "$%y (USD)"
            },
            colors: ["#1565c0", "#2e7d32", "#e65100"]
        }



        var maindata1 = [
            [1, 300],
            [2, 200],
            [3, 300],
            [4, 300],
            [5, 350],
            [6, 400],
            [7, 500],
            [8, 400],
            [9, 500],
            [10, 600],
            [11, 700],
            [12, 800]
        ];
        var maindata2 = [
            [1, 400],
            [2, 300],
            [3, 400],
            [4, 300],
            [5, 400],
            [6, 500],
            [7, 600],
            [8, 500],
            [9, 600],
            [10, 700],
            [11, 800],
            [12, 900]
        ];
        var maindata3 = [
            [1, 500],
            [2, 400],
            [3, 500],
            [4, 400],
            [5, 500],
            [6, 600],
            [7, 700],
            [8, 500],
            [9, 700],
            [10, 800],
            [11, 900],
            [12, 1000]
        ];

        linedataSet = [{
            data: maindata3,
            label: "2012",
            lines: {
                show: true,
                fill: 0.3,
                lineWidth: 1.5
            },
            points: {
                show: true,
                lineWidth: 1.5,
                radius: 3,
                symbol: "circle",
                fill: true,
                fillColor: "#ffffff"

            }
        }, {
            data: maindata2,
            label: "2013",
            lines: {
                show: true,
                fill: 0.3,
                lineWidth: 1.5
            },
            points: {
                show: true,
                lineWidth: 1.5,
                radius: 3,
                symbol: "circle",
                fill: true,
                fillColor: "#ffffff"

            }


        }, {
            data: maindata1,
            label: "2014",
            lines: {
                show: true,
                fill: 0.3,
                lineWidth: 1.5
            },
            points: {
                show: true,
                lineWidth: 1.5,
                radius: 3,
                symbol: "circle",
                fill: true,
                fillColor: "#ffffff"

            }
        }];
        linedataSetOptions = {
            legend: {
                position: "nw",
                noColumns: 3,
                container: $("#line-chart-legend")
            },
            grid: {
                hoverable: true,
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                clickable: true,
                borderColor: "#eee",
                margin: {
                    top: 10,
                    right: 20,
                    bottom: 0,
                    left: 20
                },
                minBorderMargin: 1,
                labelMargin: 20,
                mouseActiveRadius: 30,
                backgroundColor: {
                    colors: ["#fff", "#fff"]
                }
            },
            series: {
                stack: true,
                shadowSize: 0
            },
            xaxis: {
                show: true,
                color: "#f5f5f5",
                tickSize: 1
            },
            yaxis: {
                show: true,
                color: '#f5f5f5',
                tickSize: 200
            },
            tooltip: {
                show: true,
                cssClass: "MainFlotTip",
                content: "Year: %s,  %x %y"
            },
            colors: ["#1565c0", "#2e7d32", "#e65100"]
        }




        var chart = $.plot($("#ocean-flot"), dataOcean, options);
        var chartMultiLine = $.plot($("#multiline-flot"), MultiLine, MultiLineOptions);
        var chartMultiSpLine = $.plot($("#multispline-flot"), MultiSpLine, MultiSpLineOptions);
        var MainChart = $.plot($("#main-chart"), maindataSet, maindataOptions);
        var MainLineChart = $.plot($("#main-line-chart"), linedataSet, linedataSetOptions);



        var dataPie = [{
            label: "Dribbble",
            data: 30
        }, {
            label: "Google",
            data: 30
        }, {
            label: "Envato",
            data: 40
        }];

        var DataOptions = {
            series: {
                pie: {
                    innerRadius: 0.7,
                    show: true,
                    stroke: {
                        width: 0.1
                    }
                }
            },
            legend: {
                position: "nw",
                noColumns: 3,
                container: $("#pie-chart-legend")
            },
            grid: {
                hoverable: true
            },
            tooltip: {
                show: true,
                cssClass: "MainFlotTip",
                content: "%p.0%, From: %s", //"%p.0%, %s, n=%n",
                shifts: {
                    x: 20,
                    y: 0
                }
            },
            colors: ["#EC4A89", "#2B71ED", "#7CB553"]
        };

        var pieChart = $.plot($("#pie-chart"), dataPie, DataOptions);



        var ColoredChartOptions = {
            grid: {
                hoverable: true,
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                clickable: true,
                borderColor: "#f0f0f0",
                margin: {
                    top: 10,
                    right: 10,
                    bottom: 0,
                    left: 10
                },
                minBorderMargin: 1,
                labelMargin: 20,
                mouseActiveRadius: 30,
                backgroundColor: {
                    colors: ["#009688", "#009688"]
                }
            },
            legend: {
                noColumns: 0,
                show: false,
                labelFormatter: function (label, series) {
                    return "<span class=\"w_legend\">" + label + "</span>";
                },
                backgroundOpacity: 0.9,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            series: {
                stack: true,
                shadowSize: 1

            },
            xaxis: {
                show: true,
                color: 'rgba(255,255,255,.2)',
                ticks: [
                    [1, "Sat"],
                    [2, "Sun"],
                    [3, "Mon"],
                    [4, "Tue"],
                    [5, "Wed"],
                    [6, "Thu"],
                    [7, "Fri"]
                ]

            },
            yaxis: {
                ticks: false,
                tickLength: 0

            },
            tooltip: {
                show: true,
                cssClass: "StatsFlotTip",
                content: "$%y(USD)"
            },
            colors: ["#8bc34a"]
        };
        var ColoredChartData = {
            label: "Earning",
            lines: {
                show: false,
                fill: true,
                lineWidth: 2
            },
            splines: {
                show: true,
                tension: 0.5,
                lineWidth: 2,
                fill: 0
            },
            points: {
                show: true,
                lineWidth: 2,
                radius: 4,
                symbol: "circle",
                fill: true,
                fillColor: "#ffffff"

            },
            data: [
                [1, 3500],
                [2, 3600],
                [3, 3100],
                [4, 3900],
                [5, 3500],
                [6, 3800],
                [7, 4200]
            ]
        };

        $.plot($("#colored-line-chart"), [ColoredChartData], ColoredChartOptions);

        var ticks = $("#colored-line-chart .tickLabel").slice(0, 7);
        ticks.each(function (i) {
            $(this).css("color", "#f5f5f5");
        });

    } catch (e) {

    }

});