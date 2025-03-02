$(function () {
  'use strict';

  function createDonutChart(selector, series, labels) {
    var options = {
      dataLabels: {
        enabled: false,
      },
      colors: ['#DC3545', '#198754'],
      plotOptions: {
        pie: {
          donut: {
            size: '80%',
            labels: {
              show: false,
              name: {
                show: false
              },
              value: {
                show: false,
              },
            }
          }
        },
        legend: {
          show: false,
          position: 'top',
        },
      },
      tooltip: {
        enabled: false,
      },
      labels: labels,
      series: series,
      chart: {
        type: 'donut',
        height: 350,
        width: 360,
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'top'
          }
        }
      }]
    };

    var chart = new ApexCharts(document.querySelector(selector), options);
    chart.render();
  }

  $.ajax({
    url: "/frontend/ajax-load/dashboard-data",
  }).done(function (data) {
    createDonutChart("#chart-pembayaran", data.pembayaran.datasets[0].series, data.pembayaran.labels);
    createDonutChart("#chart-biaya", data.biaya.datasets[0].series, data.biaya.labels);
    $(".chart-value").removeClass("d-none")

  });
});



$(function () {
  'use strict';
  function createDonutChart(selector, series, labels) {
    var optionsAkuntansi = {
      dataLabels: {
        enabled: false,
      },
      colors: ['#FFC107', '#198754'],
      plotOptions: {
        pie: {
          donut: {
            size: '80%',
            labels: {
              show: false,
              name: {
                show: false
              },
              value: {
                show: false,
              },
            }
          }
        },
        legend: {
          show: false,
          position: 'top',
        },
      },
      tooltip: {
        enabled: false,
      },
      labels: labels,
      series: series,
      chart: {
        type: 'donut',
        height: 350,
        width: 420,
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'top'
          }
        }
      }]
    };

    var chart = new ApexCharts(document.querySelector(selector), optionsAkuntansi);
    chart.render();
  }

  $.ajax({
    url: "/frontend/ajax-load/dashboard-data",
  }).done(function (data) {
    createDonutChart("#chart-kas_masuk", data.kas_masuk.datasets[0].series, data.kas_masuk.labels);
    createDonutChart("#chart-kas_keluar", data.kas_keluar.datasets[0].series, data.kas_keluar.labels);
    createDonutChart("#chart-draft-jurnal-umum", data.draft_jurnal.datasets[0].series, data.draft_jurnal.labels);
    $(".chart-value").removeClass("d-none")
  });
});
