<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>
    	APISim
    </title>
    <link rel="stylesheet" href="css/materialize.css"/>
    <link rel="stylesheet" href="css/media.css"/>
  </head>

  <body>

  	<nav>
	    <div class="nav-wrapper indigo lighten-3">
	      <a href="#" class="brand-logo">
          APISim
	      </a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="#" aria-label="link to contact section">Contact</a></li>
	      </ul>
	    </div>
	  </nav>

  	<main>
    	<div class="container">
    		<div class="section"></div>
    		<div class="section"></div>
				<div class="section"></div>
					<div class="row">
  				  <div class="flow-text col s8">
  		      	APISim is an application that allows users to populate and view populated data sets from a RESTful API design.<br><br>A user can choose to enter data into the provided field and make a query to that data or simply query the endpoint and see what is returned.
	  	      </div>
					</div>
        <div class="section"></div>

        <!-- login form -->
        <div class="row center-align">

          <div class="col s4">
            <div class="section"></div>
            <div id="form_container" class="z-depth-1 grey lighten-4 row">

              <form class="col s12" method="post">
                <div class="row">
                  <div class="input-field col s12">
                    <input value="Audi" id="vehicle_make" name="vehicle_make" type="text">
                    <label class="active" for="vehicle_make">Vehicle make</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="SUV" id="vehicle_type" name="vehicle_type" type="text">
                    <label class="active" for="vehicle_type">Vehicle type</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="Black" id="vehicle_colour" name="vehicle_colour" type="text">
                    <label class="active" for="vehicle_colour">Vehicle colour</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="2017" id="vehicle_manufacture_year" name="vehicle_manufacture_year" type="text">
                    <label for="vehicle_manufacture_year">Vehicle manufacture year</label>
                  </div>
                </div>


                <div id="initial_option" class="row valign-wrapper">
                  <div id="options_container" class="input-field col s8">
                    <input id="random_option_item" value=" " name="vehicle_option[]" type="text">
                    <label for="vehicle_option">Vehicle option(s)</label>
                  </div>
                  <div id="add_button" class="input-field col s4">
                    <a id="add" class="waves-effect waves-light indigo btn">
                      <i class="material-icons">+</i>
                    </a>
                  </div>
                </div>


                <button type="submit" name="btn_login" class="col s12 btn btn-large waves-effect waves-light indigo lighten-3">Submit</button>
    


              </form>  

            </div>
          </div> <!-- col db -->

          <!-- endpoint -->
          <div class="col s7 offset-s1">
            <div class="row valign-wrapper">
              <div class="input-field col s5">
                <h6>
                  https://APISim.online/api/product?=
                </h6>
              </div>
              <div class="input-field col s5">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">URL request</label>
              </div>
              <button class="btn waves-effect waves-light indigo lighten-3 col s2" type="submit" name="action">
                Send
              </button>
            </div>

            <div id="api_output_container" class="z-depth-1 grey lighten-4 row">

            </div>
          </div> <!-- col endpoint -->

        </div>

	  	</div> <!-- container -->
		</main>

    <script src="js/materialize.js"></script>
    <script src="js/scripts.js"></script>
  </body>
  </html>
