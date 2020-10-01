

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
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#modalLoginForm">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#modalRegisterForm">Sign up</a>
        </li>
      </ul>
      </div>     
    </header><br>
    <!-- end of the navbar -->

    <!-- start the body section -->
  <section id="body">

    <!--start the pop up log in form-->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="login.php" method="POST">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" name="youremail" id="defaultForm-email" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="yourpassword" id="defaultForm-pass" class="form-control validate" required>
          <input type="checkbox" id="toggleuser-password" />
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
        </div>
        <!--javascript code for showing and hiding the password-->
        <script>
        const password= document.getElementById("defaultForm-pass");
        const togglePassword=document.getElementById("toggleuser-password");

        togglePassword.addEventListener("click", toggleClicked);
        function toggleClicked() {  
          if (this.checked) {
             password.type = "text";
             }
          else {
               password.type = "password";
             }
          }
        </script>
        <!-- end of javascript code for showing and hidding the password-->

      </div>      
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-default" value="Log In">
      </div>
     </form>
    </div>
    </div>
    </div>
    <!--end of the log in form-->

    <!--start the pop up sign up form-->
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content"> 
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="signup.php" method="POST">
      <div class="modal-body mx-3">
       <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input name="email" type="email" id="orangeForm-email" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input name="userName" type="text" id="orangeForm-name" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name">user Name</label>
        </div>
       

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input name="passWord" type="password" id="orangeForm-pass" class="form-control validate" required>
          <input type="checkbox" id="toggle-password" />
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Password</label>
        </div>
        <!--javascript code for showing and hidding the password-->
        <script>
        const password2= document.getElementById("orangeForm-pass");
        const togglePassword2=document.getElementById("toggle-password");

        togglePassword2.addEventListener("click", toggleClicked);
        function toggleClicked() {  
          if (this.checked) {
             password2.type = "text";
             }
          else {
               password2.type = "password";
             }
          }
        </script>
        <!-- end of javascript code for showing and hidding the password-->

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-deep-orange" value="sign Up">
      </div>
      </form>
    </div>
    </div>
    </div>
    <!--end the pop up sign up form-->

    <!--start the chart section-->
  <div id="canvas-holder" >
		<canvas id="canvas"></canvas>
	</div>
	  <style>
     #canvas-holder {
        background-color: #FFFFFF;
        position: relative;
        height:30vh; 
        width:60vw;
        margin-top: 5px;
    }
    </style>
	<script>
			var config = {
			type: 'line',
			data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [{
					label: 'Gas Cost',
					backgroundColor: "rgba(220,220,220,0.2)",
					borderColor: "#3e95cd",
					data: [65,69,67,78,70,65,69],
					fill: false
				}, {
					label: 'Electricity cost',
					fill: false,
					backgroundColor: "rgba(151,187,205,0.2)",
					borderColor: "#8e5ea2",
					data: [89,92,88,85,86,92,90]
				},
        {
          label: 'Water cost',
					fill: false,
					backgroundColor: "rgba(122, 177, 204,0.2)",
					borderColor: "#c45850",
					data: [45,48,42,50,46,40,53]
        }]
			},
			options: {
				responsive: true,
				title: {
					display: true
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					x: {
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					},
					y: {
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

	
	</script>
    
     <!--end of the chart section-->

    <!-- start of the about us section-->
     <section>
      <div class="box2" id="section2" style="margin-top: -120px; margin-left: 900px;">  
      <p>The regulation of the usage of utilities such as water, gas, and electricity has grown to be an issue. Controlling the
      consumption of this utilities is essential in making daily decisions in regard to the economic value. This is why we have 
      developed Smart Solutions to help you regulate and control your electricity, water, and gas usage. 
      Our website will help you calculate your utility costs and estimate the usage of these utilies in your household. You
      need to <a href="" data-toggle="modal" data-target="#modalLoginForm" >Log In</a> to get the best out of our services. 
      If you do not have an account with us, <a href="" data-toggle="modal" data-target="#modalRegisterForm">Create An Account</a> and enjoy our services.</p>                           
      </div>
    </section>
    <!--end of about us section-->

  </section>
   <!-- end the body section  -->

    <!-- start of the footer section -->
    <section>
      <footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
              <div class="container">
                <div class="row row-30">
                  <div class="col-md-4 col-xl-5">
                    <div class="pr-xl-4">
                      <p>We are all about saving energy</p>
                      <p class="rights"><span>©</span><span class="copyright-year">2020</span><span> </span><span>SmartSolutions</span><span>. </span><span>All Rights Reserved.</span></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <h5>Contacts</h5>
                    <dl class="contact-list">
                      <dt>Address:</dt>
                      <dd>798 South Park Avenue, Westlands, Nairobi</dd>
                    </dl>
                    <dl class="contact-list">
                      <dt>email:</dt>
                      <dd><a href="mailto:#">smartsolutions@gmail.com</a></dd>
                    </dl>
                  </div>
                  <div class="col-md-4 col-xl-3">
                  </div>
                </div>
              </div>
              
            </footer>
    </section>
    <!-- end of the footer section -->
</body>
</html>