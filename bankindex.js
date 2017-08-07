d3.csv("bankindex.csv")
    .row(function(d) { return { bankid:Number(d.bankid),bankindex:Number(d.bankindex)};})
    .get(function(error,data){
        var height = 400;
        var width = 1200;

        var maxbankid = d3.max(data,function(d){return d.bankid});
        var minbankid = d3.min(data,function(d){return d.bankid});
        var maxbankindex = d3.max(data,function(d){return d.bankindex});

        var y = d3.scaleLinear()
                  .domain([0,maxbankindex])
                  .range([height,0]);
        var x = d3.scaleLinear()
                  .domain([minbankid,maxbankid])
                  .range([0,width]);
        var yAxis = d3.axisLeft(y);
        var xAxis = d3.axisBottom(x);

        var svg = d3.select('body').append('svg')
                    .attr('height','50%')
                    .attr('width','50%');

        var chartGroup = svg.append('g')
                            .attr('transform','translate(50,50)');

        var line = d3.line()
                    .x(function(d) { return x(d.bankid);})
                    .y(function(d) { return y(d.bankindex);});

        chartGroup.append('path').attr('d',line(data));
        chartGroup.append('g').attr('class','x axis').attr('transform','translate(0,'+height+')').call(xAxis);
        chartGroup.append('g').attr('class','y axis').call(yAxis);
      });
