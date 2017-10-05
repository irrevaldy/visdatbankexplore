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
    if(clickedId == 'dsibscore')
    {
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.dsibscore;
    }
    else if(clickedId == 'sizescore'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.sizescore;
    }
    else if(clickedId == 'interconnectedness'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.interconnectedness;
    }
    else if(clickedId == 'ifsascore'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.ifsascore;
    }
    else if(clickedId == 'ifsl'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.ifsl;
    }
    else if(clickedId == 'debts'){
        return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.debts;
    }
    else if(clickedId == 'complexitys'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.complexitys;
    }
    else if(clickedId == 'complexitycs'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.complexitycs;
    }
    else if(clickedId == 'countryss'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.countryss;
    }
    else if(clickedId == 'substitutabilityscore'){
      return "Bank ID: " + d.idbank + "<br>" + clickedId + ": " + d.substitutabilityscore;
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
d3.json("php/data2.php?id=" + clickedId + "&kelkepemilikan=" + selected_kelkepemilikan  + "&kelbuku=" + selected_kelbuku + "&dsibflag=" +
 selected_dsibflag + "&month=" + selected_month + "&year=" + selected_year,
function(error,data)
{
if(error) console.log("Error: data not loaded!");

data.forEach(function(d) {
d.idbank = d.idbank;
if(clickedId == 'dsibscore')
{
  d.dsibscore = +d.dsibscore;       // try removing the + and see what the console prints
  console.log(d.dsibscore);   // use console.log to confirm
}
else if(clickedId == 'sizescore'){
  d.sizescore = +d.sizescore;       // try removing the + and see what the console prints
  console.log(d.sizescore);   // use console.log to confirm
}
else if(clickedId == 'interconnectedness'){
  d.interconnectedness = +d.interconnectedness;       // try removing the + and see what the console prints
  console.log(d.interconnectedness);   // use console.log to confirm
}
else if(clickedId == 'ifsascore'){
  d.ifsascore = +d.ifsascore;       // try removing the + and see what the console prints
  console.log(d.ifsascore);   // use console.log to confirm
}
else if(clickedId == 'ifsl'){
  d.ifsl = +d.ifsl;       // try removing the + and see what the console prints
  console.log(d.ifsl);   // use console.log to confirm
}
else if(clickedId == 'debts'){
  d.debts = +d.debts;       // try removing the + and see what the console prints
  console.log(d.debts);   // use console.log to confirm
}
else if(clickedId == 'complexitys'){
  d.complexitys = +d.complexitys;       // try removing the + and see what the console prints
  console.log(d.complexitys);   // use console.log to confirm
}
else if(clickedId == 'complexitycs'){
  d.complexitycs = +d.complexitycs;       // try removing the + and see what the console prints
  console.log(d.complexitycs);   // use console.log to confirm
}
else if(clickedId == 'countryss'){
  d.countryss = +d.countryss;       // try removing the + and see what the console prints
  console.log(d.countryss);   // use console.log to confirm
}
else if(clickedId == 'substitutabilityscore'){
  d.substitutabilityscore = +d.substitutabilityscore;       // try removing the + and see what the console prints
  console.log(d.substitutabilityscore);   // use console.log to confirm
}
});

if(clickedId == 'dsibscore')
{
    var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.dsibscore); })
}
else if(clickedId == 'sizescore'){
  var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.sizescore); })
}
else if(clickedId == 'interconnectedness'){
  var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.interconnectedness); })
}
else if(clickedId == 'ifsascore'){
  var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.ifsascore); })
}
else if(clickedId == 'ifsl'){
    var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.ifsl); })
}
else if(clickedId == 'debts'){
  var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.debts); })
}
else if(clickedId == 'complexitys'){
  var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.complexitys); })
}
else if(clickedId == 'complexitycs'){
    var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.complexitycs); })
  }
else if(clickedId == 'countryss'){
  var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.countryss); })
}
else if(clickedId == 'substitutabilityscore'){
  var line = d3.svg.line().x(function(d) { return x(d.idbank); }).y(function(d) { return y(d.substitutabilityscore); })
  }

x.domain(data.map(function(d) { return d.idbank; }));

if(clickedId == 'dsibscore')
{
    y.domain([0, d3.max(data, function(d) { return d.dsibscore; })]);
}
else if(clickedId == 'sizescore'){
  y.domain([0, d3.max(data, function(d) { return d.sizescore; })]);
}
else if(clickedId == 'interconnectedness'){
  y.domain([0, d3.max(data, function(d) { return d.interconnectedness; })]);
}
else if(clickedId == 'ifsascore'){
  y.domain([0, d3.max(data, function(d) { return d.ifsascore; })]);
}
else if(clickedId == 'ifsl'){
    y.domain([0, d3.max(data, function(d) { return d.ifsl; })]);
}
else if(clickedId == 'debts'){
  y.domain([0, d3.max(data, function(d) { return d.debts; })]);
}
else if(clickedId == 'complexitys'){
y.domain([0, d3.max(data, function(d) { return d.complexitys; })]);
}
else if(clickedId == 'complexitycs'){
  y.domain([0, d3.max(data, function(d) { return d.complexitycs; })]);
}
else if(clickedId == 'countryss'){
y.domain([0, d3.max(data, function(d) { return d.countryss; })]);
}
else if(clickedId == 'substitutabilityscore'){
y.domain([0, d3.max(data, function(d) { return d.substitutabilityscore; })]);
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


if(clickedId == 'dsibscore')
{
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.dsibscore); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'sizescore'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.sizescore); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'interconnectedness'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.interconnectedness); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'ifsascore'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.ifsascore); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'ifsl'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.ifsl); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'debts'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.debts); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'complexitys'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.complexitys); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'complexitycs'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.complexitycs); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);
}
else if(clickedId == 'countryss'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.countryss); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

}
else if(clickedId == 'substitutabilityscore'){
  g.selectAll("circle")
  .data(data)
  .enter().append("circle")
  .attr("class", "circle")
  .attr("cx", function(d) { return x(d.idbank); })
  .attr("cy", function(d) { return y(d.substitutabilityscore); })
  .attr("r", 4)
  .on('mouseover', tip.show)
  .on('mouseout', tip.hide);

  }
  });
