<div class="container-fluid" ng-controller="GrafikController">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
            <div class="card-header d-flex">
                <div class="col-md-9">
                    <h3 class="card-title">Grafik Presentase</h3>
                </div>
                <div class="col-md-3 pull-right">
                    <select class="form-control" ng-options="item as item for item in itemgrafik" ng-model="grafik" ng-change="showData(grafik)"></select>
                </div>
            </div>
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
        </div>
    </div>
</div>

<style>
    .highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

#container {
  height: 400px;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}
</style>
