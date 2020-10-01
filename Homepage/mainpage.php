<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>     
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Noto+Sans|Noto+Serif|Roboto+Slab|Ubuntu&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">    
    <!--chart js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> 
    <title>Homepage</title>
</head>

<body>
    <header>

        <!-- start of the nav bar -->
      <div class="navbar">
      <ul class="nav nav-tabs"> 
        
        <li class="nav-item">
          <a class="nav-link">
		  <?php echo 'Logged in as '. $_SESSION["id"]; ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="logout.php">Log Out</a>
        </li>
      </ul>
      </div>     
    </header><br>
    <!-- end of the navbar -->

    <!-- start the body section -->
  <section id="body">
    <!--start the gas meter-->
     <section>
     <div id="gas">
      <h3 style="text-align: center;">Gas Meter</h3>
      <div class="box11" id="section1">
      
      <div class="pointer" id="gaspointer"></div>
      <div class="measurements">
      <div class="gas number0">Cost(ksh)</div>
      <div class="gas number100">100</div>
      <div class="gas number200">200</div>
      <div class="gas number300">300</div>
      <div class="gas number400">400</div>
      <div class="gas number500">500</div>
      <div class="gas number600">600</div>
      <div class="gas number700">700</div>
      <div class="gas number800">800</div>
      <div class="gas number900">900</div>
      <div class="gas number1000">1000</div>
      <div class="gas number1100">1100</div>
      <div class="gas number1200">1200</div>

      <div class="box12">
      <table>
      <tr><td><label>Units(kWh)</label></td>
      <td><input type="text" id="gasunit" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57 || event.charCode ==44))"></td></tr>
      <tr><td><label> Days left: </label></td>
      <td><div id="days"></div></td></tr>
      </table>  
      <input type="submit"  value="submit" style="padding: 7px; margin-left: 60px; margin-top: 10px;" onclick="calculategasbill()">
      
      </div>
      </div>
      </div>
    
    
      </div>
      </div>
    
    <!--style gas meter section-->
    <style>
    #gas{
      
        width: 580px;
        height:600px;
        padding: 10px 10px 10px 10px;
        background:rgba(255, 255, 255, 0.5);
        border-style: hidden;
        box-shadow: 0 2px 2px rgba(0,0,0);
        margin-top: 10px;
        margin-left: 30px;
        border-radius: 4%;
        
        }
        .box11
        {
        position: relative;
        width: 500px;
        height:500px;
        padding: 20px 20px 20px 20px;
        background:rgba(255, 255, 255, 0.5);
        border: 1px solid black;;
        box-shadow: 0 2px 2px rgba(0,0,0);
        border-radius: 50%;
        margin-top: 25px;
        margin-left: 25px;
        }
        .box12{
          position: absolute;
          margin-top: 140px;
          width: 220px;
          height: 150px;           
          border-radius: 5%;
          margin-left: 120px;
          border: 1px solid black;
          box-shadow: 0 5px 5px rgba(0,0,0);
          padding: 5px;
          background-color: white;
        }
        .box12 table td {
          padding: 3px;
      
        }
        .box12 input[type="text"]{
          width: 100px;
        }
        .box11 .gas{
          --rotation: 0;
          position: absolute;
          width: 90%;
          height: 90%;
          text-align: center;
          transform:rotate(var(--rotation));
          
        }
        .box11 .number0{--rotation: 0deg;}
        .box11 .number100{--rotation: 28deg;}
        .box11 .number200{--rotation: 55deg;}
        .box11 .number300{--rotation: 83deg;}
        .box11 .number400{--rotation: 111deg;}
        .box11 .number500{--rotation: 138deg;}
        .box11 .number600{--rotation: 166deg;}
        .box11 .number700{--rotation: 194deg;}
        .box11 .number800{--rotation: 222deg;}
        .box11 .number900{--rotation: 249deg;}
        .box11 .number1000{--rotation: 277deg;}
        .box11 .number1100{--rotation: 304deg;}        
        .box11 .number1200{--rotation: 332deg;}
            
        .box11 .pointer{
          position: absolute;
          transform-origin: bottom;
          transform: translateX(-7px);
          bottom: 50%;
          left: 50%;
          width: 4px;
          height: 40%;
          background-color: black;
        }

    </style>
    <!--jscript-->
    <script>
    function calculategasbill(){
      var pointer=document.getElementById("gaspointer");
      var units=document.getElementById("gasunit").value;
      

      var daysno=Math.round(units*30/16);

      var cost= units*67;

      let pointerposition = (cost*360)/1200;
      pointer.style.transform =`rotate(${pointerposition}deg)`;
      document.getElementById('days').innerHTML=daysno;

    };

    </script>
    </section>

   <!--end of the gas meter-->


   <!--start of the water meter-->   
    <section>
    
    <div class="box21" id="section2">
       <h2 style="text-align: center;">Water Meter</h2> 
      <div>
      <label>Cost</label>
      <input type="text" id="waterCost" style="width: 70px" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57)|| event.charCode == 46)">
      <label style="padding-right: 3px; padding-left: 5px;">Units:</label>
      <span id="units" ></span>
      <p style="margin-top: 20px;">Units dial(in 1000litres)</p>
      <table> <tr><td>
      <div class="unitsdial">
        <div class="pointer" id="pointerhand"></div>
        <div class="water number0">0</div>
        <div class="water number1">1</div>
        <div class="water number2">2</div>
        <div class="water number3">3</div>
        <div class="water number4">4</div>
        <div class="water number5">5</div>
        <div class="water number6">6</div>
        <div class="water number7">7</div>
        <div class="water number8">8</div>
        <div class="water number9">9</div>
      </div></td>
      <td><input type="submit" value="submit" class="watersubmit" onclick="calculateWaterBill()"></td></tr></table>
    </div>
   </div>
  

    <!--style water meter section-->
    <style>
    .box21
    {
    position: absolute;
    margin-top: -300px; 
    margin-left: 700px;
    width: 300px;
    padding: 20px 20px 5px 20px;
    background:rgba(255, 255, 255, 0.5);
    box-shadow: 0 3px 3px rgba(0,0,0);
    border-radius: 10px;
    border: 1px solid black;
    }
    .box21 table td {
          padding: 3px;
      
        }
    .unitsdial{
      height: 100px;
      width: 100px;
      border: 2px solid black;
      border-radius: 50%;
      position: relative;
    }
    .unitsdial .water{
          --rotation: 0;
          position: absolute;
          width: 100%;
          height: 100%;
          text-align: center;
          transform:rotate(var(--rotation));
          font-size:10px;
        }
        .unitsdial .number0{--rotation: 0deg;}
        .unitsdial .number1{--rotation: 36deg;}
        .unitsdial .number2{--rotation: 72deg;}
        .unitsdial .number3{--rotation: 108deg;}
        .unitsdial .number4{--rotation: 144deg;}
        .unitsdial .number5{--rotation: 180deg;}
        .unitsdial .number6{--rotation: 216deg;}
        .unitsdial .number7{--rotation: 252deg;}
        .unitsdial .number8{--rotation: 288deg;}
        .unitsdial .number9{--rotation: 324deg;}

        .box21 .pointer{
          position: absolute;
          bottom: 50%;
          left: 50%;
          transform-origin: bottom;
          width: 1px;
          height: 30%;
          background-color: black;
        }
        .watersubmit{
          margin-left: 10px;
        }
    </style>

    <!--jscript-->
    <script>
    function calculateWaterBill(){
      var pointer=document.getElementById("pointerhand"); 
      var cost=document.getElementById("waterCost").value;      
      var total= cost/60;
     
      var pointersposition= total*10000/360;
      
      
      pointer.style.transform =`rotate(${pointersposition}deg)`;

       document.getElementById('units').innerHTML=Math.round((total)* 100) / 100;
    };
    </script>
