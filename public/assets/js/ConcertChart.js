
const ctx = document.getElementById('ConcertChart');
const ctxSelectConcert = document.getElementById('SelectConcert');

let chart = null;

function generateChart()
{

  if(chart)
  {
    chart.destroy();
  }

    fetch('/ConcertTotalSalesData')
    .then(response => response.json())
    .then(concertsData => {

        const concerts = concertsData;

        fetch('/SalesData')
        .then(response => response.json())
        .then(salesData =>{
            
            const sales = salesData;

            const concertSales = [];
            const concertSalesDate = [];

            var concertSelected = 0;

            //Se indentifica la id del concierto que se ha seleccionado.
            concerts.forEach(concert => {
              if(concert.name == ctxSelectConcert.options[ctxSelectConcert.selectedIndex].text){
                concertSelected = concert.id;
              }
            });

            //Falta revisar.
            sales.forEach(sale => {
                if(sale.concertId == concertSelected)
                {
                    concertSales.push(sale.total);
                    concertSalesDate.push(sale.date);
                }
            });
            concertSalesDate.push('...')

            //Gráfico de barras para el concierto seleccionado
            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: concertSalesDate,
                  datasets: [{
                    label: 'Total de venta del día',
                    data: concertSales,
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
        })
    })

}

ctxSelectConcert.addEventListener('change', generateChart);

generateChart();
