const baseUrl = "https://backend-express-pcqeerhpva-et.a.run.app";
let no_gardu_detail, nama_gardu, kode_unit, kapasitas, statusGardu, statusPembebanan, alamat, faktor_kali, latitude, longitude, keterangan, no_meter, no_modem, no_simcard, persen_r, persen_s, persen_t, persen_beban, persen_imbalance, tanggalGardu, waktuGardu, tidakSeimbang, urlPengukuran, urlPengukuranDua, tipeGardu, idpel, createdAt, editedAt, merek_meter, merek_modem, merek_simcard, tipe_modem, tipe_meter, infoMeter, infoModem, infoSimcard, hari1, hari2, bulan1, bulan2, tahun1, tahun2, rowsSetup;

// insertTable variabel
let tgl, waktu, i_avg, i_r, i_s, i_t, vr, vs, vt, delta_is, delta_it, imbalance_percent, pf_total, i_netral, arusRSTChart, noData, noPage, maxValue, minValue;

let noRow = '';

let labelChart = [];
let data_arus_r = [];
let data_arus_s = [];
let data_arus_t = [];

let chartDatas = {
  labelChart,
  data_arus_r,
  data_arus_s, 
  data_arus_t
}

let tokenData = JSON.parse(sessionStorage.getItem('TOKEN_DATA'))
let token = tokenData.token;
let refreshToken = tokenData.refreshToken;

// var for nomor pengukuran
let g_page_size, g_current_page;

let page_size = 10;
let current_page = 1;
let total_pages, total_rows, pageInfo;
console.log("UNSTOPPABLE di line 15 init variable");
console.log(`page size: ${page_size}, total rows: ${total_rows}, total pages: ${total_pages}, current page: ${current_page}`)

let data = "";
let next, end, row;
// window.addEventListener('load', (event) =>{

//   console.log('Page Loaded');
//   let h1 = "tunggu loading"

//   $('#message').html(h1)

// });

const props = sessionStorage.getItem('nomor_gardu');
console.log("PROPS : ", props);

const parent_page = sessionStorage.getItem('parent_page');
console.log("PARENT  PAGE: ", parent_page);

var settings = {
  "url": baseUrl +"/gardu/"+ props,
  "method": "GET",
  "timeout": 0,
  "headers" : {
    "contentType": "application/json",
    "Authorization": "bearer " + token
  },
};

var settingsPengukuran = {
  "url": baseUrl + "/pengukuran/" + props + "?page_size=" + page_size + "&current_page=" + current_page,
  "method": "GET",
  "timeout": 0,
  "headers" : {
    "contentType": "application/json",
    "Authorization": "bearer " + token
  },
}

let loaderContent = document.getElementById('loaderContent');
let content = document.getElementById('content-detail');

window.addEventListener("load", function(){
  loaderContent.style.display = "none"
  content.style.display = "block"
})

let activePageForDetail = window.sessionStorage.getItem('parent_page');
console.log(activePageForDetail)
window.sessionStorage.setItem('active_page', activePageForDetail);

