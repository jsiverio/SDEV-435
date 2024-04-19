/*---------------------------------------------------------------------------------------------------------------------
File: charts.js
Written by: Jorge Siverio 2024
Description: Chart.js for the dashboard page
---------------------------------------------------------------------------------------------------------------------*/

const mdcc = document.getElementById('mtdDeviceChart');
const mccc = document.getElementById('mtdCasesChart');
const ydcc = document.getElementById('ytdDevicesChart');
const yccc = document.getElementById('ytdCasesChart');
const mtdcacc = document.getElementById('mtdCasesByAgencyChart');
const ytdcacc = document.getElementById('ytdCasesByAgencyChart');

function mdc(arrData){
  new Chart(mdcc, {
  type: 'doughnut',
  data: {
    labels: arrData[0],
    datasets: [{
      label: 'Qty',
      data: arrData[1],
      borderWidth: 1
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false,
        position: 'top'
      }
    }
  }
 
});
}
function mcc(arrData){
  new Chart(mccc, {
    type: 'doughnut',
    data: {
      labels: arrData[0],
      datasets: [{
        label: 'Qty',
        data: arrData[1],
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false,
          position: 'top'
        }
      }
    }
   
  });
}
function ydc(arrData){
    new Chart(ydcc, {
      type: 'doughnut',
      data: {
        labels: arrData[0],
        datasets: [{
          label: 'Qty',
          data: arrData[1],
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false,
            position: 'top'
          }
        }
      }
     
    });
}
function ycc(arrData){
      new Chart(yccc, {
        type: 'doughnut',
        data: {
          labels: arrData[0],
          datasets: [{
            label: 'Qty',
            data: arrData[1],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            legend: {
              display: false,
              position: 'top'
            }
          }
        }
       
      });
}
function mtdcac(arrData){
  new Chart(mtdcacc, {
    type: 'bar',
    data: {
      labels: arrData[0],
      datasets: [{
        label: 'Monthly Cases by Agency',
        data: arrData[1],
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          display: true,
          position: 'top'
        }
      }
    }
   
  });
}
function ytdcac(arrData){
  new Chart(ytdcacc, {
    type: 'bar',
    data: {
      labels: arrData[0],
      datasets: [{
        label: 'Qty',
        data: arrData[1],
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false,
          position: 'top'
        }
      }
    }
   
  });
}