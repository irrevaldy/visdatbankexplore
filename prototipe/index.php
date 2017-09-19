<?php include "php/session.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <style>
  body { font: 12px Arial;}
  .axis path,
  .axis line {
      fill: none;
      stroke: grey;
      stroke-width: 1;
      shape-rendering: crispEdges;
  }
  .bar {
    fill: steelblue;
    fill-opacity: .9;
  }
  .bar:hover
  {
    fill: brown;
  }
  </style>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap.min.js"></script>
  <script src="d3.min.js" charset="utf-8"></script>
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Fonts -->
	<!-- Scripts -->
  <script src="js/close_menu.js"></script>
	<title>Visualisasi DSIB</title>

  <!-- Menu Toggle Script -->
</head>
<body>
	<i class="fa fa-bars toggle_menu"></i>

	<div class="sidebar_menu" >
		<i class="fa fa-times"></i>
		<center>
			<a href="#"><h1 class="boxed_item">Visualisasi DSIB <span class="logo_bold"></span></h1>
			</a>
		</center>

		<ul class="navigation_section" >
			<li class="navigation_item" id="profile">
				<a href="upload.php">Upload Data</a>
			</li>
      <li class="navigation_item" id="profile" selected>
				<a href="index.php">Visualisasi</a>
			</li>
      <li class="navigation_item" id="profile">
        <a href="upload.php">Simulasi</a>
      </li>
      <li class="navigation_item" id="profile">
				<a href="upload.php">Clustering</a>
			</li>
      <br>
      <li class="navigation_item" id="sort">
				<label><input type="checkbox"> Sort Values</label>
			</li>
      <li class="navigation_item" id="destroysession" style="color:black">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type="submit" name="submito" value=" Reset Filter ">
          </form>
          <?php
          if(isset($_POST['submito'])){
          $_SESSION['kelkomponen'] = 'dsibscore';
          $_SESSION['kelkepemilikan'] = 'All';
          $_SESSION['kelbuku'] = 'All';
          $_SESSION['dsibflag'] = 'All';
          $_SESSION['waktu'] = date('Y-m');
          $_SESSION['month'] = date('m');
          $_SESSION['year'] = date('Y');
          }
          ?>
			</li>
      <li class="navigation_item" id="kelkomponen">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <select name="kelkomponen[]" onchange="this.form.submit();" style="color:black">
        <?php echo get_radio_buttons0($_SESSION['kelkomponen']); ?>
      </select>
        </form>
      </li>
      <li class="navigation_item" id="kelkepemilikan">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <select name="kelkepemilikan[]" onchange="this.form.submit();" style="color:black">
        <?php echo get_radio_buttons($_SESSION['kelkepemilikan']); ?>
      </select>
        </form>
      </li>
      <li class="navigation_item" id="kelbuku">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <select name="kelbuku[]" onchange="this.form.submit();" style="color:black">
        <?php echo get_radio_buttons2($_SESSION['kelbuku']); ?>
      </select>
        </form>
      </li>
      <li class="navigation_item" id="dsibflag">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <select name="dsibflag[]" onchange="this.form.submit();" style="color:black">
        <?php echo get_radio_buttons3($_SESSION['dsibflag']); ?>
      </select>
        </form>
      </li>
      <li class="navigation_item" id="waktu">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <label>Month</label>
          <input style="color:black"  onchange="this.form.submit();" type="month" value="<?php echo $_SESSION['year'] ?>-<?php echo $_SESSION['month'] ?>" name="waktu">
        </form>
      </li>
		</ul>
	</div><!-- End of sidebar -->



  <script>
  var margin = {top: 20, right: 10, bottom: 100, left:100},
      width = 1200 - margin.right - margin.left,
      height = 500 - margin.top - margin.bottom;

  var xScale = d3.scale.ordinal()
      .rangeRoundBands([0,width], 0.2, 0.2);

  var yScale = d3.scale.linear()
      .range([height, 0]);

  // define x axis and y axis
  var xAxis = d3.svg.axis()
      .scale(xScale)
      .orient("bottom");

  var yAxis = d3.svg.axis()
      .scale(yScale)
      .orient("left");

  var svg = d3.select("body")
      .append("svg")
        .attr ({
          "width": width + margin.right + margin.left,
          "height": height + margin.top + margin.bottom
        })
      .append("g")
        .attr("transform","translate(" + margin.left + "," + margin.right + ")");

        var incomingdata;
        var clickedId = '<?php echo $_SESSION['kelkomponen']; ?>';
        var selected_kelkepemilikan = '<?php echo $_SESSION['kelkepemilikan']; ?>';
        var selected_kelbuku = '<?php echo $_SESSION['kelbuku']; ?>';
        var selected_dsibflag = '<?php echo $_SESSION['dsibflag']; ?>';
        var selected_month = '<?php echo $_SESSION['month']; ?>';
          var selected_year = '<?php echo $_SESSION['year']; ?>';
        d3.json("php/data2.php?id=" + clickedId + "&kelkepemilikan=" + selected_kelkepemilikan  + "&kelbuku=" + selected_kelbuku + "&dsibflag=" + selected_dsibflag + "&month=" + selected_month + "&year=" + selected_year, function(error,data) {

    if(error) console.log("Error: data not loaded!");
    incomingdata = data;

    data.forEach(function(d) {
      d.idbank = d.idbank;
      if(clickedId == 'dsibscore')
      {
        d.dsibscore = +d.dsibscore;       // try removing the + and see what the console prints
        console.log(d.dsibscore);   // use console.log to confirm
      }
      else if(clickedId == 'sizescore'){
        d.dsibscore = +d.sizescore;       // try removing the + and see what the console prints
        console.log(d.sizescore);   // use console.log to confirm
      }
      else if(clickedId == 'interconnectedness'){
        d.dsibscore = +d.interconnectedness;       // try removing the + and see what the console prints
        console.log(d.interconnectedness);   // use console.log to confirm
      }
      else if(clickedId == 'ifsascore'){
        d.dsibscore = +d.ifsascore;       // try removing the + and see what the console prints
        console.log(d.ifsascore);   // use console.log to confirm
      }
      else if(clickedId == 'ifsl'){
        d.dsibscore = +d.ifsl;       // try removing the + and see what the console prints
        console.log(d.ifsl);   // use console.log to confirm
      }
      else if(clickedId == 'debts'){
        d.dsibscore = +d.debts;       // try removing the + and see what the console prints
        console.log(d.debts);   // use console.log to confirm
      }
      else if(clickedId == 'complexitys'){
        d.dsibscore = +d.complexitys;       // try removing the + and see what the console prints
        console.log(d.complexitys);   // use console.log to confirm
      }
      else if(clickedId == 'complexitycs'){
        d.dsibscore = +d.complexitycs;       // try removing the + and see what the console prints
        console.log(d.complexitycs);   // use console.log to confirm
      }
      else if(clickedId == 'countryss'){
        d.dsibscore = +d.countryss;       // try removing the + and see what the console prints
        console.log(d.countryss);   // use console.log to confirm
      }
      else if(clickedId == 'substitutabilityscore'){
        d.dsibscore = +d.substitutabilityscore;       // try removing the + and see what the console prints
        console.log(d.substitutabilityscore);   // use console.log to confirm
      }
    });

    // Specify the domains of the x and y scales
    xScale.domain(data.map(function(d) { return d.idbank; }) );
    if(clickedId == 'dsibscore')
    {
        yScale.domain([0, d3.max(data, function(d) { return d.dsibscore; } ) ]);
    }
    else if(clickedId == 'sizescore'){
      yScale.domain([0, d3.max(data, function(d) { return d.sizescore; } ) ]);
    }
    else if(clickedId == 'interconnectedness'){
        yScale.domain([0, d3.max(data, function(d) { return d.interconnectedness; } ) ]);
    }
    else if(clickedId == 'ifsascore'){
        yScale.domain([0, d3.max(data, function(d) { return d.ifsascore; } ) ]);
    }
    else if(clickedId == 'ifsl'){
        yScale.domain([0, d3.max(data, function(d) { return d.ifsl; } ) ]);
    }
    else if(clickedId == 'debts'){
      yScale.domain([0, d3.max(data, function(d) { return d.debts; } ) ]);
    }
    else if(clickedId == 'complexitys'){
        yScale.domain([0, d3.max(data, function(d) { return d.complexitys; } ) ]);
    }
    else if(clickedId == 'complexitycs'){
        yScale.domain([0, d3.max(data, function(d) { return d.complexitycs; } ) ]);
    }
    else if(clickedId == 'countryss'){
        yScale.domain([0, d3.max(data, function(d) { return d.countryss; } ) ]);
    }
    else if(clickedId == 'substitutabilityscore'){
        yScale.domain([0, d3.max(data, function(d) { return d.substitutabilityscore; } ) ]);
    }

    // Draw xAxis and position the label
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
        .append("text")
        .attr("y", 50)
        .attr("x", 1100)
        .attr("dx", "-.8em")
        .attr("dy", ".25em")
        .attr("transform", "rotate(0)" )
        .attr("font-size", "10px")
        .style("text-anchor", "end")
        .text("Bank ID");


    // Draw yAxis and postion the label
    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis)
        .append("text")
        .attr("transform", "rotate(-90)")
      //  .attr("y", -height/2)
        //.attr("dy", "71em")
        .attr("y", 10)
        .attr("x", -10)
      .attr("dy", ".71em")
        .style("text-anchor", "middle")
        .text("Score");

        if(clickedId == 'dsibscore')
        {
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.dsibscore); })
            .attr("height", function(d) { return height - yScale(d.dsibscore); });
        }
        else if(clickedId == 'sizescore') {
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.sizescore); })
            .attr("height", function(d) { return height - yScale(d.sizescore); });
        }
        else if(clickedId == 'interconnectedness'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.interconnectedness); })
            .attr("height", function(d) { return height - yScale(d.interconnectedness); });
        }
        else if(clickedId == 'ifsascore'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.ifsascore); })
            .attr("height", function(d) { return height - yScale(d.ifsascore); });
        }
        else if(clickedId == 'ifsl'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.ifsl); })
            .attr("height", function(d) { return height - yScale(d.ifsl); });
        }
        else if(clickedId == 'debts'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.debts); })
            .attr("height", function(d) { return height - yScale(d.debts); });
        }
        else if(clickedId == 'complexitys'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.complexitys); })
            .attr("height", function(d) { return height - yScale(d.complexitys); });
        }
        else if(clickedId == 'complexitycs'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.complexitycs); })
            .attr("height", function(d) { return height - yScale(d.complexitycs); });
        }
        else if(clickedId == 'countryss'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.countryss); })
            .attr("height", function(d) { return height - yScale(d.countryss); });
        }
        else if(clickedId == 'substitutabilityscore'){
          svg.selectAll(".bar")
            .data(data)
          .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return xScale(d.idbank); })
            .attr("width", xScale.rangeBand())

            .attr("y", function(d) { return yScale(d.substitutabilityscore); })
            .attr("height", function(d) { return height - yScale(d.substitutabilityscore); });
        }

    d3.select("input").on("change", change);

    var sortTimeout = setTimeout(function() {
    d3.select("input").property("checked", false).each(change);
  }, 2000);

    function change() {
      clearTimeout(sortTimeout);
      if(clickedId == 'dsibscore')
      {
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.dsibscore - a.dsibscore; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'sizescore'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.sizescore - a.sizescore; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'interconnectedness'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.interconnectedness - a.interconnectedness; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'ifsascore'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.ifsascore - a.ifsascore; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'ifsl'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.sizescore - a.sizescore; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'debts'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.debts - a.debts; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'complexitys'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.complexitys - a.complexitys; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'complexitycs'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.complexitycs - a.complexitycs; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'countryss'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.countryss - a.countryss; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }
      else if(clickedId == 'substitutabilityscore'){
        // Copy-on-write since tweens are evaluated after a delay.
        var x0 = xScale.domain(data.sort(this.checked
            ? function(a, b) { return b.substitutabilityscore - a.substitutabilityscore; }
            : function(a, b) { return a.idbank - b.idbank; })
            .map(function(d) { return d.idbank; }))
            .copy();
      }


    svg.selectAll(".bar")
        .sort(function(a, b) { return x0(a.idbank) - x0(b.idbank); });

    var transition = svg.transition().duration(750),
        delay = function(d, i) { return i * 50; };

    transition.selectAll(".bar")
        .delay(delay)
        .attr("x", function(d) { return x0(d.idbank); });

    transition.select(".x.axis")
        .call(xAxis)
      .selectAll("g")
        .delay(delay);
    }
  }
  );
</script>
</body>
</html>
