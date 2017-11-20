var margin = {top: 120, right: 10, bottom: 100, left:100},
    width = 1200 - margin.right - margin.left,
    height = 600 - margin.top - margin.bottom;

var x = d3.scale.ordinal()
.rangeRoundBands([0,width], 0.2, 0.2);

var y = d3.scale.linear()
.range([height, 0]);

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
  });

  var g = svg.append("g")
  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

svg.call(tip);
d3.json("php/data2.php?id=" + clickedId + "&ownership=" + selected_ownership  + "&buku=" + selected_buku + "&dsibflag=" +
 selected_dsibflag + "&month=" + selected_month + "&year=" + selected_year,
function(error,data)
{
if(error) console.log("Error: data not loaded!");

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
else if(clickedId == 'substitutability'){
  d.substitutability = +d.substitutability;       // try removing the + and see what the console prints
  console.log(d.substitutability);   // use console.log to confirm
}
});

if(clickedId == 'dsib_score')
{
    var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.dsib_score); })
}
else if(clickedId == 'size'){
  var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.size); })
}
else if(clickedId == 'interconnect'){
  var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.interconnect); })
}
else if(clickedId == 'ifsa'){
  var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.ifsa); })
}
else if(clickedId == 'ifsl'){
    var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.ifsl); })
}
else if(clickedId == 'ds'){
  var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.ds); })
}
else if(clickedId == 'complexity'){
  var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.complexity); })
}
else if(clickedId == 'complexity_c'){
    var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.complexity_c); })
  }
else if(clickedId == 'complexity_cs'){
  var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.complexity_cs); })
}
else if(clickedId == 'substitutability'){
  var line = d3.svg.line().x(function(d) { return x(d.id_bank); }).y(function(d) { return y(d.substitutability); })
  }

x.domain(data.map(function(d) { return d.id_bank; }));

if(clickedId == 'dsib_score')
{
    y.domain([0, d3.max(data, function(d) { return d.dsib_score; })]);
}
else if(clickedId == 'size'){
  y.domain([0, d3.max(data, function(d) { return d.size; })]);
}
else if(clickedId == 'interconnect'){
  y.domain([0, d3.max(data, function(d) { return d.interconnect; })]);
}
else if(clickedId == 'ifsa'){
  y.domain([0, d3.max(data, function(d) { return d.ifsa; })]);
}
else if(clickedId == 'ifsl'){
    y.domain([0, d3.max(data, function(d) { return d.ifsl; })]);
}
else if(clickedId == 'ds'){
  y.domain([0, d3.max(data, function(d) { return d.ds; })]);
}
else if(clickedId == 'complexity'){
y.domain([0, d3.max(data, function(d) { return d.complexity; })]);
}
else if(clickedId == 'complexity_c'){
  y.domain([0, d3.max(data, function(d) { return d.complexity_c; })]);
}
else if(clickedId == 'complexity_cs'){
y.domain([0, d3.max(data, function(d) { return d.complexity_cs; })]);
}
else if(clickedId == 'substitutability'){
y.domain([0, d3.max(data, function(d) { return d.substitutability; })]);
  }
/*
g.append("g")
  .attr("class", "axis axis--x")
  .attr("transform", "translate(0," + height + ")")
  .call(d3.svg.axis().scale(x).orient("bottom"));
*/
g.append("g")
  .attr("class", "axis axis--y")
  .call(d3.svg.axis().scale(y).orient("left").ticks(10))
.append("text")
  .attr("transform", "rotate(-90)")
  .attr("y", 6)
  .attr("dy", "0.71em")
  .attr("text-anchor", "end")
  .text("Score");

  g.append("text")
        .attr("y", 425)
        .attr("x", 1100)
        .attr("dx", "-.8em")
        .attr("dy", ".25em")
        .attr("transform", "rotate(0)" )
        .attr("font-size", "12px")
        .attr("font-weight", "bold")
        .style("text-anchor", "end")
        .text("Bank ID");

g.append("path")
.datum(data)
.attr("class", "line")
.attr("d", line);


if(clickedId == 'dsib_score')
{
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.dsib_score); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'size'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.size); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'interconnect'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.interconnect); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'ifsa'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.ifsa); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'ifsl'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.ifsl); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'ds'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.ds); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'complexity'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.complexity); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'complexity_c'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.complexity_c); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);
}
else if(clickedId == 'complexity_cs'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.complexity_cs); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'substitutability'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.id_bank); })
  .attr("cy", function(d) { return y(d.substitutability); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

  }
  });
