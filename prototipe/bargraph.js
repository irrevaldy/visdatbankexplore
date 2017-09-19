<!--bargraph-->

//catch the nugget
var clickedId = 'dsibscore';
$(".only_this_class").click(function() {

      clickedId= $(this).attr("id");

   });

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

d3.json("php/data2.php?id=" + clickedId, function(error,data) {

  if(error) console.log("Error: data not loaded!");
  incomingdata = data;

  /*----------------------------------------------------------------------------
  Convert data if necessary. We want to make sure our gdp vaulues are
  represented as integers rather than strings. Use "+" before the variable to
  convert a string represenation of a number to an actual number. Sometimes
  the data will be in number format, but when in doubt use "+" to avoid issues.
  ----------------------------------------------------------------------------*/
  data.forEach(function(d) {
    d.idbank = d.idbank;
    d.dsibscore = +d.dsibscore;       // try removing the + and see what the console prints
    console.log(d.dsibscore);   // use console.log to confirm
  });

  // sort the gdp values
  /*function sort()
  {
    if (this.checked)
      data.sort(function(a,b) {
        return b.dsibscore - a.dsibscore;
      });
    else
      //do nothin
  }*/

  // Specify the domains of the x and y scales
  xScale.domain(data.map(function(d) { return d.idbank; }) );
  yScale.domain([0, d3.max(data, function(d) { return d.dsibscore; } ) ]);

  // Draw xAxis and position the label
  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
      .selectAll("text")
      .attr("dx", "-.8em")
      .attr("dy", ".25em")
      .attr("transform", "rotate(-60)" )
      .style("text-anchor", "end")
      .attr("font-size", "10px");


  // Draw yAxis and postion the label
  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
      .append("text")
      .attr("transform", "rotate(-90)")
      .attr("x", -height/2)
      .attr("dy", "-3em")
      .style("text-anchor", "middle")
      .text("");

  svg.selectAll(".bar")
    .data(data)
  .enter().append("rect")
    .attr("class", "bar")
    .attr("x", function(d) { return xScale(d.idbank); })
    .attr("width", xScale.rangeBand())
    .attr("y", function(d) { return yScale(d.dsibscore); })
    .attr("height", function(d) { return height - yScale(d.dsibscore); });

  d3.select("input").on("change", change);

  var sortTimeout = setTimeout(function() {
  d3.select("input").property("checked", true).each(change);
  }, 2000);

  function change() {
    clearTimeout(sortTimeout);

  // Copy-on-write since tweens are evaluated after a delay.
  var x0 = xScale.domain(data.sort(this.checked
      ? function(a, b) { return b.dsibscore - a.dsibscore; }
      : function(a, b) { return d3.ascending(a.idbank, b.idbank); })
      .map(function(d) { return d.idbank; }))
      .copy();

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


/*
  svg.selectAll('rect')
    .data(data)
    .enter()
    .append('rect')
    .attr("height", 0)
    .attr("y", height)
    .transition().duration(3000)
    .delay( function(d,i) { return i * 200; })
    // attributes can be also combined under one .attr
    .attr({
      "x": function(d) { return xScale(d.idbank); },
      "y": function(d) { return yScale(d.dsibscore); },
      "width": xScale.rangeBand(),
      "height": function(d) { return  height - yScale(d.dsibscore); }
    })
    .style("fill", function(d,i) { return 'rgb(20, 20, ' + ((i * 30) + 100) + ')'});


    svg.selectAll('text')
        .data(data)
        .enter()
        .append('text')



        .text(function(d){
            return d.gdp;
        })
        .attr({
            "x": function(d){ return xScale(d.idbank) +  xScale.rangeBand()/2; },
            "y": function(d){ return yScale(d.dsibscore)+ 12; },
            "font-family": 'sans-serif',
            "font-size": '13px',
            "font-weight": 'bold',
            "fill": 'white',
            "text-anchor": 'middle'
        });

*/
});
