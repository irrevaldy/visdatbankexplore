var index = ['Size', 'Interconnectedness', 'Complexity', 'Jumlah Nasabah', 'Jumlah Cabang', 'Nasabah Kakap', 'Nasabah Biasa'];
var dataraw = [
  {
    'Name' : 'BCA',
    'Size' : 10,
    'Interconnectedness' : 20,
    'Complexity' : 30,
    'Jumlah Nasabah' : 10,
    'Jumlah Cabang' : 30,
    'Nasabah Kakap' : 50,
    'Nasabah Biasa' : 30
  },
  {
    'Name' : 'BNI',
    'Size' : 10,
    'Interconnectedness' : 25,
    'Complexity' : 10,
    'Jumlah Nasabah' : 10,
    'Jumlah Cabang' : 23,
    'Nasabah Kakap' : 30,
    'Nasabah Biasa' : 50
  },
  {
    'Name' : 'BRI',
    'Size' : 10,
    'Interconnectedness' : 20,
    'Complexity' : 15,
    'Jumlah Nasabah' : 10,
    'Jumlah Cabang' : 18,
    'Nasabah Kakap' : 20,
    'Nasabah Biasa' : 50
  },
  {
    'Name' : 'Mandiri',
    'Size' : 10,
    'Interconnectedness' : 5,
    'Complexity' : 34,
    'Jumlah Nasabah' : 10,
    'Jumlah Cabang' : 30,
    'Nasabah Kakap' : 30,
    'Nasabah Biasa' : 50
  },
  {
    'Name' : 'BTN',
    'Size' : 10,
    'Interconnectedness' : 23,
    'Complexity' : 20,
    'Jumlah Nasabah' : 10,
    'Jumlah Cabang' : 14,
    'Nasabah Kakap' : 20,
    'Nasabah Biasa' : 20
  },
  {
    'Name' : 'Danamon',
    'Size' : 10,
    'Interconnectedness' : 16,
    'Complexity' : 22,
    'Jumlah Nasabah' : 10,
    'Jumlah Cabang' : 12,
    'Nasabah Kakap' : 12,
    'Nasabah Biasa' : 13
  },
  {
    'Name' : 'Mega',
    'Size' : 10,
    'Interconnectedness' : 20,
    'Complexity' : 22,
    'Jumlah Nasabah' : 10,
    'Jumlah Cabang' : 12,
    'Nasabah Kakap' : 12,
    'Nasabah Biasa' : 13
  },
];

var width = window.screen.availWidth;
height = window.screen.availHeight - 200;

if (width > 1000) {
  width = 1000;
  // height = 550;
}

var petals = 3,
    halfRadius = 9;

var size = d3.scaleSqrt()
  .domain([0, 1])
  .range([0, halfRadius]);

var x = d3.scaleBand().rangeRound([0, width], .05);

var y = d3.scaleLinear().range([height, 0]);
//
// var xAxis = d3.axisBottom(x)
//     .tickFormat(function(d){ return d.x;});
//
// var yAxis = d3.axisLeft(y)
//     .ticks(10);

// var grid = d3.grid()
//   .size([width - halfRadius * 6, height - halfRadius * 6]);

var pie = d3.pie()
  .sort(null)
  .value(function(d) { return d.size; });

var svg = d3.select("#main").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + halfRadius * 3 + "," + halfRadius * 3 + ")");

var iterasidata = 0;

var data = d3.range(dataraw.length).map(function(da) {
  iterasidata += (halfRadius * 6);
  var totalsize = 0;
  return {
    id: dataraw[da]['Name'],
    petals: d3.range(petals).map(function(d) {
      totalsize += (dataraw[da][index[d]]/10) * 10;
      return { id:index[d], idFlower:da, size: dataraw[da][index[d]]/10}; }
    ),
    x: iterasidata,
    y: height - totalsize
  }
});

x.domain(data.map(function(d) { return d.id; }));
var max = d3.max(data, function(d) { return flowerSum(d); })
max += (max/10)
y.domain([0, max]);

// svg.append("g")
//     .attr("class", "axis axis--x")
//     .attr("transform", "translate(0," + height + ")")
//     .call(d3.axisBottom(x));
//

var yAxis = d3.axisLeft(y).ticks(10);
// Add the Y Axis
svg.append("g")
    .attr("class", "axis axis--y")
    .call(yAxis);

