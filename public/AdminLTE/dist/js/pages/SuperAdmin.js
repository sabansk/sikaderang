const chartCanvasGender = document.getElementById('chart-gender').getContext('2d');
const chartCanvasBackground = document.getElementById('chart-background').getContext('2d');

const canvasGender = document.getElementById('chart-gender');
const canvasBackground = document.getElementById('chart-background');

// let chartGender, chartBackground;

$(document).ready(function() {

  canvasBackground.style.display = "none"

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'

  var intersect = true

  const chartGender = new Chart(chartCanvasGender, {
    type: 'bar',
    data:
    {
      labels: ['LAKI-LAKI', 'PEREMPUAN'],
      datasets: [{
        labels: 'Jumlah berdasarkan jenis kelamin',
        axis: 'y',
        data: [80, 20],
        fill: false,
        backgroundColor: [
          '#F5B041',
          '#A569BD'
        ],
        borderColor: [
          '#F5B041',
          '#A569BD'
        ],
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      indexAxis: 'y',
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            zeroLineColor: ''
          },
          ticks: $.extend({
            beginAtZero: true,
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          // ticks: ticksStyle
        }]
      }
    }
  });

  const chartBackground = new Chart(chartCanvasBackground, {
    type: 'bar',
    data:
    {
      labels: ['SMA/SMK/Se-Derajat', 'Mahasiswa'],
      datasets: [
        {
          labels: 'Jumlah berdasarkan background',
          axis: 'y',
          data: [80, 30],
          fill: false,
          backgroundColor: [
            '#007bff',
            '#ced4da'
          ],
          borderColor: [
            '#007bff',
            '#ced4da'
          ],
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  });

  $('#button-gender').on('click', function(){
    canvasBackground.style.display = "none"
    canvasGender.style.display = "block"
    console.log('button jenis kelamin terklik')
    // initChart.destroy();

  })
  $('#button-background').on('click', function(){
    canvasGender.style.display = "none"
    canvasBackground.style.display = "block"
    console.log('button background terklik')

  })

})

var $attendancesChart = $('#attendances-chart').get(0).getContext('2d')
  // eslint-disable-next-line no-unused-vars
  var attendancesChart = new Chart($attendancesChart, {
    type: 'line',
    data: {
      labels: [
        '2022-01-01', '2022-02-01', '2022-06-01', '2022-10-01', '2022-12-01', '2023-01-01'
      ],
      datasets: [{
        data: [
          100, 120, 170, 167, 180, 177, 160,
          100, 120, 170, 167, 180, 177, 160,
          100, 120, 170, 167, 180, 177, 160,
          100, 120, 170, 167, 180, 177, 160,
          100, 120, 170
        ],
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          min: '2022-01-01',
          max: '2022-12-31',
          type: 'time',
          time: {
            unit: 'day'
          },
          display: true,
          gridLines: {
            display: true
          },
          ticks: ticksStyle
        }]
      }
    }
  })

  // filterChart function
  function filterChart(date){
    console.log(date.value);
    const year = date.value.substring(0, 4);
    const month = date.value.substring(5, 7);
    console.log(month);

    const lastDay = (y, m) => {
      return new Date(y, m, 0).getDate()
    };

    lastDay(year, month);

    const startDate = date.value + "-" + "01";
    const endDate = date.value + "-" + lastDay(year, month);

    $attendancesChart.options.scales.xAxes.min = startDate;
    $attendancesChart.options.scales.xAxes.max = endDate;
    $attendancesChart.update();
  }

  function reset() {
    $attendancesChart.options.scales.xAxes.min = '2022-01-01';
    $attendancesChart.options.scales.xAxes.max = '2022-12-31';
    $attendancesChart.update();
  }