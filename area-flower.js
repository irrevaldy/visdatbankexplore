var dataArray = [14,35,56,67,99,122,150,160,233,300,322,360];
var dataMonths = [1,2,3,4,5,6,7,8,9,10,11,12];

var height = 600;
var width = 500;

var area = d3.svg.area()
      .x(function(d,i) {return i*50;})
      .y0(height)
      .y1(function(d){return height-d; });

var svg = d3.select('body').append('svg').attr('height','1000px').attr('width','1000px');
var y = d3.scale.linear().domain([0,360]).range([height,0]);
var x = d3.scale.linear().domain([0,12]).range([0,width])
var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var chartGroup = svg.append('g')
                    .attr('transform','translate(50,0)');
chartGroup.append('g').attr('class','x axis').attr('transform','translate(0,'+height+')').call(xAxis);
chartGroup.append('g').attr('class','y axis').call(yAxis);


svg.append('path')
    .attr('fill','none')
    .attr('stroke','black')
    .attr('stroke-width','1')
    .attr('d',area(dataArray));

svg.selectAll('circle')
    .data(dataArray)
    .enter().append('circle')
            .attr('cx',function(d,i) {return i*100;})
            .attr('cy',function(d){return height-d; })
            .attr('r','2');

svg.selectAll('flower')
    .data(dataArray)
    .enter().append('flower')
            .attr('cx',function(d,i) {return i*100;})
            .attr('cy',function(d){return height-d; })
            .attr('r','2');

var width = 960,
    height = 500,
    petals = 12,
    halfRadius = 15;

var size = d3.scale.sqrt()
  .domain([0, 1])
  .range([0, halfRadius]);

var grid = d3.layout.grid()
  .size([width - halfRadius * 6, height - halfRadius * 6]);

var pie = d3.layout.pie()
  .sort(null)
  .value(function(d) { return d.size; });

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + halfRadius * 3 + "," + halfRadius * 3 + ")");

var data = d3.range(1).map(function(d) {
  return {
    id: d,
    petals: d3.range(petals).map(function(d) { return {size: 0.5}; })
  }
});

var flower = svg.selectAll('flower')
  .data(grid(data))
.enter().append('g')
  .attr("class", "flower")
  .attr("transform", function(d, i) {
      return "translate(" + d.x + "," + d.y + ")";
    });

var petal = flower.selectAll(".petal")
  .data(function(d) { return pie(d.petals); })
.enter().append("path")
  .attr("class", "petal")
  .attr("transform", function(d) { return r((d.startAngle + d.endAngle) / 2); })
  .attr("d", petalPath)
  .style("stroke", petalStroke)
  .style("fill", petalFill);

//setInterval(update, 4000)

/*function update() {
  data.forEach(function(flower) {
    flower.petals.forEach(function(d) { d.size = Math.random(); });
  })
  data.sort(function(a, b) {
    return d3.descending(flowerSum(a), flowerSum(b));
  });

  flower.data(grid(data), function(d) { return d.id; }).transition().delay(function(d, i) { return 1000 + i * 20; }).duration(1000)
    .attr("transform", function(d, i) {
      return "translate(" + d.x + "," + d.y + ")";
    });

  petal.data(function(d) { return pie(d.petals); }).transition().duration(1000)
    .attr("transform", function(d) { return r((d.startAngle + d.endAngle) / 2); })
    .attr("d", petalPath);
}
*/
function petalPath(d) {
  var angle = (d.endAngle - d.startAngle) / 2,
      s = polarToCartesian(-angle, halfRadius),
      e = polarToCartesian(angle, halfRadius),
      r = size(d.data.size),
      m = {x: halfRadius + r, y: 0},
      c1 = {x: halfRadius + r / 2, y: s.y},
      c2 = {x: halfRadius + r / 2, y: e.y};
  return "M0,0L" + s.x + "," + s.y + "Q" + c1.x + "," + c1.y + " " + m.x + "," + m.y + "L" + m.x + "," + m.y + "Q" + c2.x + "," + c2.y + " " + e.x + "," + e.y + "Z";
};

function petalFill(d, i) {
  return d3.hcl(i / petals * 360, 60, 70);
};

function petalStroke(d, i) {
  return d3.hcl(i / petals * 360, 60, 40);
};
/*
function flowerSum(d) {
  return d3.sum(d.petals, function(d) { return d.size; });
}
*/
function r(angle) {
  return "rotate(" + (angle / Math.PI * 180) + ")";
}

function polarToCartesian(angle, radius) {
  return {
    x: Math.cos(angle) * radius,
    y: Math.sin(angle) * radius
  };
};