</section>
   <!--end of the water meter-->


   <!--start of the  electricity meter-->
    <section>
    <div class="box31">
        <h3 style="text-align: center;"> Electricity calculator</h3>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#postpaid" role="tab" aria-controls="home" aria-selected="true">Postpaid</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#prepaid" role="tab" aria-controls="profile" aria-selected="false">Prepaid</a>
          </li>
        </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="postpaid" role="tabpanel" aria-labelledby="home-tab">
        <table>
          <tr>
            <td><label>Month</label></td>
            <td><label> Consumption(kWh)</label></td>
            <td> <label>Cost(ksh)</label></td>
          </tr>
          <tr>
            <td>
              <select name="month" style="font-family: 'Noto Sans', serif;">
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september" selected>September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
              </select>
            </td>
            <td> <input type="text" id="postConsum" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46)" style="width: 100px;" required></td>
            <td><div id="postCost" style="width: 100px; border:1px solid black; height: 30px;"></div> </td>
          </tr>
          <tr><td><input type="submit" value="Calculate cost" onclick="calculatePostpaid()"></td></tr>
        </table>         
         
         
        </div>
        <div class="tab-pane fade" id="prepaid" role="tabpanel" aria-labelledby="profile-tab">
        <table>
          <tr>
            <td><label>Month</label></td>
            <td> <label>Cost(Ksh)</label></td>
            <td><label> Consumption(kWh)</label></td>
            
          </tr>
          <tr>
            <td>
              <select name="month">
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september" selected>September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
              </select>
            </td>
            <td> <input type="text" id="preCost"  style="width: 100px;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57)|| event.charCode == 46)"></td>
            <td><div id="preConsumption" style="width: 100px; border:1px solid black; height: 30px;"></div> </td>
          </tr>
          <tr><td><input type="submit" style="width: 100%;" value="Find consumption" onclick="calculatePrepaid()"></td></tr>
        </table> 
        </div>
      </div>
    </div>
    <!--style electricity section-->
    <style>
      .box31{
        position: absolute;
        margin-top: -570px; 
        margin-left: 680px;
        width: 600px;
        padding: 20px 20px 5px 20px;
        background:rgba(255, 255, 255, 0.5);
        box-sizing: border-box;
        box-shadow: 0 5px 5px rgba(0,0,0);
        border-radius: 10px;
        border-style: hidden;
        }
        .box31 table, th, td {
          padding: 5px;
          padding-left: 20px; 
        }
        .box31 label{
          font-family: 'Noto Sans', serif;
          padding: 1px;
        }
        .box31 select{
          font-family: 'Noto Sans', serif;  
          font-size: 16px; 
          box-sizing: content-box; 
          padding: 5px 0;
          margin-left: 3px;
        }
        input[type="submit"] 
        {
          background: transparent;
          border: 1px solid black;          
          color: black;
          background-color: #a6b6f2;
          font-size: 18px;
          padding:10px 20px;
          cursor: pointer;
          border-radius: 3px;    
          text-align: center;
        }
        input[type="submit"]:hover{
          background: #4d6de6;
        }
    </style>

      <!--javascript for the claculation-->
    <script>
    //post paid
        function calculatePostpaid(){
          var consumption=document.getElementById("postConsum").value;
          var total= Math.round((consumption*23.480)* 100) / 100;

          document.getElementById('postCost').innerHTML=total;
        };

    //calculate prepaid
        function calculatePrepaid(){
          var cost=document.getElementById("preCost").value;
          var total= Math.round((cost/23.480)* 100) / 100;

          document.getElementById('preConsumption').innerHTML=total;
        };
    </script>
    </section>
   <!--end of the  electricity meter-->
        
   <!--start of the filter section--> 
    <section>
