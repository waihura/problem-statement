@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
 <!-- Stats Card -->
 <div class="row">
  <div class="col-lg-4 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h2 class="font-weight-bolder mb-0">{{ $branches }}</h2>
          <p class="card-text">Total Branches</p>
        </div>
        <div class="avatar bg-light-danger p-50 m-0">
          <div class="avatar-content">
            <i data-feather="home" class="font-medium-5"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h2 class="font-weight-bolder mb-0">{{ $leads }}</h2>
          <p class="card-text">Total Leads</p>
        </div>
        <div class="avatar bg-light-success p-50 m-0">
          <div class="avatar-content">
            <i data-feather="activity" class="font-medium-5"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-12">
    <div class="card">
      <div class="card-header">
        <div>
          <h2 class="font-weight-bolder mb-0">{{ $products }}</h2>
          <p class="card-text">Total Products</p>
        </div>
        <div class="avatar bg-light-primary p-50 m-0">
          <div class="avatar-content">
            <i data-feather="shopping-cart" class="font-medium-5"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Stats Card -->

  <!-- Area Chart Starts -->
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"><u>Leads Maturity</u></h4>
    </div>
    <div class="card-body">
      <canvas class="polar-area-chart-ex chartjs" data-height="350"></canvas>
    </div>
  </div>
  <!-- Area Chart Ends -->

@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/chart.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->

  <script>
 window.onload = function()
  {
    var discovered = <?php echo $discovered; ?>;
    var contact = <?php echo $contact; ?>;
    var needs = <?php echo $needs; ?>;
    var negotiation = <?php echo $negotiation; ?>;
    var sale = <?php echo $sale; ?>;

      // Color Variables
  var primaryColorShade = '#836AF9',
    successColorShade = '#28dac6',
    warningColorShade = '#ffe802',
    dangerColorShade = '#ff4961',
    greyColor = '#4F5D70',
    tooltipShadow = 'rgba(0, 0, 0, 0.25)',
    labelColor = '#6e6b7b';

    var chartWrapper = $('.chartjs'),
    polarAreaChartEx = $('.polar-area-chart-ex');

    // Detect Dark Layout
  if ($('html').hasClass('dark-layout')) {
    labelColor = '#b4b7bd';
  }

  // Wrap charts with div of height according to their data-height
  if (chartWrapper.length) {
    chartWrapper.each(function () {
      $(this).wrap($('<div style="height:' + this.getAttribute('data-height') + 'px"></div>'));
    });
  }

    var polarExample = new Chart(polarAreaChartEx, {
      type: 'polarArea',
      options: {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
          position: 'right',
          labels: {
            usePointStyle: true,
            padding: 25,
            boxWidth: 9,
            fontColor: labelColor
          }
        },
        layout: {
          padding: {
            top: -5,
            bottom: -45
          }
        },
        tooltips: {
          shadowOffsetX: 1,
          shadowOffsetY: 1,
          shadowBlur: 8,
          shadowColor: tooltipShadow,
          backgroundColor: window.colors.solid.white,
          titleFontColor: window.colors.solid.black,
          bodyFontColor: window.colors.solid.black
        },
        scale: {
          scaleShowLine: true,
          scaleLineWidth: 1,
          ticks: {
            display: false,
            fontColor: labelColor
          },
          reverse: false,
          gridLines: {
            display: false
          }
        },
        animation: {
          animateRotate: false
        }
      },
      data: {
        labels: ['Lead Discovered', 'Contact Initiated', 'Needs Identified', 'In Negotiation', 'Actual Sale'],
        datasets: [
          {
            label: 'Total Number',
            backgroundColor: [
              window.colors.solid.secondary,
              window.colors.solid.primary,
              window.colors.solid.warning,
              window.colors.solid.danger,
              window.colors.solid.success
            ],
            data: [discovered, contact, needs, negotiation, sale],
            borderWidth: 0
          }
        ]
      }
    });
  }
  </script>
@endsection