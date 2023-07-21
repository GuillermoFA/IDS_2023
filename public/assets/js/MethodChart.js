
let CashPercentage = document.getElementById('CashPercentage');
let TransferPercentage = document.getElementById('TransferPercentage');
let DebitPercentage = document.getElementById('DebitPercentage');
let CreditPercentage = document.getElementById('CreditPercentage');


let ctxPaymentError = document.getElementById('PaymentChartError');
let ctxPieError = document.getElementById('PieChartError');



const ctxMethod = document.getElementById('MethodChart');
const ctxPercentage= document.getElementById('PercentageChart').getContext('2d');

function generateChart()
{
    fetch('/SalesData')
    .then(response => response.json())
    .then(salesData =>{
        
        const sales = salesData;

        var salesByMethod = [0, 0, 0, 0];

        sales.forEach(sale => {
            //console.log(sale.total + salesByMethod[sale.paymentMethod - 1]);
            salesByMethod[sale.paymentMethod - 1] = sale.total + salesByMethod[sale.paymentMethod - 1];
        });

        //console.log(salesByMethod);
        if(sales.length == 0)
        {
          ctxPaymentError.innerHTML = "No hay ventas Realizadas";
          ctxPieError.innerHTML = "No hay ventas Realizadas";
          return;
        }

        var percentages = [];
        var total = salesByMethod[0] + salesByMethod[1] + salesByMethod[2] + salesByMethod[3]; 

        for (let c = 0; c < 4; c++) {
          percentages[c] = Math.round((salesByMethod[c]/total)*100) + '%';
        }

        let colorHex = ['#FA4F17', '#00d4a1', '#fde801', '#e3e3e3'];
        let labels = ['Efectivo ' + percentages[0], 'Transferencia ' + percentages[1], 'Tarjeta de Débito ' + percentages[2], 'Tarjeta de Crédito ' + percentages[3]];

        new Chart(ctxMethod, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                label: [],
                data: salesByMethod,
                borderWidth: 1,
                backgroundColor: colorHex
                }]
            },
            options: {
                scales: {
                  y: {
                      beginAtZero: true
                  }
                },
            }
        });

    let myChart = new Chart(ctxPercentage, {
        type: 'pie',
        data: {
          datasets: [{
            data: salesByMethod,
            backgroundColor: colorHex
          }],
          labels: labels
        },
        options: {
          responsive: true,
          legend: {
            position: 'bottom'
          },
          plugins: {
            datalabels: {
              color: '#fff',
              anchor: 'end',
              align: 'start',
              offset: -10,
              borderWidth: 2,
              borderColor: '#fff',
              borderRadius: 25,
              backgroundColor: (context) => {
                return context.dataset.backgroundColor;
              },
              font: {
                weight: 'bold',
                size: '10'
              },
              formatter: (value) => {
                return value + ' %';
              }
            },
            legend: {
              labels: {
                font: {
                  size: 20,
                  weight: 'bold'
                }
              }
            }
          }
        }
    })
  })
}

generateChart();
//generatePercentageChart();
