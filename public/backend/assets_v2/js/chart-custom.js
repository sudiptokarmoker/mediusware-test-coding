'use strict';
$(document).ready(function () {
    setTimeout(function () {

        // gender start
        $(function () {
            var chart = am4core.create("gender-pie-chart", am4charts.PieChart);
            chart.data = [{
                "country": "Mail",
                "litres": 201.9
            }, {
                "country": "Femail",
                "litres": 60
            }];
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            chart.legend = new am4charts.Legend();
        });
        // gender end

        // area start
        $(function () {
            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("area-chart", am4charts.XYChart);
            chart.data = [{
                    "country": "Dhaka",
                    "area Name": 100
            }, {
                    "country": "Barisal",
                    "area Name": 130
            },
                {
                    "country": "Rangpur",
                    "area Name": 160
            },
                {
                    "country": "Dhaka2",
                    "area Name": 190
            },
                {
                    "country": "Dhaka4",
                    "area Name": 210
            },
                {
                    "country": "Dhaka5",
                    "area Name": 230
            },
                {
                    "country": "Rangpur6",
                    "area Name": 260
            },
                {
                    "country": "Dhaka7",
                    "area Name": 290
            },
                {
                    "country": "Dhaka8",
                    "area Name": 310
            },
                {
                    "country": "Feni",
                    "area Name": 340
            }];

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.title.text = "Areas";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "area Graph";


            var series3 = chart.series.push(new am4charts.ColumnSeries());
            series3.dataFields.valueY = "area Name";
            series3.dataFields.categoryX = "country";
            series3.name = "area Name";
            series3.tooltipText = "{name}: [bold]{valueY}[/]";

            chart.cursor = new am4charts.XYCursor();
        });
        // area end

        // age start
        $(function () {


            var chart = am4core.create("age-chart", am4charts.PieChart);
            chart.data = [{
                "country": "20-30",
                "value": 100
}, {
                "country": "30-40",
                "value": 200
}, {
                "country": "40-50",
                "value": 300
}];

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "value";
            pieSeries.dataFields.category = "country";
            pieSeries.labels.template.disabled = true;
            pieSeries.ticks.template.disabled = true;

            chart.legend = new am4charts.Legend();
            chart.legend.position = "center";

            chart.innerRadius = am4core.percent(50);

            var label = pieSeries.createChild(am4core.Label);
            //  label.text = "${values.value.sum}";
            label.horizontalCenter = "middle";
            label.verticalCenter = "middle";
            label.fontSize = 40;

        })
        // age end

    }, 700);
});
