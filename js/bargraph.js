var margin = {top: 120, right: 10, bottom: 100, left:100},
    width = 1200 - margin.right - margin.left,
    height = 600 - margin.top - margin.bottom;

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

var tip = d3.tip()
  .attr("class", "d3-tip")
  .offset([-10, 0])
  .html(function(d) {
    if(clickedId == 'dsib_score')
    {
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.dsib_score;
    }
    else if(clickedId == 'size'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.size;
    }
    else if(clickedId == 'interconnect'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.interconnect;
    }
    else if(clickedId == 'ifsa'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.ifsa;
    }
    else if(clickedId == 'ifsl'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.ifsl;
    }
    else if(clickedId == 'ds'){
        return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.ds;
    }
    else if(clickedId == 'complexity'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.complexity;
    }
    else if(clickedId == 'complexity_c'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.complexity_c;
    }
    else if(clickedId == 'complexity_cs'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.complexity_cs;
    }
    else if(clickedId == 'complexity_sub'){
      return "Bank ID: " + d.id_bank + "<br>" + clickedId + ": " + d.complexity_sub;
    }
  });

var svg = d3.select("body")
    .append("svg")
      .attr ({
        "width": width + margin.right + margin.left,
        "height": height + margin.top + margin.bottom
      })
    .append("g")
      .attr("transform","translate(" + margin.left + "," + margin.top + ")");

svg.call(tip);

