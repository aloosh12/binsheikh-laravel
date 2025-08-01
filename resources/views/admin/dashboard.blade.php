@extends('admin.template.layout')
@section('header')


@stop
@section('content')
<div class="container-fluid">
    <div class="fade-in">
     <div class="row g-4 mb-4">
         <div class="col-sm-6 col-lg-3">

          <div class="card text-white bg-gradient-primary">
            <div class="card-body card-body  d-flex justify-content-between align-items-center">
              <div>
                <div class="text-value-lg">{{$bookings}}</div>
                <div>Bookings</div>
              </div>
              <div>
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building-check" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
</svg>
              </div>
            </div>

          </div>
        </div>

           <div class="col-sm-6 col-lg-3">

          <div class="card text-white bg-primary border-0 boder-0">
            <div class="card-body card-body  d-flex justify-content-between align-items-center">
              <div>
                <div class="text-value-lg">{{$properties}}</div>
                <div>Properties</div>
              </div>
              <div>
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
  <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
</svg>
              </div>
            </div>

          </div>
        </div>



         <div class="col-sm-6 col-lg-3">

          <div class="card text-white bg-gradient-primary">
            <div class="card-body card-body  d-flex justify-content-between align-items-center">
              <div>
                <div class="text-value-lg">{{$rent}}</div>
                <div>For Rent</div>
              </div>
              <div>
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building-up" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
</svg>
              </div>
            </div>

          </div>
        </div>

        <div class="col-sm-6 col-lg-3">

          <div class="card text-white bg-primary border-0 border-0">
            <div class="card-body card-body  d-flex justify-content-between align-items-center">
              <div>
                <div class="text-value-lg">{{$sale}}</div>
                <div>For Sale</div>
              </div>
              <div>
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building-lock" viewBox="0 0 16 16">
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
</svg>

              </div>
            </div>

          </div>
        </div>

         <div class="col-sm-6 col-lg-3">
             <div class="card text-white bg-primary border-0 border-0">
                 <div class="card-body card-body  d-flex justify-content-between align-items-center">
                     <div>
                         <div class="text-value-lg">{{$available_rent}}</div>
                         <div>Available For Rent</div>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building-lock" viewBox="0 0 16 16">
                             <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                             <path d="M13.854 10.146a.5.5 0 0 0-.708 0L10.5 12.793l-1.146-1.147a.5.5 0 0 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0 0-.708z"/>
                         </svg>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-sm-6 col-lg-3">
             <div class="card text-white bg-gradient-primary border-0">
                 <div class="card-body card-body d-flex justify-content-between align-items-center">
                     <div>
                         <div class="text-value-lg">{{$available_sale}}</div>
                         <div>Available For Sale</div>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building-lock" viewBox="0 0 16 16">
                             <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                             <path d="M9.438 4.312a.5.5 0 0 0-.876 0L7.25 6.37 6.436 5.12a.5.5 0 1 0-.872.56L6.43 7.344l-1.866 2.332a.5.5 0 1 0 .78.624L7 8.58l1.656 1.72a.5.5 0 1 0 .72-.72L8.22 8.344l1.902-2.375a.5.5 0 0 0 0-.625z"/>
                         </svg>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-sm-6 col-lg-3">
             <div class="card text-white bg-primary border-0 border-0">
                 <div class="card-body card-body  d-flex justify-content-between align-items-center">
                     <div>
                         <div class="text-value-lg">{{$sold}}</div>
                         <div>Sold Properties</div>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-building-lock" viewBox="0 0 16 16">
                             <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                             <path d="M13.854 10.146a.5.5 0 0 0-.708 0L10.5 12.793l-1.146-1.147a.5.5 0 0 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0 0-.708z"/>
                         </svg>
                     </div>
                 </div>
             </div>
         </div>



            <!-- /.col-->

            <!-- /.col-->

            <!-- /.col-->
          </div>
          <div class="row">
              <div class="col-md-12">
              <div class="card">
    <div class="card-body">
        <h5 class="card-title">Monthly Sales</h5>
        <canvas id="myChart" style="height: 400px;"></canvas>
    </div>
</div>

              </div>
          </div>

      <!-- /.row-->

    </div>
  </div>
@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
document.addEventListener("DOMContentLoaded", function() {
  const months = @json($months);
  const buyData = @json($data);
  const monthColors = [
        'rgba(255, 99, 132, 0.6)',   // January
        'rgba(54, 162, 235, 0.6)',   // February
        'rgba(255, 206, 86, 0.6)',   // March
        'rgba(75, 192, 192, 0.6)',   // April
        'rgba(153, 102, 255, 0.6)',  // May
        'rgba(255, 159, 64, 0.6)',   // June
        'rgba(255, 99, 132, 0.6)',   // July
        'rgba(54, 162, 235, 0.6)',   // August
        'rgba(255, 206, 86, 0.6)',   // September
        'rgba(75, 192, 192, 0.6)',   // October
        'rgba(153, 102, 255, 0.6)',  // November
        'rgba(255, 159, 64, 0.6)'    // December
    ];
    const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // 'bar', 'line', 'pie', etc.
            data: {
                labels: months,
                datasets: [{
                    label: 'Sales Data',
                    data: buyData,
                    backgroundColor: monthColors,
                    borderColor: monthColors.map(color => color.replace('0.6', '1')), // Make border color a darker version of the background color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return 'QAR ' + tooltipItem.raw.toLocaleString();
                            }
                        }
                    },
                    datalabels: {
                      formatter: function(value) {
                        console.log(value);

                          if (value !== undefined && value !== null) {
                              return 'QAR ' + value.toLocaleString();
                          }
                          return 'QAR 0';
                      },
                      color: 'black',
                      font: {
                          weight: 'bold',
                          size: 12
                      }
                  }
                }
            },
            plugins: [ChartDataLabels]
        });
});
</script>


@stop