$(document).ready(function () {

  let bannerStatus = `<div id="detail_status" class="status color-status">-</div>`
  let bannerBeban =  `<div id="detail_pembebanan" class="status color-pembebanan">-</div>`

  $('#status').html(bannerStatus)
  $('#beban').html(bannerBeban)

  if(parent_page === "maps"){
    $("#kembali").attr("href", "maps.html");
    $("#peta-link").attr("class", "active");

  } else if (parent_page==="list-gardu") {
    $("#kembali").attr("href", "list-gardu.html");
    $("#list-link").attr("class", "active");
  } else if (parent_page==="detail-gardu") {
    $("#kembali").attr("href", "list-gardu.html");
    $("#list-link").attr("class", "active");
  }


  $.ajax(settings)
    .done(function (response) {
      let responseData = response.data;
      let dataGardu = responseData.gardu;
      console.log(dataGardu); 
      console.log(responseData)
      
      no_gardu_detail = dataGardu.nomor_gardu;
      nama_gardu = dataGardu.nama_gardu;
      kode_unit = dataGardu.kode_unit;
      kapasitas = dataGardu.kapasitas ? `${dataGardu.kapasitas}  kVA` : "-" ;
      statusGardu = dataGardu.status ? dataGardu.status : "not set";
      statusPembebanan = dataGardu.status_imbalance ? dataGardu.status_imbalance : "not set";
      alamat = dataGardu.alamat ;
      faktor_kali = dataGardu.faktor_kali ? `${dataGardu.faktor_kali}` : "-" ;
      tipeGardu = dataGardu.tipe_gardu ? `${dataGardu.tipe_gardu}` : "-" ;
      idpel = dataGardu.idpel ? `${dataGardu.idpel}` : "-" ;
      latitude = dataGardu.latitude;
      longitude = dataGardu.longitude;
      keterangan = dataGardu.keterangan ? `${dataGardu.keterangan}` : "-";
      merek_meter = dataGardu.merek_meter; 
      merek_modem = dataGardu.merek_modem;
      merek_simcard = dataGardu.merek_simcard;
      tipe_meter = dataGardu.tipe_meter;
      tipe_modem = dataGardu.tipe_modem;
      // merek_meter = dataGardu.merek_meter ? `${dataGardu.merek_meter} ` : "not set";
      // merek_modem = dataGardu.merek_modem ? `${dataGardu.merek_modem}` : "not set";
      // merek_simcard = dataGardu.merek_simcard ? `${dataGardu.merek_simcard}` : "not set";
      // tipe_meter = dataGardu.tipe_meter ? `${dataGardu.tipe_meter}` : "not set";
      // tipe_modem = dataGardu.tipe_modem ? `${dataGardu.tipe_modem}` : "not set";

      if(merek_meter && tipe_meter){
        infoMeter = `<span class="merek"><small>(${merek_meter} - ${tipe_meter})</small></span>`
      }
      if(merek_modem && tipe_modem){
        infoModem = `<span class="merek"><small>(${merek_modem} - ${tipe_modem})</small></span>`;
      } 
      if(merek_simcard){
        infoSimcard =`<span class="merek"><small>(${merek_simcard})</small></span>`;
      }
      infoMeter = infoMeter ? infoMeter : '';
      infoModem = infoModem ? infoModem :'';
      infoSimcard = infoSimcard ? infoSimcard : '';
      no_meter =  dataGardu.nomor_meter ? `${dataGardu.nomor_meter}  ${infoMeter}` : "-";
      no_modem = dataGardu.nomor_modem ? `${dataGardu.nomor_modem}  ${infoModem}` : "-";
      no_simcard = dataGardu.nomor_simcard ? `${dataGardu.nomor_simcard}  ${infoSimcard}` : "-";
      persen_r = dataGardu.persen_r ? `${dataGardu.persen_r.toFixed(2)}  %` : "-" ;
      persen_s = dataGardu.persen_s ? `${dataGardu.persen_s.toFixed(2)}  %` : "-";
      persen_t = dataGardu.persen_t ? `${dataGardu.persen_t.toFixed(2)}  %` : "-";
      persen_beban = dataGardu.persen_beban ? `${dataGardu.persen_beban.toFixed(2)}  %` : "-";
      persen_imbalance = dataGardu.persen_imbalance ? `${dataGardu.persen_imbalance.toFixed(2)}  %` : "-";
      waktuGardu = dataGardu.waktu ? `${dataGardu.waktu}` : "--:--:--";
      tanggalGardu = dataGardu.tgl ? `${dataGardu.tgl.slice(0, 10)}` : "-/-/-";
      createdAt = dataGardu.created_at ? `${dataGardu.created_at.slice(0, 10)}` : "-";
      editedAt = dataGardu.edited_at ? `${dataGardu.edited_at.slice(0, 10)}` : "-";

      bannerStatus = `<span id="detail_status" class="${statusGardu}">${statusGardu.charAt(0).toUpperCase() + statusGardu.slice(1)}</span>`
      bannerBeban= `<span id="detail_statusPembebanan" class="${statusPembebanan}">${statusPembebanan.charAt(0).toUpperCase() + statusPembebanan.slice(1)}</span>`

      console.log(no_meter)
      console.log(persen_r)

      $('#date').html(tanggalGardu);
      $('#hour').html(waktuGardu);

      $('#no_gardu_detail').html(no_gardu_detail)
      $('#detail_nama').html(nama_gardu);
      $('#detail_kodeUnit').html(kode_unit);
      $('#detail_idpel').html(idpel);
      $('#detail_tipeGardu').html(tipeGardu);
      $('#detail_kapasitas').html(kapasitas);
      $('#status').html(bannerStatus);
      $('#detail_no_meter').html(no_meter);
      $('#detail_no_modem').html(no_modem);
      $('#detail_no_simcard').html(no_simcard);
      $('#detail_r').html(persen_r);
      $('#detail_s').html(persen_s);
      $('#detail_t').html(persen_t);
      $('#detail_beban').html(persen_beban);
      $('#beban').html(bannerBeban);
      $('#detail_alamat').html(alamat);
      $('#detail_faktorKali').html(faktor_kali);
      $('#detail_ketidakseimbangan').html(persen_imbalance);
      $('#detail_latitude').html(latitude);
      $('#detail_longitude').html(longitude);
      $('#detail_keterangan').html(keterangan);
      $('#createdAt').html(createdAt);
      $('#editedAt').html(editedAt);
      
      loader(false)

    })
    .fail(function(response){
      if (response.responseJSON.message === "jwt expired"){
        // alert(1)
        console.log('token need updatee, token lama =>', token)
        console.log('ini refresh token lama =>', refreshToken )
        updateToken(refreshToken)
        console.log('token udah updatee, token baru =>', token)
      }
    })

  console.log(settingsPengukuran)
  $.ajax(settingsPengukuran)
    .done(function (response) {
      let responseData = response.data;
      pageInfo = response.page;
      g_current_page = pageInfo.current_page;
      g_page_size = pageInfo.page_size
      total_pages = pageInfo.total_pages;
      
      if(responseData.pengukuran.length == 0){
        console.log(responseData.pengukuran.length)
        current_page = 0
        let message = `
        <tr>
          <td colspan="16">
            Data pengukuran tidak ada.
          </td>
        </tr>
        `;
        $('#table_pengukuran').html(message);
        
        $('#btnPrev' ).addClass( "disable").prop('disabled', true);
        $('#btnStart' ).addClass( "disable" ).prop('disabled', true);
        $('#btnEnd').addClass( "disable" ).prop('disabled', true);
        $('#btnNext').addClass( "disable" ).prop('disabled', true);
      } else {
        console.log(responseData)
        search_data()
        pagination(pageInfo)
        insertTable(responseData, g_current_page, g_page_size)

      }

    })
    .fail(function(response){
      if (response.responseJSON.message === "jwt expired"){
        // alert(1)
        console.log('token need updatee, token lama =>', token)
        console.log('ini refresh token lama =>', refreshToken )
        updateToken(refreshToken)
        console.log('token udah updatee, token baru =>', token)
      }
    })



  $('#rowsCustom').on('change', function(e){
    e.preventDefault();
    page_size = $('#rowsCustom').val()
    current_page = 1

    console.log(page_size)
    // console.log(urlSearch)
    // console.log(urlFilter)

    if(arusRSTChart !== 0){
      console.log("mychar")
      arusRSTChart.destroy()
    }

    if (page_size == 0){
      rowsSetup = {
        "url": baseUrl + "/pengukuran/" + props,
        "method": "GET",
        "timeout": 0,
        "headers" : {
          "contentType": "application/json",
          "Authorization": "bearer " + token
        },
      };



      console.log(rowsSetup)
      search_data();

      $.ajax(rowsSetup)
        .done(function (response) {
          data = response.data;
          insertTable(data)
        })
        .fail(function(response){
          if (response.responseJSON.message === "jwt expired"){
            // alert(1)
            console.log('token need updatee, token lama =>', token)
            console.log('ini refresh token lama =>', refreshToken )
            updateToken(refreshToken)
            console.log('token udah updatee, token baru =>', token)
          }
        })

    } else{

      rowsSetup = {
        "url": baseUrl + "/pengukuran/" + props + "?page_size=" + page_size + "&current_page=" + current_page,
        "method": "GET",
        "timeout": 0,
        "headers" : {
          "contentType": "application/json",
          "Authorization": "bearer " + token
        },
      };

      console.log(rowsSetup)
      search_data();

      $.ajax(rowsSetup)
        .done(function (response) {
          console.log("AJAX pgnext=============")
          data = response.data;
          pageInfo = response.page;
          g_current_page = pageInfo.current_page;
          g_page_size = pageInfo.page_size
          total_pages = pageInfo.total_pages;
    
          insertTable(data, g_current_page, g_page_size)
          pagination(pageInfo)
    
        })
        .fail(function(response){
          if (response.responseJSON.message === "jwt expired"){
            // alert(1)
            console.log('token need updatee, token lama =>', token)
            console.log('ini refresh token lama =>', refreshToken )
            updateToken(refreshToken)
            console.log('token udah updatee, token baru =>', token)
          }
        })
    }

  })


  $('#btnNext').on('click', function(e) {
    console.log("BUTTON NEXT CLICKED")
    e.preventDefault()
    current_page = parseInt(current_page) + 1;
    // console.log(urlSearch)
    // console.log(urlFilter)

    // $('#btnPrev' ).removeClass( "disable").prop('disabled', false);
    // $('#btnStart' ).removeClass( "disable" ).prop('disabled', false);

    let pgnext = {
      "url": baseUrl + "/pengukuran/" + props + "?page_size=" + page_size + "&current_page=" + current_page,
      "method": "GET",
      "timeout": 0,
      "headers" : {
        "contentType": "application/json",
        "Authorization": "bearer " + token
      },
    };
    
    if(arusRSTChart !== 0){
      console.log("mychar")
      arusRSTChart.destroy()
    }

    console.log(pgnext)
    search_data();

    $.ajax(pgnext)
      .done(function (response) {
        console.log("AJAX pgnext=============")
        data = response.data;
        pageInfo = response.page;
        g_current_page = pageInfo.current_page;
        g_page_size = pageInfo.page_size
        

        insertTable(data, g_current_page, g_page_size)
        pagination(pageInfo)

      })
      .fail(function(response){
        if (response.responseJSON.message === "jwt expired"){
          // alert(1)
          console.log('token need updatee, token lama =>', token)
          console.log('ini refresh token lama =>', refreshToken )
          updateToken(refreshToken)
          console.log('token udah updatee, token baru =>', token)
        }
      })

  })

  $('#btnPrev').on('click', function(e) {
    console.log("BUTTON PREVIOUS CLICKED")
    e.preventDefault()
    current_page = parseInt(current_page) - 1;
    // console.log(urlSearch)
    // console.log(urlFilter)

    // $('#btnEnd' ).removeClass( "disable").prop('disabled', false);
    // $('#btnNext' ).removeClass( "disable" ).prop('disabled', false);

    let pgprev = {
      "url": baseUrl + "/pengukuran/" + props + "?page_size=" + page_size + "&current_page=" + current_page,
      "method": "GET",
      "timeout": 0,
      "headers" : {
        "contentType": "application/json",
        "Authorization": "bearer " + token
      },
    };
    
    search_data();

    if(arusRSTChart !== 0){
      console.log("mychar")
      arusRSTChart.destroy()
    }


    $.ajax(pgprev)
      .done(function (response) {
        console.log("AJAX pgnext")
        data = response.data;
        pageInfo = response.page;
        g_current_page = pageInfo.current_page;
        g_page_size = pageInfo.page_size;
        

        insertTable(data, g_current_page, g_page_size)
        pagination(pageInfo)

      })
      .fail(function(response){
        if (response.responseJSON.message === "jwt expired"){
          // alert(1)
          console.log('token need updatee, token lama =>', token)
          console.log('ini refresh token lama =>', refreshToken )
          updateToken(refreshToken)
          console.log('token udah updatee, token baru =>', token)
        }
      })

  })

  $('#btnStart').on('click', function(e) {
    console.log("BUTTON START CLICKED")
    e.preventDefault()
    
    current_page = 1;
    // console.log(urlSearch)
    // console.log(urlFilter)

    let pgstart = {
      "url": baseUrl + "/pengukuran/" + props + "?page_size=" + page_size + "&current_page=" + current_page,
      "method": "GET",
      "timeout": 0,
      "headers" : {
        "contentType": "application/json",
        "Authorization": "bearer " + token
      },
    };

    if(arusRSTChart !== 0){
      console.log("mychar")
      arusRSTChart.destroy()
    }
    
    console.log(pgstart)
    search_data();

    $.ajax(pgstart)
      .done(function (response) {
        console.log("AJAX pgnext=============")
        data = response.data;
        pageInfo = response.page;
        g_current_page = pageInfo.current_page;
        g_page_size = pageInfo.page_size
        

        insertTable(data, g_current_page, g_page_size)
        pagination(pageInfo)

      })
      .fail(function(response){
        if (response.responseJSON.message === "jwt expired"){
          // alert(1)
          console.log('token need updatee, token lama =>', token)
          console.log('ini refresh token lama =>', refreshToken )
          updateToken(refreshToken)
          console.log('token udah updatee, token baru =>', token)
        }
      })

  })
  console.log('totwl page=>>>>', total_pages)

  $('#btnEnd').on('click', function(e) {
    console.log("BUTTON END CLICKED")
    e.preventDefault()

    current_page = total_pages;
    console.log('totwl page=>>>>', total_pages)
    // console.log(urlFilter)

    let pgend = {
      "url": baseUrl + "/pengukuran/" + props + "?page_size=" + page_size + "&current_page=" + current_page,
      "method": "GET",
      "timeout": 0,
      "headers" : {
        "contentType": "application/json",
        "Authorization": "bearer " + token
      },
    };

    if(arusRSTChart !== 0){
      console.log("mychar")
      arusRSTChart.destroy()
    }
    
    console.log(pgend)
    search_data();

    $.ajax(pgend)
      .done(function (response) {
        console.log("AJAX pgnext=============")
        data = response.data;
        pageInfo = response.page;
        g_current_page = pageInfo.current_page;
        g_page_size = pageInfo.page_size
        

        insertTable(data, g_current_page, g_page_size)
        pagination(pageInfo)

      })
      .fail(function(response){
        if (response.responseJSON.message === "jwt expired"){
          // alert(1)
          console.log('token need updatee, token lama =>', token)
          console.log('ini refresh token lama =>', refreshToken )
          updateToken(refreshToken)
          console.log('token udah updatee, token baru =>', token)
        }
      })

  })
  // pgbutton end 2 -------------------

  $('#firstDate').on('change', function(){
    console.log($('#firstDate').val())
  })
  $('#secondDate').on('change', function(){
    console.log($('#secondDate').val())
  })

  $('#searchDate').on('click', function (e) {
    e.preventDefault();

    let firstDate = $('#firstDate').val()
    let secondDate = $('#secondDate').val()

    if(!secondDate) {
      secondDate = firstDate;
      $('#secondDate').val(secondDate)
    }

    console.log("fisr", firstDate)
    console.log("second", secondDate)

    hari1 = firstDate.slice(8, 19)
    hari2 = secondDate.slice(8, 19)
    bulan1 = firstDate.slice(5, 7)
    bulan2 = secondDate.slice(5,7)
    tahun1 = firstDate.slice(0,4)
    tahun2 = secondDate.slice(0, 4)

    // /GD321211199?fromdt=02-11-2022&todt=12-11-2022

    // urlPengukuranSatu = baseUrl +"/gardu/"+ props + "?fromdt=" + ;
    // "?page_size=" + page_size + "&current_page=" + current_page
    urlPengukuran = `${baseUrl}/pengukuran/${props}?page_size=${page_size}&current_page=${current_page}&fromdt=${tahun1}-${bulan1}-${hari1}&todt=${tahun2}-${bulan2}-${hari2}`

    console.log('url pengukuran1 ==>', urlPengukuran)
    var pengukuranByDateSetup = {
      "url": urlPengukuran,
      "method": "GET",
      "timeout": 0,
      "headers" : {
        "contentType": "application/json",
        "Authorization": "bearer " + token
      },
    };

    if(arusRSTChart !== 0){
      console.log("mychar")
    }
    arusRSTChart.destroy()

    $.ajax(pengukuranByDateSetup)
      .done(function (response) {
        let responseData = response.data;
        pageInfo = response.page;
        g_current_page = pageInfo.current_page;
        g_page_size = pageInfo.page_size
        
    
        if(!responseData.pengukuran){
          let message;
          if(secondDate== firstDate){
            message = `
            <tr>
            <td colspan="16">
              Tidak ada data pengukuran pada tanggal ${bulan1}-${hari1}-${tahun1} sampai ${bulan2}-${hari2}-${tahun2}.
            </td>
            </tr>
            `;
          } else{
            message = `
            <tr>
            <td colspan="16">
              Tidak ada data pengukuran pada tanggal ${bulan1}-${hari1}-${tahun1}.
            </td>
            </tr>
            `;
          }
          $('#tabel_pengukuran').html(message);
        } else {
          console.log(responseData)
          search_data()
          pagination(pageInfo)
          insertTable(responseData, g_current_page, g_page_size)
    
        }
    

    
      })
      .fail(function(response){
        if (response.responseJSON.message === "jwt expired"){
          // alert(1)
          console.log('token need updatee, token lama =>', token)
          console.log('ini refresh token lama =>', refreshToken )
          updateToken(refreshToken)
          console.log('token udah updatee, token baru =>', token)
        }
      })

    // console.log(bulan)
  })
});

