<?php include('header_dashboard.php');?>

        <div class="card text-bg-dark" style="width: 400px; height: 200px;">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    // <block:setup:1>
    const ctx=document.getElementById("myChart");
    new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
</script>