<div id="filter">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="utility-tab" data-toggle="tab" href="#utility" role="tab" aria-controls="utility" aria-selected="true">Utilities</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="electric-tab" data-toggle="tab" href="#electric" role="tab" aria-controls="electric" aria-selected="false">Electricity</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="gas-tab" data-toggle="tab" href="#gas" role="tab" aria-controls="gas" aria-selected="false">Gas</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="false">Water</a>
  </li>
   
   
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="utility" role="tabpanel" aria-labelledby="utility-tab">
  <table id="utilities">
        <tr ><th colspan="3"> <h3>Utilities</h3> </th></tr>
        <tr><th> Utility</th>
        <th>Cost per unit</th>
        <th>Monthly consumption</th></tr>
        <tr><td>water</td>
        <td>53 ksh</td>
        <td>13 units</td></tr>
        <tr><td>Gas</td>
        <td>67ksh</td>
        <td>16 kWh</td></tr>
        <tr><td>Electricty</td>
        <td>60 ksh</td>
        <td>20 kWh</td>
        </tr>
        </table>
  </div>

  <!-- electricity -->
  <div class="tab-pane fade" id="electric" role="tabpanel" aria-labelledby="electric-tab">
  <?php
    $con=mysqli_connect('localhost', 'root', '','Utilities _checker');

    $sql1 ="SELECT  tmonth, cost, consumption  FROM `electricity`";

    $result1=mysqli_query($con,$sql1);
    

    echo "<table  border='1' id='utilities'>";
        echo "<tr>";
        echo "<th>" . 'Month' . "</th>";
        echo "<th>" . 'Consumption' . "</th>";
        echo "<th>" . 'Cost' . "</th>";
      echo "</tr>";
          
     
  while($row1=mysqli_fetch_assoc($result1)){
        echo "<tr>";
        echo "<td>" .$row1[ 'tmonth'] . "</td>";
        echo "<td>" . $row1['consumption'] . "</td>";
        echo "<td>" . $row1['cost'] . "</td>";
    	echo "</tr>";
  }
    echo "</table>";

       ?>   
  </div>

  <!-- gas -->
  <div class="tab-pane fade" id="gas" role="tabpanel" aria-labelledby="gas-tab">
  <?php
    $con=mysqli_connect('localhost', 'root', '','Utilities _checker');

    $sql2 ="SELECT  tmonth, cost, consumption  FROM `gas`";

    $result2=mysqli_query($con,$sql2);
    

    echo "<table  border='1' id='utilities'>";
        echo "<tr>";
        echo "<th>" . 'Month' . "</th>";
        echo "<th>" . 'Consumption' . "</th>";
        echo "<th>" . 'Cost' . "</th>";
      echo "</tr>";
          
     
  while($row2=mysqli_fetch_assoc($result2)){
        echo "<tr>";
        echo "<td>" .$row2[ 'tmonth'] . "</td>";
        echo "<td>" . $row2['consumption'] . "</td>";
        echo "<td>" . $row2['cost'] . "</td>";
    	echo "</tr>";
  }
    echo "</table>";    
   ?>
  </div>

  <!-- water -->
  <div class="tab-pane fade" id="water" role="tabpanel" aria-labelledby="water-tab">
  <?php
    $con=mysqli_connect('localhost', 'root', '','Utilities _checker');

    $sql3 ="SELECT  tmonth, cost, consumption  FROM `water`";

    $result3=mysqli_query($con,$sql3);
    

    echo "<table  border='1' id='utilities'>";
        echo "<tr>";
        echo "<th>" . 'Month' . "</th>";
        echo "<th>" . 'Consumption' . "</th>";
        echo "<th>" . 'Cost' . "</th>";
      echo "</tr>";
          
     
  while($row3=mysqli_fetch_assoc($result3)){
        echo "<tr>";
        echo "<td>" .$row3[ 'tmonth'] . "</td>";
        echo "<td>" . $row3['consumption'] . "</td>";
        echo "<td>" . $row3['cost'] . "</td>";
    	echo "</tr>";
  }
    echo "</table>";
    
   ?>

  </div>
</div>

     
        
</div>
        <style>
        #filter{
          width: 70%;
          margin-left: 9%;
          margin-top:4%;
          margin-bottom: 6%;
        }
        #utilities{
          border: 1px solid black;
          margin-top: 5%;
          margin-left:12%;
          margin-bottom: 30px;
        }
        #utilities h3{
          text-align: center;
        }
        #utilities th{
         
          border-style: double;
        }
        #utilities td{
          
          border-style: double;
        }
        </style>

     </section>
      
   <!--end of the filter section-->
    


  </section>
   <!-- end the body section  -->

    <!-- start of the footer section -->
    <section>
      <footer  style="background: #2d3246;">
              <div  style="padding: 25px;">            
                 </div>
              
      </footer>
    </section>
    <!--end of the footer section -->
</body>
</html>