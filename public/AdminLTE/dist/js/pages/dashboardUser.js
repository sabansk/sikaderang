// Script for Map in Dashboard
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

$(function () {
  'use strict'
  /* Menampilkan Chart */
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
        /*change : function (value) {
          //console.log("change : " + value);
          },
          release : function (value) {
          console.log("release : " + value);
          },
          cancel : function () {
          console.log("cancel : " + this.value);
          },*/
        draw: function () {

          // "tron" case
          if (this.$.data('skin') == 'tron') {

            var a   = this.angle(this.cv)  // Angle
              ,
                sa  = this.startAngle          // Previous start angle
              ,
                sat = this.startAngle         // Start angle
              ,
                ea                            // Previous end angle
              ,
                eat = sat + a                 // End angle
              ,
                r   = true

            this.g.lineWidth = this.lineWidth

            this.o.cursor
            && (sat = eat - 0.3)
            && (eat = eat + 0.3)

            if (this.o.displayPrevious) {
              ea = this.startAngle + this.angle(this.value)
              this.o.cursor
              && (sa = ea - 0.3)
              && (ea = ea + 0.3)
              this.g.beginPath()
              this.g.strokeStyle = this.previousColor
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
              this.g.stroke()
            }

            this.g.beginPath()
            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
            this.g.stroke()

            this.g.lineWidth = 2
            this.g.beginPath()
            this.g.strokeStyle = this.o.fgColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
            this.g.stroke()

            return false
          }
        }
      })
    })

  // Sales graph chart
  var checkingChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var checkingChartData = {
  // Edit masukkan tanggal di labels
  labels: ['2022-01-01', '2022-02-01', '2022-06-01', '2022-10-01', '2022-12-01', '2023-01-01'],
  datasets: [
    // Check In
    {
      label: 'Check In',
      fill: false,
      borderWidth: 2,
      lineTension: 0,
      spanGaps: true,
      borderColor: '#efefef',
      pointRadius: 3,
      pointHoverRadius: 7,
      pointColor: '#28a745',
      pointBackgroundColor: '#28a745',
      data: [
        2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432,
        2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432,
        2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432,
        2666
    ]
    },
    // Check Out
    {
      label: 'Check Out',
      fill: false,
      borderWidth: 2,
      lineTension: 0,
      spanGaps: true,
      borderColor: '#efefef',
      pointRadius: 3,
      pointHoverRadius: 7,
      pointColor: '#ffc107',
      pointBackgroundColor: '#ffc107',
      data: [
        3066, 3178, 5312, 4167, 7210, 6070, 5220, 19073, 14687, 12432,
        3066, 3178, 5312, 4167, 7210, 6070, 5220, 19073, 14687, 12432,
        3066, 3178, 5312, 4167, 7210, 6070, 5220, 19073, 14687, 12432,
        3066      ]
    }
  ]
  }

  var checkingChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        min: '2022-01-01',
        max: '2022-12-31',
        type: 'time',
        time: {
          unit: 'day'
        },
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 5000,       // edit masukkan skala tipe waktu
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var checkingChart = new Chart(checkingChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: checkingChartData,
    options: checkingChartOptions
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

    checkingChart.options.scales.xAxes.min = startDate;
    checkingChart.options.scales.xAxes.max = endDate;
    checkingChart.update();
  }

  function reset() {
    checkingChart.options.scales.xAxes.min = '2022-01-01';
    checkingChart.options.scales.xAxes.max = '2022-12-31';
    checkingChart.update();
  }
})