function insertTable(dataTabel, current_page, page_size){
  let tablePengukuranData =0
  let dataPengukuran = dataTabel.pengukuran;
  maxValue = dataTabel.chart.maxVal
  minValue = dataTabel.chart.minVal
  if(!current_page && !page_size){
    noData = 0;
    noPage = 0;
  } else{
    noData = parseInt(current_page)
    noPage = parseInt(page_size)
  }

  if(labelChart.length !== 0){
    labelChart.length = 0
  }
  if(data_arus_r.length !== 0){
    data_arus_r.length = 0
  }
  if(data_arus_s.length !== 0){
    data_arus_s.length = 0
  }
  if(data_arus_t.length !== 0){
    data_arus_t.length = 0
  }
  // labelChart.push(tanggalGardu + "\n" + waktu)

  console.log('ini dat pengukurann',dataPengukuran)
  if (dataTabel.nomor_gardu == props){
    if (dataPengukuran.length == 0) {

      if(secondDate== firstDate){
        current_page = 0
        tablePengukuranData = `
        <tr>
        <td colspan="16">
          Tidak ada data pengukuran pada tanggal ${bulan1}-${hari1}-${tahun1} sampai ${bulan2}-${hari2}-${tahun2}.
        </td>
        </tr>
        `;
      } else{
        current_page = 0
        tablePengukuranData = `
        <tr>
        <td colspan="16">
          Tidak ada data pengukuran pada tanggal ${bulan1}-${hari1}-${tahun1}.
        </td>
        </tr>
        `;
      }
    } else {

      dataPengukuran.map((item, index) =>{

        tgl = item.tanggal ? `${item.tanggal.slice(0, 10)}` : "-";
        waktu = item.tanggal ? `${item.tanggal.slice(11, 19)}` : "-";
        i_avg = item.i_avg ? `${item.i_avg.toFixed(2)}` : "-";
        i_r = item.i_r ? `${item.i_r.toFixed(2)}` : "-";
        i_s = item.i_s ? `${item.i_s.toFixed(2)}` : "-";
        i_t = item.i_t ? `${item.i_t.toFixed(2)}` : "-";
        vr = item.vr ? `${item.vr.toFixed(2)}` : "-";
        vs = item.vs ? `${item.vs.toFixed(2)}` : "-";
        vt = item.vt ? `${item.vt.toFixed(2)}` : "-";
        delta_ir = item.delta_ir ? `${item.delta_ir.toFixed(2)}` : "-";
        delta_is = item.delta_is ? `${item.delta_is.toFixed(2)}` : "-";
        delta_it = item.delta_it ? `${item.delta_it.toFixed(2)}` : "-";
        imbalance_percent = item.imbalance_percent ? `${item.imbalance_percent.toFixed(2)}` : "-";
        pf_total = item.pf_total ? `${item.pf_total.toFixed(2)}` : "-";
        i_netral = item.i_netral ? `${item.i_netral}` : "-";
        noRow = (noData*noPage)+index-(noPage-1)
        
        labelChart.push(` ${tgl}    ${waktu}`)
        // labelChart.push(tanggalGardu + "\n" + waktu)
        data_arus_r.push(i_r)
        data_arus_s.push(i_s)
        data_arus_t.push(i_t)
        
        tablePengukuranData +=
          `<tr> 
            <td>${noRow}</td>
            <td>${tgl}</button></td>
            <td>${waktu}</td>
            <td>${i_r}</td>
            <td>${i_s}</td>
            <td>${i_t}</td>
            <td>${i_avg}</td>
            <td>${vr}</td>
            <td>${vs}</td>
            <td>${vt}</td>
            <td>${delta_ir}</td>
            <td>${delta_is}</td>
            <td>${delta_it}</td>
            <td>${imbalance_percent}</td>
            <td>${pf_total}</td>
            <td>${i_netral}</td>
          </tr>`;


      });
      
        console.log(tablePengukuranData.length)
      
      }
      $("#table_pengukuran").html(tablePengukuranData);
    
  }

  console.log(labelChart)
  
  const arusRSTGrafik = document.getElementById('tren-arus-rst').getContext('2d');
  
  console.log(maxValue)
  console.log(minValue)

  arusRSTChart = new Chart(arusRSTGrafik, {
    type: 'line',
    data: {
        labels: labelChart,
        datasets: [
          {
            label: 'Arus r ',
            data: data_arus_r,
            backgroundColor: 'transparent',
            borderColor: '#043340',
            borderWidth: 2,
            fill: false,
            // pointRadius : 5
          }, 
          {
            label: 'Arus s ',
            data: data_arus_s,
            backgroundColor: 'transparent',
            borderColor: '#FA9926',
            borderWidth: 2,
            fill: false,
            // borderCapStyle: 'butt'
          }, 
          {
            label: 'Arus t ',
            data: data_arus_t,
            backgroundColor: 'transparent',
            borderColor: '#2f6c4f',
            borderWidth: 2,
            fill: false,
            // borderCapStyle: 'butt'
          }, 
        ],
    },
    options: {
        responsive : true,
        pointBackgroundColor: '#fff',
        radius: 3,
        plugins: {
          legend: {
            position: 'left'
          }
        },
        maintainAspectRatio : true,
        scales: {
          y: {
            // beginAtZero: true,
            min : 0,
            max : maxValue + 10,
            ticks: {
              autoSkip : true,
              stepSize : 5,
            },
          },
          x: {
              ticks: {
                  autoSkip: false,
                  maxRotation: 90,
                  minRotation: 90
              }
          }
        }
    }
    
  });

  console.log("arusRSTChart", arusRSTChart.config._config.data)
}

