
const ctx = document.getElementById('ConcertChart');
const ctxSelectConcert = document.getElementById('SelectConcert');
let ctxError = document.getElementById('ChartSelectedError');

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

            var concertSales = [];
            var concertSalesDate = [];

            var concertSelected = 0;

            var concertSelectedName = "";


            //Se indentifica la id del concierto que se ha seleccionado.
            concerts.forEach(concert => {
              if(concert.name == ctxSelectConcert.options[ctxSelectConcert.selectedIndex].text){
                concertSelected = concert.id;
                concertSelectedName = concert.name;
                return;
              }
            });

            //Falta revisar.
            sales.forEach(sale => {
                if(sale.concertId == concertSelected)
                {
                  if(concertSalesDate[0] == null)
                  {
                    concertSales.push(sale.total);
                    concertSalesDate.push(sale.date);

                  }
                  else if (concertSalesDate[concertSalesDate.length - 1] == sale.date)
                  {
                    concertSales[concertSalesDate.length - 1] += sale.total;
                  }
                  else
                  {
                    concertSales.push(sale.total);
                    concertSalesDate.push(sale.date);
                  }
                  console.log("entrando");
                }
            });


            if(concertSalesDate.length == 0)
            {
              ctxError.innerHTML = "No hay ventas para el concierto " + concertSelectedName;
              return;
            }
            else
            {

              ctxError.innerHTML = "";

              concertSalesDate.push('...')

              //Gráfico de barras para el concierto seleccionado
              chart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: concertSalesDate,
                    datasets: [{
                      label: 'Total de venta del día',
                      data: concertSales,
                      borderWidth: 1,
                      backgroundColor: ['#f62e30']
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
              }
        })
    })

}

ctxSelectConcert.addEventListener('change', generateChart);

generateChart();
