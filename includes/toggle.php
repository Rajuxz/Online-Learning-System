  <!-- /#page-content-wrapper -->
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js" integrity="sha512-zjlf0U0eJmSo1Le4/zcZI51ks5SjuQXkU0yOdsOBubjSmio9iCUp8XPLkEAADZNBdR9crRy3cniZ65LF2w8sRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- For offline purpose. 
Download and use commented code accordingly. -->
<!-- <script src="js/jquery-3.6.0.min.js"></script> -->
<!-- <script src="js/chart.js"></script> -->
<!-- <script src="js/draw.js"></script> -->
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };

    
    // For Chart In Dashboard.
    $(document).ready(function(){
    $.ajax({
        url:'http://localhost/onlineLearning/data.php',
        method: 'GET',
        success: function(data) {
            console.log(data);
            var count = [];
            var date = [];
            for(i in data){
              // console.log(data)
              count.push(data[i].id);
              date.push(data[i].e_date);
            }
            // console.log(count);
            var d = 10;
            var chartdata = {
              labels: date,
              datasets:[
                {
                  label : 'Students',
                  // fill:false,
                  //lineTension:0.3,
                  backgroundColor: '#000',
                  borderColor: '#000',
                  // hoverBackgroundColor: '#00FFFF',
                  // hoverBorderColor: '#FF0000',
                  data: count,
                },
              ]
            }
            var ctx = $("#mygraph");
            ctx.height(375);
            var BarGraph = new Chart(ctx, {
            type: 'bar',
            data: chartdata,
            options:{
              scales:{
                y:{
                  suggestedMin: 1,
                  suggestedMax:10
                }
              }
            }
           });
        }
    })
})
</script>
</body>

</html>