// pgfunc
function pagination(pageInfo_param) {
  let {page_size, total_rows, total_pages, current_page } = pageInfo_param;
  console.log('ini norownn', noRow)
  if(noRow){
   let rowsData = noRow;

    console.log('ini rowsdataa', rowsData)
    console.log('page size di pagination', page_size)
    console.log(total_rows)
    
    if(page_size > rowsData){
      $('#btnPrev' ).addClass( "disable").prop('disabled', true);
      $('#btnStart' ).addClass( "disable" ).prop('disabled', true);
      $('#btnEnd').addClass( "disable" ).prop('disabled', true);
      $('#btnNext').addClass( "disable" ).prop('disabled', true);
    } 
    else if(page_size <= rowsData){
      $('#btnPrev' ).removeClass( "disable").prop('disabled', false);
      $('#btnStart' ).removeClass( "disable" ).prop('disabled', false);
      $('#btnEnd').removeClass( "disable" ).prop('disabled', false);
      $('#btnNext').removeClass( "disable" ).prop('disabled', false);
  
    }
  }
  console.log("PAGE INFO INSIDE PAGINATION FUNC : ", pageInfo_param);


  console.log("Page Size (P): ", page_size);
  console.log("Total Data (P): ", total_rows);
  console.log("Total Pages (P): ", total_pages);
  console.log("Current Page (P): ", current_page);


  console.log("DOOO KYUNGSOOO!!!!");

  $('#curentPage').html(current_page);
  $('#lastPage').html(total_pages);
  $('#totalData').html(total_rows);

  if(current_page == 1){
    $('#btnPrev' ).addClass( "disable").prop('disabled', true) 
    $('#btnStart' ).addClass( "disable" ).prop('disabled', true);
  } else if(current_page == total_pages){
    $('#btnPrev' ).removeClass( "disable").prop('disabled', false)
    $('#btnStart' ).removeClass( "disable" ).prop('disabled', false);
    $('#btnEnd').addClass( "disable" ).prop('disabled', true);
    $('#btnNext').addClass( "disable" ).prop('disabled', true);
  } else if(current_page < total_pages){
    $('#btnPrev' ).removeClass( "disable").prop('disabled', false);
    $('#btnStart' ).removeClass( "disable" ).prop('disabled', false);

  }

}

