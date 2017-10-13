var weight = {
  'Size' : {'value': 1 , 'children': [3,4] },
  'Interconnectedness' : {'value': 1 , 'children': [] },
  'Complexity' : {'value': 1, 'children': [] },
  'Jumlah Nasabah' : {'value': 1 , 'children': [5,6] },
  'Jumlah Cabang' : {'value': 1, 'children': [] },
  'Nasabah Kakap' : {'value': 1, 'children': [] },
  'Nasabah Biasa' : {'value': 1, 'children': [] }
};

function outputUpdate(vol, id) {
  document.querySelector('#li-'+id+' output').value = vol;
  id = id.split("-").join(" ");
  weight[id]['value'] = vol;

  data.forEach(function(flower) {
    var totalsize2 = 0;
    flower.petals.forEach(function(d) {
      totalsize2 += weight[d.id]['value'] * calculateTotal(d, d.idFlower, d.id) * 10;
      d.size = weight[d.id]['value'] * calculateTotal(d, d.idFlower, d.id);
    });
    flower.y = height - totalsize2;
  })

  data.sort(function(a, b) {
    return d3.descending(flowerSum(a), flowerSum(b));
  });

  var max1 = d3.max(data, function(d) { return flowerSum(d); })
  max1 += (max1/10)
  y.domain([0, max1]);


  svg.select(".y.axis") // change the x axis
            .call(yAxis);

  flower.data(data, function(d) { return d.id; }).transition().delay(function(d, i) { return 1000 + i * 20; }).duration(1000)
    .attr("transform", function(d, i) {
      return "translate(" + d.x + "," + (1 - (flowerSum(d)/max1)) * height  + ")";
    });

  bar.data(data, function(d) { return d.id; }).transition().delay(function(d, i) { return 1000 + i * 20; }).duration(1000)
    .attr("x", function(d) { return d.x - 1; })
    .attr("y", function(d) { return (1 - (flowerSum(d)/max1)) * height; })
    .attr("width",2)
    .attr("height", function(d) { return height - ((1 - (flowerSum(d)/max1)) * height); });

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

  petal.data(function(d) { return pie(d.petals); }).transition().duration(1000)
    .attr("transform", function(d) { return r((d.startAngle + d.endAngle) / 2); })
    .attr("d", petalPath);

}

function calculateTotal(d, idFlower, id) {
  if (weight[id]['children'].length == 0) {
    return weight[id]['value'] * dataraw[d.idFlower][d.id]/10;
  } else {
    var sum = 0;
    for (var variable in weight[id]['children']) {
      sum += calculateTotal(d, idFlower, index[weight[id]['children'][variable]])
    }
    return weight[id]['value'] *  sum / weight[id]['children'].length;
  }
}

var dataSlider =[
    {
      "name": "Size",
      "value": 1,
      "children": [
        {
          "name": "Jumlah Nasabah",
          "value": 1,
          "children": [
            {
              "name": "Nasabah Kakap",
              "value": 1,
              "children": [

              ]
            },
            {
                "name": "Nasabah Biasa",
                "value": 1,
                "children": [

                ]
              },
          ]
        },
        {
          "name": "Jumlah Cabang",
          "value": 1,
          "children": [

          ]
        },
      ]
    },
    {
      "name": "Interconnectedness",
      "value": 1,
      "children": []
    },
    {
      "name":"Complexity",
      "value":1,
      "children":[]
    },
  ];
  function makeTree(_data, val) {
    _data.forEach(function(obj) {
      if (obj["children"].length == 0) {
        makeDiv(obj["name"], val);
      } else {
        makeDiv(obj["name"], val);
        makeTree(obj["children"], val+10);
      }
    });

    // for (var obj in _data) {
    // }
  };
  function nameAble(name) {
    return name.split(" ").join("-");
  }

  function makeDiv(name, val) {
      var node = document.createElement("li");
      node.className = "fa fa-fw param"
      // node.setAttribute("class", "param");
      node.id = "li-"+nameAble(name);
      var label = document.createElement("label");
      label.setAttribute("style", ("margin-left: "+val+";"));
      label.setAttribute("for", nameAble(name));
      label.innerHTML = name
      node.appendChild(label);
      node.appendChild(document.createElement("br"));
      var input = document.createElement("input");
      input.id = nameAble(name);
      input.setAttribute("style", ("margin-left: 50;"));
      input.setAttribute("type", "range");
      input.setAttribute("min", "1");
      input.setAttribute("max", "5");
      input.setAttribute("value", "1");
      input.setAttribute("step", "1");
      input.setAttribute("oninput", "outputUpdate(value,id)");
      node.appendChild(input);
      var output = document.createElement("output");
      output.setAttribute("for", nameAble(name));
      output.setAttribute("style", ("color: #fff;"));
      output.innerHTML = 1;
      node.appendChild(output);
      document.getElementById("parameter").appendChild(node);
  };
  makeTree(dataSlider, 0);
