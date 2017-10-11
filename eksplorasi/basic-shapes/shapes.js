var dataArray = [2, 13, 15, 20, 24, 12, 17];
var dataFruit = ["Orange","Apple","Grape","Banana","Kiwi","Melon","Peach"];

var colorscal = d3.scaleSequential(d3.interpolateRainbow).domain([0,10]);
var newcolorscal = d3.scaleSequential(d3.interpolateRainbow).domain([1,3]);

var x = d3.scaleBand()
          .domain(dataFruit)
          .range([0,550])
          .paddingInner(0.109);
var xAxis = d3.axisBottom(x);

var svg = d3.select("body").append("svg").attr('height','100%').attr('width','100%');
svg.selectAll('rect')
  .data(dataArray)
  .enter().append('rect')
    .attr('height',function(d,i){return d*10;})
    .attr('width','70')
    .attr('fill',function(d,i){return colorscal(i);})
    .attr('x',function(d,i) {return 80*i;})
    .attr('y',function(d,i) {return 350-(d*10)});
svg.append('g')
    .attr('transform','translate(0,350)')
    .call(xAxis);
var fixedX=600;
svg.selectAll('circle.groupa')
  .data(dataArray)
  .enter().append('circle')
  .attr('class','groupa')
  .attr('fill',function(d,i){return newcolorscal(i);})
  .attr('cx',function(d,i) {fixedX+=(d*3)+(30); return fixedX;})
  .attr('cy','150')
  .attr('r',function(d, i) { return d*1.5;});
  var fixedX=1200;
svg.selectAll('ellipse')
  .data(dataArray)
  .enter().append('ellipse')
  .attr('cx',function(d,i) {fixedX+=(d*2)+(30); return fixedX;})
  .attr('cy','150')
  .attr('rx',function(d, i) { return d*1.5;})
  .attr('ry',70);
var fixedX=0;
svg.selectAll('line')
  .data(dataArray)
  .enter().append('line')
  .attr('x1',fixedX)
  //.attr('stroke','yellowgreen')
  //.style('stroke','orange')
  //.attr('stroke-width','3')
  .attr('y1',function(d,i){return 400+(i*20)})
  .attr('x2',function(d){return fixedX+(d*20)})
  .attr('y2',function(d,i){return 400+(i*20);});
var textArray = ['one','two','three','hello'];
var fixedX = 500;
svg.append('text').selectAll('tspan')
  .data(textArray)
  .enter().append('tspan')
  .attr('x',fixedX)
  .attr('y',function(d,i){return 400 + (50*i)})
  .attr('stroke','red')
  .attr('stroke-width','2')
  .attr('text-anchor','start')
  .attr('dominant-baseline','middle')
  .attr('font-size',50)
  .text(function(d) {return d;});
