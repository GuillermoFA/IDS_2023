
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

            const concertSelected = 0;
      
            concerts.forEach(concert => {
              console.log(concert.name + " | " + ctxSelectConcert.innerText);
              if(concert.name == ctxSelectConcert.value){
                concertSelected = concert.id;
              }
            });

            console.log(concertSelected);
            console.log()

            sales.forEach(sale => {
                if(sale.concertId == concertSelected)
                {
                    concertSales.push(sale.total);
                    concertSalesDate.push(sale.date);
                }
            });
            concertSalesDate.push('...')
            console.log(concertSales);

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
