$(function () {
  'use strict';
  $.ajax({
    url: "/frontend/ajax-load/dashboard-data-proyek",
  }).done
    (function (data) {

      var optionsKomputer = {
        dataLabels: {
          enabled: false,
          },
        colors: ['#C2C2C2', '#0DCAF0', '#A17AF1', '#DC3545', '#FFC107', '#198754'],
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
        labels: data.proyek.labels,
          legend: {
          position: 'right',
            horizontalAlign: 'center',
              offsetY: -10,
        },
        series: data.proyek.datasets[0].series,
          chart: {
          type: 'donut',
            height: 380,
              width: 390,
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

      var chart = new ApexCharts(document.querySelector("#chart-proyek"), optionsKomputer - medan);
      chart.render();

    });
});