// var yaxis = svg.append("g")
//     .attr("class", "axis axis--y")
//     .call(d3.axisLeft(y).ticks(10))
//   .append("text")
//     .attr("transform", "rotate(-90)")
//     .attr("y", 6)
//     .attr("dy", "0.71em")
//     .attr("text-anchor", "end")
//     .text("Frequency");

var bar = svg.selectAll(".bar").data(data)
   .enter()
   .append("rect")
     .attr("class", "bar")
     .attr("x", function(d) { return d.x - 1; })
     .attr("y", function(d) { return (1 - (flowerSum(d)/max)) * height; })
     .attr("width",2)
     .attr("value", function(d){return d.id;})
     .attr("height", function(d) { return height - ((1 - (flowerSum(d)/max)) * height); });

// bar.append("text")
//    .attr("x", function(d) { return d.x - 4; })
//    .attr("y", function(d) { return (1 - (flowerSum(d)/max)) * height + 5; })
//    .attr("dy", ".35em")
//    .attr("fill", "red")
//    .text(function(d) { return d.id; });

var divTooltip = d3.select("body").append("div").attr("class", "toolTip");

bar.on("mousemove", function(d){
        divTooltip.style("left", d3.event.pageX+10+"px");
        divTooltip.style("top", d3.event.pageY-25+"px");
        divTooltip.style("display", "inline-block");
        var x = d3.event.pageX, y = d3.event.pageY
        var elements = document.querySelectorAll(':hover');
        l = elements.length
        l = l-1
        divTooltip.html("Bank "+(d.id));
    });

bar.on("mouseout", function(d){
        divTooltip.style("display", "none");
    });

data.sort(function(a, b) {
  return d3.descending(flowerSum(a), flowerSum(b));
});

// d3.grid = function() {
//   var mode = "equal",
//       layout = _distributeEqually,
//       x = d3.scaleOrdinal(),
//       y = d3.scaleOrdinal() }
// function transformData(nodes) {
//     i = 0;
//     n = 9;
//     while (++i < n) {
//       col = i % n;
//       row = Math.floor(i / n);
//       nodes[i].x = col;
//       nodes[i].y = 10;
//     }
//     return nodes;
// }

var flower = svg.selectAll('.flower')
  .data(data)
.enter().append('g')
  .attr("class", "flower")
  .attr("transform", function(d, i) {
      return "translate(" + d.x + "," + (1 - (flowerSum(d)/max)) * height + ")";
    });

var petal = flower.selectAll(".petal")
  .data(function(d) { return pie(d.petals); })
.enter().append("path")
  .attr("class", "petal")
  .attr("transform", function(d) { return r((d.startAngle + d.endAngle) / 2); })
  .attr("d", petalPath)
  .style("stroke", petalStroke)
  .style("fill", petalFill);


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

function flowerSum(d) {
  return d3.sum(d.petals, function(d) { return d.size; });
}

function r(angle) {
  return "rotate(" + (angle / Math.PI * 180) + ")";
}

function polarToCartesian(angle, radius) {
  return {
    x: Math.cos(angle) * radius,
    y: Math.sin(angle) * radius
  };
};

$.ajax({
    type: 'POST',
    url: '/main',
    dataType:'json',
    contentType: 'application/json',
    async: true,
    processData: false,
    data: JSON.stringify({filters: {lol: 'lol'}, params: {lel: 'lol'}}),
    success: function (response) {
      // var base64 = base64js.fromByteArray(response['data']);
      console.log(response);
    }, error: function(xhr){
        console.log("Error");
    },
});

var setted = false;
var binaryString = "";
var arrayBuffer = "";

function upload() {
  document.querySelector('#image-input').click();
}

document.querySelector('#image-input').addEventListener('change', function() {
    setted = true;
    var reader = new FileReader();
    reader.onload = function() {
      arrayBuffer = this.result;
      gen();
    }
    reader.readAsDataURL(this.files[0]);
}, false);

function gen() {
  if (!setted) {
    alert("butuh upload terlebih dahulu");
    return;
  }
  $.ajax({
      type: 'POST',
      url: '/upload',
      dataType:'json',
      contentType: 'application/json',
      async: true,
      processData: false,
      data: JSON.stringify({ data: arrayBuffer}),
      success: function (response) {
        // var base64 = base64js.fromByteArray(response['data']);
        alert(response);
      }, error: function(xhr){
          alert("Error");
      },
  });
}
