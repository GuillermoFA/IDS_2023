
let CashPercentage = document.getElementById('CashPercentage');
let TransferPercentage = document.getElementById('TransferPercentage');
let DebitPercentage = document.getElementById('DebitPercentage');
let CreditPercentage = document.getElementById('CreditPercentage');

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

        console.log(salesByMethod);

        new Chart(ctxMethod, {
            type: 'bar',
            data: {
                labels: ["Efectivo", "Transferencia", "Tarjeta de Débito", "Tarjeta de Crédito"],
                datasets: [{
                label: 'Total de venta del día',
                data: salesByMethod,
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            }
        });

    let labels = ['Efectivo', 'Transferencia', 'Tarjeta de Débito', 'Tarjeta de Crédito'];
    let colorHex = ['#FB3640', '#EFCA08', '#43AA8B', '#253D5B'];

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
            }
          }
        }
    })
    })
}

generateChart();
generatePercentageChart();
