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
      // tooltips: {
      //   mode: mode,
      //   intersect: intersect
      // },
      // hover: {
      //   mode: mode,
      //   intersect: intersect
      // },
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

  var $attendancesChart = $('#attendances-chart')
  // eslint-disable-next-line no-unused-vars
  var attendancesChart = new Chart($attendancesChart, {
    type: 'line',
    data: {
      labels: [
        'Dec 1', 'Dec 2', 'Dec 3', 'Dec 4', 'Dec 5', 'Dec 6', 'Dec 7',
        'Dec 8', 'Dec 9', 'Dec 10', 'Dec 11', 'Dec 12', 'Dec 13', 'Dec 14',
        'Dec 15', 'Dec 16', 'Dec 17', 'Dec 18', 'Dec 19', 'Dec 20', 'Dec 21',
        'Dec 22', 'Dec 23', 'Dec 24', 'Dec 25', 'Dec 26', 'Dec 27', 'Dec 28',
        'Dec 29', 'Dec 30', 'Dec 31'
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
          display: true,
          gridLines: {
            display: true
          },
          ticks: ticksStyle
        }]
      }
    }
  })
})