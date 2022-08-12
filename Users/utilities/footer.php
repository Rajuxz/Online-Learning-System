</div>
</div>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>
<script>
    // For Date
    let today = new Date().toISOString().slice(0, 10);
    document.getElementById("date").innerText = today;
    // For Toggle
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        $(function(){
            $("#playlist li").on("click",function(){
                    $("#videoarea").attr({
                        src: $(this).attr("movieurl"),
                    })
            })
            $("#videoarea").attr({
                src:$("#playlist li").eq(0).attr("movieurl"),
             })
        })
    });


    //For video
</script>



</body>
</html>