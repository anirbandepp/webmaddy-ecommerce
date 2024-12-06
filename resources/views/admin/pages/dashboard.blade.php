@extends('admin.layouts.back-app')
@section('content')
    		<!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><span class="text-semibold">Dashboard</span></h4>
                    </div>

                    <div class="heading-elements">
                        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel bg-green-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="reload"></a></li>
                                    </ul>
                                </div>
                                <h3 class="no-margin">₹0.00</h3>
                                Today's Sales
                                <div class="text-muted text-size-small">0 Orders</div>
                            </div>
                        </div>

                        <div class="panel bg-success-300">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="reload"></a></li>
                                    </ul>
                                </div>
                                <h3 class="no-margin">₹3500.50</h3>
                                Last 30 Days Sales
                                <div class="text-muted text-size-small">10 Orders</div>
                            </div>
                        </div>

                        <div class="panel bg-teal-300">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="reload"></a></li>
                                    </ul>
                                </div>
                                <h3 class="no-margin">₹3000.50</h3>
                                Average Sales
                                <div class="text-muted text-size-small">10 Orders (Last 30 Days)</div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <!-- Simple panel -->
                        <div class="panel panel-flat">

                            <div class="panel-heading">
                                <h5 class="panel-title">Last 30 Days Sales</h5>

                            </div>

                            <div class="panel-body">

                                <canvas id="salesChart" class="chart"></canvas>

                            </div>



                        </div>
                        <!-- /simple panel -->
                    </div>
                </div>




                <!-- Table -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Basic table</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="close"></a></li>
              </ul>
            </div>
          </div>

              <div class="panel-body">
                  Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.
              </div>


                </div>
                        <!-- /table -->

@endsection
@section('jsContent')

<script>
	var ctx = document.getElementById('salesChart');
	ctx.height = 310;
	ctx.width = '100%';

	var salesChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        '13 July',
        '14 July',
        '15 July',
        '15 July',
        '17 July',
        '13 July',
        '14 July',
        '15 July',
        '13 July',
        '14 July',
        '15 July',
        '15 July',
        '17 July',
        '13 July',
        '14 July',
        '15 July',
        '15 July',
        '17 July',
        '13 July',
        '14 July',
        '15 July',
        '15 July',
        '17 July',
        '13 July',
        '14 July',
        '15 July',
        '15 July',
        '17 July',
        '18 July'
        ],
        datasets: [{
          label: 'Sales (₹)',
          data: [
          	200,
          	300,
          	400,
          	200,
          	500,
          	600,
          	200,
          	300,
          	400,
          	200,
          	500,
          	600,
          	200,
          	300,
          	400,
          	200,
          	500,
          	600,
          	200,
          	300,
          	400,
          	200,
          	500,
          	600,
          	200,
          	300,
          	400,
          	200,
          	500,
          	600
          ],
          backgroundColor: '#81C784',
          barPercentage: 0.7
      }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