function search_data() {
  let loader = `
  <tr>
    <td colspan="16">
      <div class="loader lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </td>
  </tr>
  `;
  $('#tabel_pengukuran').html(loader);
}

function updateToken(props){
  // alert('token kamu dah basi')
  let refreshTokenLama = props;

  var settingsUpdateToken = {
    "url": baseUrl + "/refreshToken",
    "method": "PUT",
    "timeout": 0,
    "headers": {
      "Content-Type": "application/json"
    },
    "data": JSON.stringify({
      "refreshToken": refreshTokenLama,
    }),
  };

  console.log(settingsUpdateToken)
  $.ajax(settingsUpdateToken)
    .done(function (response) {
      let responseToken = response.token;
      let responseRefreshToken = response.refreshToken;

      const dataToken = JSON.stringify({
        token: responseToken,
        refreshToken: responseRefreshToken,
      });
      sessionStorage.setItem("TOKEN_DATA", dataToken);
      console.log('token data baru',sessionStorage.getItem("TOKEN_DATA"))
      location.reload()

    })
    .fail(function(response){
      console.log(response.responseJSON)
    })
}

async function loader(value){
  if(value){
    loaderContent.style.display = "block"
  } else {
    loaderContent.style.display = "none"
    content.style.display = "block";
  }
}