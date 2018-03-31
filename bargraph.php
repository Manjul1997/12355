







<style>
  
   
 body {
  font: 13px/1.3 'Lucida Grande',sans-serif;
  color: #666;
}

.chart {
  display: table;
  table-layout: fixed;
  width: 30%;
  max-width: 500px;
  height: 200px;
  margin: 0 auto;
  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.1) 2%, rgba(0, 0, 0, 0) 2%);
  background-size: 100% 50px;
  background-position: left top;
}
.chart li {
  position: relative;
  display: table-cell;
  vertical-align: bottom;
  height: 200px;
}
.chart span {
  margin: 0 1em;
  display: block;
  background: rgba(209, 236, 250, 0.75);
  animation: draw 1s ease-in-out;
}
.chart span:before {
  position: absolute;
  left: 0;
  right: 0;
  top: 100%;
  padding: 5px 1em 0;
  display: block;
  text-align: center;
  content: attr(title);
  word-wrap: break-word;
}

@keyframes draw {
  0% {
    height: 0;
  }
}



ul{


font-size:9px;	
}

















</style>

<ul class="chart">
  <li>
    <span style="height:78%" title=" DISTRICT"></span>
  </li>
  <li>
    <span style="height:70%" title="TEHSIL"></span>
  </li>
  <li>
    <span style="height:50%" title="  CITY "></span>
  </li>
 <li>
    <span style="height:39%" title="VILLAGE"></span>
  </li>
</ul>    












