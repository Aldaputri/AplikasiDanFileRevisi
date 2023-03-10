<?php require_once('config/main.php');
$data_pembelian = mysqli_query($koneksi,"select * from user");
$data_teknisi=mysqli_query($koneksi,"select * from teknisi1");
$data_user=mysqli_query($koneksi,"select * from user1");
$data_spk=mysqli_query($koneksi,"select * from teknisi");
 ?>


<script src="plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		/*
         * BAR CHART
         * ---------
         */

        var bar_data = {
          data: [["Data User", <?php echo mysqli_num_rows($data_user); ?>], ["Data Pembelian", <?php echo mysqli_num_rows($data_pembelian); ?>], ["Data Teknisi", <?php echo mysqli_num_rows($data_teknisi); ?>], ["Data SPK", <?php echo mysqli_num_rows($data_spk); ?>]],
          color: "#00A3CB"
        };
        $.plot("#bar-chart", [bar_data], {
          grid: {
            borderWidth: 1,
            borderColor: "#f3f3f3",
            tickColor: "#F39C12"
          },
          series: {
            bars: {
              show: true,
              barWidth: 0.5,
              align: "center"
            }
          },
          xaxis: {
            mode: "categories",
            tickLength: 0
          }
        });
        /* END BAR CHART */

        /*
         * DONUT CHART
         * -----------
         */

        var donutData = [
          {label: "Data User", data: <?php echo mysqli_num_rows($data_user); ?>, color: "#00C0EF"},
          {label: "Data Pembelian", data: <?php echo mysqli_num_rows($data_pembelian); ?>, color: "#00A65A"},
          {label: "Data Teknisi", data: <?php echo mysqli_num_rows($data_teknisi); ?>, color: "#F39C12"},
          {label: "Data SPK", data: <?php echo mysqli_num_rows($data_spk); ?>, color: "#DD4B39"}
        ];
        $.plot("#donut-chart", donutData, {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
              }

            }
          },
          legend: {
            show: false
          }
        });
        /*
         * END DONUT CHART
         */
         function labelFormatter(label, series) {
        	return "<div style='font-size:11px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>"
                + label
                + "<br/>"
                + Math.round(series.percent) + "%</div>";
      }
	});	
</script>