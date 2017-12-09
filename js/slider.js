var slider1 = document.getElementById("carmin");
var slider = document.getElementById("carmax");
var slider2 = document.getElementById("nplrasiomin");
var slider3 = document.getElementById("nplrasiomax");
var slider4 = document.getElementById("assetsmin");
var slider5 = document.getElementById("assetsmax");
var slider6 = document.getElementById("kreditmin");
var slider7 = document.getElementById("kreditmax");
var slider8 = document.getElementById("nplnominalmin");
var slider9 = document.getElementById("nplnominalmax");
var slider10 = document.getElementById("depositmin");
var slider11 = document.getElementById("depositmax");
var slider12 = document.getElementById("ldrmin");
var slider13 = document.getElementById("ldrmax");

var cminvar = document.getElementById("cmin");
var cmaxvar = document.getElementById("cmax");
var nrminvar = document.getElementById("nrmin");
var nrmaxvar = document.getElementById("nrmax");
var aminvar = document.getElementById("amin");
var amaxvar = document.getElementById("amax");
var kminvar = document.getElementById("kmin");
var kmaxvar = document.getElementById("kmax");
var nnminvar = document.getElementById("nnmin");
var nnmaxvar = document.getElementById("nnmax");
var dminvar = document.getElementById("dmin");
var dmaxvar = document.getElementById("dmax");
var lminvar = document.getElementById("lmin");
var lmaxvar = document.getElementById("lmax");


cmaxvar.innerHTML = slider.value;
cminvar.innerHTML = slider1.value;
nrminvar.innerHTML = slider2.value;
nrmaxvar.innerHTML = slider3.value;
aminvar.innerHTML = slider4.value;
amaxvar.innerHTML = slider5.value;
kminvar.innerHTML = slider6.value;
kmaxvar.innerHTML = slider7.value;
nnminvar.innerHTML = slider8.value;
nnmaxvar.innerHTML = slider9.value;
dminvar.innerHTML = slider10.value;
dmaxvar.innerHTML = slider11.value;
lminvar.innerHTML = slider12.value;
lmaxvar.innerHTML = slider13.value;


slider1.oninput = function() {
  cminvar.innerHTML = this.value;
}
slider.oninput = function() {
  cmaxvar.innerHTML = this.value;
}
slider2.oninput = function() {
  nrminvar.innerHTML = this.value;
}
slider3.oninput = function() {
  nrmaxvar.innerHTML = this.value;
}
slider4.oninput = function() {
  aminvar.innerHTML = this.value;
}
slider5.oninput = function() {
  amaxvar.innerHTML = this.value;
}
slider6.oninput = function() {
  kminvar.innerHTML = this.value;
}
slider7.oninput = function() {
  kmaxvar.innerHTML = this.value;
}
slider8.oninput = function() {
  nnminvar.innerHTML = this.value;
}
slider9.oninput = function() {
  nnmaxvar.innerHTML = this.value;
}
slider10.oninput = function() {
  dminvar.innerHTML = this.value;
}
slider11.oninput = function() {
  dmaxvar.innerHTML = this.value;
}
slider12.oninput = function() {
  lmaxvar.innerHTML = this.value;
}
slider13.oninput = function() {
  lmaxvar.innerHTML = this.value;
}

function DoSubmit()
{
  document.myform.carmaxvar.value = document.getElementById("carmax").value;
  document.myform.carminvar.value = document.getElementById("carmin").value;
  document.myform.nplrasiominvar.value = document.getElementById("nplrasiomin").value;
  document.myform.nplrasiomaxvar.value = document.getElementById("nplrasiomax").value;
  document.myform.assetsminvar.value = document.getElementById("assetsmin").value;
  document.myform.assetsmaxvar.value = document.getElementById("assetsmax").value;
  document.myform.kreditminvar.value = document.getElementById("kreditmin").value;
  document.myform.kreditmaxvar.value = document.getElementById("kreditmax").value;
  document.myform.nplnominalminvar.value = document.getElementById("nplnominalmin").value;
  document.myform.nplnominalmaxvar.value = document.getElementById("nplnominalmax").value;
  document.myform.depositminvar.value = document.getElementById("depositmin").value;
  document.myform.depositmaxvar.value = document.getElementById("depositmax").value;
  document.myform.ldrminvar.value = document.getElementById("ldrmin").value;
  document.myform.ldrmaxvar.value = document.getElementById("ldrmax").value;

  return true;
}
