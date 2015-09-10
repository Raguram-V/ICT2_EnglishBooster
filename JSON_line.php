<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">


<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Performance</title>
		<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
		<script src="http://www.amcharts.com/lib/3/serial.js"></script>
		<script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script
    </head>

    <body>
		
		<div id="chartdiv" style="width: 100%; height: 400px;"></div>
		<script>
			var chart = AmCharts.makeChart( "chartdiv", {
				  "type": "serial",
				  "dataLoader": {
					"url": "Performance.php",
					"format":"json"
				  },
				   <!-- dataDateFormat: "YYYY-MM-DD",
                categoryField: "Quiz",


                categoryAxis: {
                    <!--parseDates: true,-->
                    minPeriod: "DD",
                    gridAlpha: 0.1,
                    minorGridAlpha: 0.1,
                    axisAlpha: 0,
                    minorGridEnabled: true,
                    inside: true
                },

                valueAxes: [{

                    tickLength: 0,
                    axisAlpha: 0,
                    showFirstLabel: false,
                    showLastLabel: false,

                    guides: [{
                        value: 40,
                        toValue: 80,
                        fillColor: "#00CC00",
                        inside: true,
                        fillAlpha: 0.2,
                        lineAlpha: 0
                    }]

                }],


                graphs: [{
                    lineColor: "#00CC00",
                    valueField: "value",
                    dashLength: 3,
                    bullet: "round",
                    balloonText: "[[category]]<br><b><span style='font-size:14px;'>value:[[value]]</span></b>"
                }],

                chartCursor: {},
                chartScrollbar: {},

                mouseWheelZoomEnabled:true,

                trendLines: [{
                   <!-- initialDate: new Date(2012, 0, 2, 12),
                   <!-- finalDate: new Date(2012, 0, 11, 12),
                    initialValue: 328,
                    finalValue: 4252,
                    lineColor: "#CC0000"
                },
                {
                    <!-- initialDate: new Date(2012, 0, 17, 12),
                    <!-- finalDate: new Date(2012, 0, 22, 12),
                    initialValue: 328,
                    finalValue: 4252,
                    lineColor: "#CC0000"
                }]
            });
	
		</script>
    </body>

</html>