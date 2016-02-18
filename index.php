<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="A date calculator" />
    <meta name="author" content="Yue Li" />
    <title>Date Calculator</title>
    <!-- Bootstrap Core CSS -->
    <link href="components/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
  </head>

  <body>
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Date Calculator</a>
      </div>
    </nav>
    <div class="container">
     	<!-- <form action="datetimecalculator.php" class="js-ajax-php-json" method="post" accept-charset="utf-8"> -->
        <div class="panel panel-primary">
          <div class="panel-heading">Date Time Calculator</div>
          <div class="panel-body">
            <div class="col-sm-8">
              <label>Choose Date Time</label>
              <input type='text' id="input-datetimepicker" class="form-control" placeholder="Click calender icon to choose"/>
            </div>
            <div class="col-sm-4">
              <label>Choose Time Zone</label>
              <div class="form-group">
                <select class="form-control" name="timezone" id="timezone">
                  <option value="0">UTC</option>
                  <option value="10">AEST</option>
                  <option value="-6">CST</option>
                  <option value="-7">MST</option>
                  <option value="12">NZST</option>
                </select>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">Modify Date and Time</div>
            <div class="panel-body">
              <div class="col-sm-12">
                <label class="radio-inline"><input type="radio" checked id="addoperand" name="optradio">Add Date Time</label>
                <label class="radio-inline"><input type="radio" id="minusoperand" name="optradio">Subtract Date Time</label>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-4">
                  <label>Day(s)</label>
                  <div class="input-group">
                    <input type="text" id="modifyDay" name="modifyDay" value="0" maxlength="6" class="form-control" placeholder=""/>
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Hour(s)</label>
                  <div class="input-group">
                    <input type="text" id="modifyHour" name="modifyHour" value="0" maxlength="6" class="form-control" placeholder=""/>
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Minute(s)</label>
                  <div class="input-group">
                    <input type="text" id="modifyMinute" name="modifyMinute" value="0" maxlength="6" class="form-control" placeholder=""/>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <!-- for error outputs -->
                <p></p>
              </div>
              <div class="col-sm-12">
                <button type="submit" id="updateBtn" class="btn btn-primary">Click to update Date and Time</button>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">Timezones</div>
            <div class="panel-body" hidden id = "resultpanel">
              <div class="col-md-4">
                <span class="label label-default">UTC</span>
                <input type="text" id="utcdisplay" readonly name="utcdisplay" value="" class="form-control" placeholder=""/>
              </div>
              <div class="col-sm-4">
                <span class="label label-default">AEST</span>
                <input type="text" id="aestdisplay" readonly name="aestdisplay" value="" class="form-control" placeholder=""/>
              </div>
              <div class="col-sm-4">
                <span class="label label-default">NZST</span>
                <input type="text" id="nzstdisplay" readonly name="nzstdiplay" value="" class="form-control" placeholder=""/>
              </div>
              <div class="col-sm-4">
                <span class="label label-default">CST</span>
                <input type="text" id="cstdisplay" readonly name="cstdisplay" value="" class="form-control" placeholder=""/>
              </div>
              <div class="col-sm-4">
                <span class="label label-default">MST</span>
                <input type="text" id="mstdisplay" readonly name="mstdisplay" value="" class="form-control" placeholder=""/>
              </div>
            </div>
          </div>
        </div>
      <!-- </form> -->
    </div>
  </body>
    <!-- js code -->
    <script src="components/jquery/jquery.js"></script>
    <script src="components/moment/moment.min.js"></script>
    <script src="components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="components/datecalculator.js"></script>
  </body>
</html>
