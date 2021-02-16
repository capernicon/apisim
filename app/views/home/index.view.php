  <?php include 'nav.view.php'; ?>

  <main>
      <div class="container">
        <div class="section"></div>
        <div class="section"></div>
        <div class="section"></div>
          <div class="row">
            <div class="flow-text col s8">
              APISim is REST-like application that allows users to enter and query stored data.
              <div class="section"></div>
              Users can either submit the prefilled data, or enter new values into the fields. Users can then make a query to that data, or simply query the endpoint and see what values are returned.
            </div>
          </div>
        <div class="section"></div>

        <!-- login form -->
        <div class="row center-align">

          <div class="col s4">
            <div class="section"></div>
            <div id="form_container" class="z-depth-1 grey lighten-4 row">

              <form class="col s12" method="POST" action="/car">
                <div class="row">
                  <div class="input-field col s12">
                    <input value="Audi" id="vehicle_make" name="make" type="text">
                    <label for="make">Make</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="SUV" id="vehicle_type" name="type" type="text">
                    <label for="vehicle_type">Type</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="Black" id="vehicle_colour" name="colour" type="text">
                    <label for="vehicle_colour">Colour</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input value="2017" id="vehicle_manufacture_year" name="year" type="text">
                    <label for="vehicle_manufacture_year">Year</label>
                  </div>
                </div>


                <div id="initial_option" class="row valign-wrapper">
                  <div id="options_container" class="input-field col s8">
                    <input value=" " id="random_option_item" name="options[]" type="text">
                    <label for="random_option_item">Option(s)</label>
                  </div>
                  <div id="add_button" class="input-field col s4">
                    <a id="add" class="waves-effect waves-light indigo btn">
                      <i class="material-icons">+</i>
                    </a>
                  </div>
                </div>

                <button type="submit" class="col s12 btn btn-large waves-effect waves-light indigo lighten-3">
                  Submit
                </button>

                <div class="section"></div>
                <div class="section"></div>
                <div class="section"></div>

              </form>

            </div>
          </div> <!-- col db -->

          <!-- endpoint -->
          <div class="col s7 offset-s1">
            <div class="section"></div>

            <form class="col s12" method="GET" action="/car">
              <div class="row">
                <div class="input-field col s3">
                  <h6>
                    <?= PageController::$url ?>
                  </h6>
                </div>
                <div class="input-field valign-wrapper col s5">
                  <input value="<?= htmlspecialchars($_GET['search'] ?? 'make=Audi') ?>" id="random_option_item" name="search" type="text">
                  <label for="random_option_item">URL request</label>
                </div>
                <div class="input-field valign-wrapper col s4">
                  <button class="btn waves-effect waves-light indigo lighten-3" type="submit">
                    Query
                  </button>
                </div>

              </div>
            </form>

              <div id="api_output_container" class="left-align z-depth-1 grey lighten-4 row">

                <!-- api GET results here -->
                <span id="example_output">
                  <pre><?= htmlspecialchars(stripcslashes($exampleResponse ?? "")); ?></pre>
                </span>
                <pre><?= htmlspecialchars(stripcslashes($response ?? "")); ?></pre>

              </div>

          </div> <!-- col endpoint -->

        </div>

      </div> <!-- container -->
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
    </main>

    <script src="js/materialize.js"></script>
    <script src="js/scripts.js"></script>
  </body>
  </html>
