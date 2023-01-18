/***************************************
  Lokasi:
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


/*********************************************
  Total Kehadiran:
  Knob Chart untuk Melihat total kehadiran
  dihitung dari check in & check out per hari
**********************************************/
$(document).ready(function () {
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
})

/***************************************
  Riwayat Jam Datang / Jam Pulang:
  Line Chart untuk Melihat jam masuk dan
  jam pulang tiap hari
****************************************/
var checkingChartCanvas = $('#line-chart').get(0).getContext('2d')

const data = {
      labels: ['2022-01-01','2022-02-02','2022-05-03','2022-07-04','2022-10-05','2022-12-06','2022-01-07','2022-01-08','2022-01-09','2022-01-10','2022-01-11','2022-01-12','2022-01-13','2022-01-14','2022-01-15','2022-01-16','2022-01-17','2022-01-18','2022-01-19','2022-01-20','2022-01-21','2022-01-22','2022-01-23','2022-01-24','2022-01-25','2022-01-26','2022-01-27','2022-01-28','2022-01-29','2022-01-30','2022-01-31','2022-02-05','2022-05-12','2022-10-10','2023-01-12','2023-01-20'],
      datasets: [
        {
          label: 'Check In',
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
          data: ['07.30', '08.00', '07.45', '08.30', '08.40', '09.00']  // Data Jam Masuk
        },
        {
          label: 'Check Out',
          fill: false,
          borderWidth: 2,
          lineTension: 0,
          spanGaps: true,
          backgroundColor: '#FFC107',
          borderColor: '#FFC107',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#FFC107',
          pointBackgroundColor: '#FFC107',
          data: ['16.30', '18.00', '17.45', '17.30', '16.40', '16.00']  //Data Jam pulang
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
        legend: {
          display: false
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
            beginAtZero: true,
            scaleLabel: {
              labelString: 'Waktu',
              display: true
            }
          }
        }
      }
    };
    // render init block
    const checkingChart = new Chart(
      checkingChartCanvas,
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
      checkingChart.options.scales.x.min = startDate;
      checkingChart.options.scales.x.max = endDate;
      checkingChart.update();
    }

    function reset() {
      checkingChart.options.scales.x.min = '2023-01-01';
      checkingChart.options.scales.x.max = '2023-12-31';
      checkingChart.update();
      console.log("Tombol reset berfungsi");
    }