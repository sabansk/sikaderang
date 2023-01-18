/**********************************
  Gender & Background Chart:
  Bar Chart Statistik Jenis Kelamin
  dan Background Anak PKL
**********************************/
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
        label: 'Jumlah',
        data: [70, 50],
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
      plugins: {
        legend: {
          display: false
        }
      },
      indexAxis: 'y',
      scales: {
        y: {
          grid: {
            display: true,
            zeroLineColor: ''
          }
        },
        x: {
          display: true,
          grid: {
            display: false
          },
        }
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
          label: 'Jumlah',
          axis: 'y',
          data: [83, 38],
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
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          grid: {
            display: false,
            zeroLineColor: ''
          }
        },
        x: {
          display: true,
          grid: {
            display: false
          },
        }
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


/**********************************
  Attendances Chart:
  Line Chart Kehadiran Anak PKL
**********************************/
var attendancesChartCanvas = $('#attendances-chart').get(0).getContext('2d')

const data = {
      labels: ['2022-01-01','2022-02-02','2022-05-03','2022-07-04','2022-10-05','2022-12-06','2022-01-07','2022-01-08','2022-01-09','2022-01-10','2022-01-11','2022-01-12','2022-01-13','2022-01-14','2022-01-15','2022-01-16','2022-01-17','2022-01-18','2022-01-19','2022-01-20','2022-01-21','2022-01-22','2022-01-23','2022-01-24','2022-01-25','2022-01-26','2022-01-27','2022-01-28','2022-01-29','2022-01-30','2022-01-31','2022-02-05','2022-05-12','2022-10-10','2023-01-12','2023-01-20'],
      datasets: [
        {
          label: 'Jumlah Kehadiran',
          fill: false,
          borderWidth: 2,
          lineTension: 0,
          spanGaps: true,
          backgroundColor: '#28A745',
          borderColor: '#28A745',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#28A745',
          pointBackgroundColor: '#28A745',
          data: [35, 40, 26, 19, 32, 44]  // Data Total Kehadiran
        }
      ]
    };
    // config
    const config = {
      type: 'line',
      data,
      options: {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
          legend: {
            display: true,
            onClick: null
          }
        },
        scales: {
          x: {
            min: '2022-01-01',
            max: '2022-12-31',
            type: 'time',
            time: {
              unit: 'day'
            }
          },
          y: {
            beginAtZero: true
          }
        }
      }
    };
    // render init block
    const attendancesChart = new Chart(
      attendancesChartCanvas,
      config
    );

    function filterChart(date) {
      console.log(date.value);
      const year = date.value.substring(0, 4);
      const month = date.value.substring(5, 7);
      console.log(month);
      const lastDay = (y, m) => {
        return new Date(y, m, 0).getDate()
      };
      lastDay(year, month);
      const startDate = `${date.value}-01`;
      const endDate = `${date.value}-${lastDay(year, month)}`;
      attendancesChart.options.scales.x.min = startDate;
      attendancesChart.options.scales.x.max = endDate;
      attendancesChart.update();
    }

    function reset() {
      attendancesChart.options.scales.x.min = '2022-01-01';
      attendancesChart.options.scales.x.max = '2022-12-31';
      attendancesChart.update();
      console.log("Tombol reset berfungsi");
    }


/***************************************
  Rata-Rata Lokasi:
  View Maps untuk Melihat titik Lokasi
  paling sering dilakukan presensi
****************************************/
var map = L.map('map').setView([-5.200963503628385, 119.453547417958], 18);

L.tileLayer('http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Membuat Pin Lokasi
var marker = L.marker([-5.200963503628385, 119.453547417958]).addTo(map);

// Membuat Jarak Radius
var circle = L.circle([-5.200963503628385, 119.453547417958], {
  color: 'red',
  fillColor: '#f03',
  fillOpacity: 0.5,
  radius: 35
}).addTo(map);

// Popup untuk Marker dan Jarak Radius
marker.bindPopup("<b>Disini</b><br>Titik tengah dari lokasi absensi Anda").openPopup();
circle.bindPopup("Radius Lokasi untuk Kehadiran");

// var popup = L.popup()
//   .setLatLng([-5.200963503628385, 119.453547417958])
//   .setContent("I am a standalone popup.")
//   .openOn(map);

var popup = L.popup();

// Fungsi untuk klik koordinat pada sembarang titik
// function onMapClick(e) {
//     popup
//         .setLatLng(e.latlng)
//         .setContent("You clicked the map at " + e.latlng.toString())
//         .openOn(map);
// }
// map.on('click', onMapClick);

// Menghilangkan fitur drag dan interaktif lain pada map
map.dragging.disable();
map.scrollWheelZoom.disable();
if (map.tap) map.tap.disable();
document.getElementById('map').style.cursor='default';