var incomingdata;
d3.json("php/data2.php?id=" + clickedId + "&ownership=" + selected_ownership  + "&buku=" + selected_buku + "&dsibflag=" +
 selected_dsibflag + "&month=" + selected_month + "&year=" + selected_year + "&id_data=" + selected_id_data, function(error,data) {
  if(error) console.log("Error: data not loaded!");
  incomingdata = data;

  data.forEach(function(d) {
    d.id_bank = d.id_bank;
    if(clickedId == 'dsib_score')
    {
      d.dsib_score = +d.dsib_score;       // try removing the + and see what the console prints
      console.log(d.dsib_score);   // use console.log to confirm
    }
    else if(clickedId == 'size'){
      d.size = +d.size;       // try removing the + and see what the console prints
      console.log(d.size);   // use console.log to confirm
    }
    else if(clickedId == 'interconnect'){
      d.interconnect = +d.interconnect;       // try removing the + and see what the console prints
      console.log(d.interconnect);   // use console.log to confirm
    }
    else if(clickedId == 'ifsa'){
      d.ifsa = +d.ifsa;       // try removing the + and see what the console prints
      console.log(d.ifsa);   // use console.log to confirm
    }
    else if(clickedId == 'ifsl'){
      d.ifsl = +d.ifsl;       // try removing the + and see what the console prints
      console.log(d.ifsl);   // use console.log to confirm
    }
    else if(clickedId == 'ds'){
      d.ds = +d.ds;       // try removing the + and see what the console prints
      console.log(d.ds);   // use console.log to confirm
    }
    else if(clickedId == 'complexity'){
      d.complexity = +d.complexity;       // try removing the + and see what the console prints
      console.log(d.complexity);   // use console.log to confirm
    }
    else if(clickedId == 'complexity_c'){
      d.complexity_c = +d.complexity_c;       // try removing the + and see what the console prints
      console.log(d.complexity_c);   // use console.log to confirm
    }
    else if(clickedId == 'complexity_cs'){
      d.complexity_cs = +d.complexity_cs;       // try removing the + and see what the console prints
      console.log(d.complexity_cs);   // use console.log to confirm
    }
    else if(clickedId == 'complexity_sub'){
      d.complexity_sub = +d.complexity_sub;       // try removing the + and see what the console prints
      console.log(d.complexity_sub);   // use console.log to confirm
    }
  });

  // Specify the domains of the x and y scales
  xScale.domain(data.map(function(d) { return d.id_bank; }) );
  if(clickedId == 'dsib_score')
  {
      yScale.domain([0, d3.max(data, function(d) { return d.dsib_score; } ) ]);
  }
  else if(clickedId == 'size'){
    yScale.domain([0, d3.max(data, function(d) { return d.size; } ) ]);
  }
  else if(clickedId == 'interconnect'){
      yScale.domain([0, d3.max(data, function(d) { return d.interconnect; } ) ]);
  }
  else if(clickedId == 'ifsa'){
      yScale.domain([0, d3.max(data, function(d) { return d.ifsa; } ) ]);
  }
  else if(clickedId == 'ifsl'){
      yScale.domain([0, d3.max(data, function(d) { return d.ifsl; } ) ]);
  }
  else if(clickedId == 'ds'){
    yScale.domain([0, d3.max(data, function(d) { return d.ds; } ) ]);
  }
  else if(clickedId == 'complexity'){
      yScale.domain([0, d3.max(data, function(d) { return d.complexity; } ) ]);
  }
  else if(clickedId == 'complexity_c'){
      yScale.domain([0, d3.max(data, function(d) { return d.complexity_c; } ) ]);
  }
  else if(clickedId == 'complexity_cs'){
      yScale.domain([0, d3.max(data, function(d) { return d.complexity_cs; } ) ]);
  }
  else if(clickedId == 'complexity_sub'){
      yScale.domain([0, d3.max(data, function(d) { return d.complexity_sub; } ) ]);
  }

  var countdata =svg.selectAll("text").data(data).enter().size();
  //console.log(countdata);

  if(countdata < 50)
  {
    svg.append("g")
          .attr("class", "x axis")
          .attr("transform", "translate(0," + height + ")")
          .call(xAxis)
          .selectAll("text")
          .attr("y", 50)
          .attr("x", 1100)
          .attr("dx", "-.8em")
          .attr("dy", ".25em")
          .attr("transform", "rotate(-45)" )
          .attr("font-size", "10px")
          .style("text-anchor", "end");

      svg.append("text")
            .attr("y", 425)
            .attr("x", 1100)
            .attr("dx", "-.8em")
            .attr("dy", ".25em")
            .attr("transform", "rotate(0)" )
            .attr("font-size", "12px")
            .attr("font-weight", "bold")
            .style("text-anchor", "end")
            .text("Bank ID");
  }
  else
  {
    svg.append("g")
          .attr("transform", "translate(0," + height + ")")
          .call(xAxis)
          .selectAll("text")
          .attr("y", 50)
          .attr("x", 1100)
          .attr("dx", "-.8em")
          .attr("dy", ".25em");

    svg.append("text")
          .attr("y", 425)
          .attr("x", 1100)
          .attr("dx", "-.8em")
          .attr("dy", ".25em")
          .attr("transform", "rotate(0)" )
          .attr("font-size", "12px")
          .attr("font-weight", "bold")
          .style("text-anchor", "end")
          .text("Bank ID");
  }

  // Draw yAxis and postion the label
  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
      .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 10)
      .attr("x", -10)
      .attr("dy", ".71em")
      .style("text-anchor", "middle")
      .text("Score");

  if(clickedId == 'dsib_score')
  {
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.dsib_score); })
      .attr("height", function(d) { return height - yScale(d.dsib_score); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'size') {
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.size); })
      .attr("height", function(d) { return height - yScale(d.size); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'interconnect'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.interconnect); })
      .attr("height", function(d) { return height - yScale(d.interconnect); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'ifsa'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.ifsa); })
      .attr("height", function(d) { return height - yScale(d.ifsa); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'ifsl'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.ifsl); })
      .attr("height", function(d) { return height - yScale(d.ifsl); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'ds'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.ds); })
      .attr("height", function(d) { return height - yScale(d.ds); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'complexity'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.complexity); })
      .attr("height", function(d) { return height - yScale(d.complexity); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'complexity_c'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.complexity_c); })
      .attr("height", function(d) { return height - yScale(d.complexity_c); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'complexity_cs'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.complexity_cs); })
      .attr("height", function(d) { return height - yScale(d.complexity_cs); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }
  else if(clickedId == 'complexity_sub'){
    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return xScale(d.id_bank); })
      .attr("width", xScale.rangeBand())
      .attr("y", function(d) { return yScale(d.complexity_sub); })
      .attr("height", function(d) { return height - yScale(d.complexity_sub); })
      .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
  }

  d3.select("input").on("change", change);

  var sortTimeout = setTimeout(function() { d3.select("input").property("checked", false).each(change); }, 2000);

  function change() {
    clearTimeout(sortTimeout);
    if(clickedId == 'dsib_score')
    {
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.dsib_score - a.dsib_score; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'size'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.size - a.size; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'interconnect'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.interconnect - a.interconnect; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'ifsa'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.ifsa - a.ifsa; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'ifsl'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.size - a.size; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'ds'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.ds - a.ds; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'complexity'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.complexity - a.complexity; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'complexity_c'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.complexity_c - a.complexity_c; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'complexity_cs'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.complexity_cs - a.complexity_cs; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }
    else if(clickedId == 'complexity_sub'){
      // Copy-on-write since tweens are evaluated after a delay.
      var x0 = xScale.domain(data.sort(this.checked
          ? function(a, b) { return b.complexity_sub - a.complexity_sub; }
          : function(a, b) { return a.id_bank - b.id_bank; })
          .map(function(d) { return d.id_bank; }))
          .copy();
    }

  svg.selectAll(".bar")
      .sort(function(a, b) { return x0(a.id_bank) - x0(b.id_bank); });

  var transition = svg.transition().duration(750),
      delay = function(d, i) { return i * 50; };

  transition.selectAll(".bar")
      .delay(delay)
      .attr("x", function(d) { return x0(d.id_bank); });

  transition.select(".x.axis")
      .call(xAxis)
      .selectAll("g")
      .delay(delay);
  }
});
