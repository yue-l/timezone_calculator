// date time calculation script for front-end events.

// init datetimepicker
$(document).ready(function() {
  $('#input-datetimepicker').datetimepicker({
    format: 'DD/MM/YYYY HH:mm',
    defaultDate: new Date(),
  });
});

// updates all other timezones
$('#updateBtn').click(function() {

  updateDateTime();
  $('#resultpanel').removeAttr('hidden');
});

// error handlding features, replace all the characters except numbers.
$('#modifyDay').on("change", function() {
  $(this).val($(this).val().replace(/[^0-9]+/g,''));
  if($(this).val().length == 0){
    $(this).val(0);
  }
});
$('#modifyHour').on("change", function() {
  $(this).val($(this).val().replace(/[^0-9]+/g,''));
  if($(this).val().length == 0){
    $(this).val(0);
  }
});
$('#modifyMinute').on("change", function() {
  $(this).val($(this).val().replace(/[^0-9]+/g,''));
  if($(this).val().length == 0){
    $(this).val(0);
  }
});

// define update type
function updateCalculationType(){
  $updateType = $('#addoperand').is(':checked') ? 'add' : 'minus';
  return $updateType;
}

// ajax update - Date Time returns a json array for all the datetime data
function updateDateTime() {
  var updateType = updateCalculationType();
  $.ajax({
    type : "POST",
    url: 'datetimecalculator.php',
    data: {
      currentDatetime : $('#input-datetimepicker').val(),
      timeZone : $('#timezone').val(),
      updateType : updateType,
      day : $('#modifyDay').val(),
      hour : $('#modifyHour').val(),
      minute : $('#modifyMinute').val(),
    },
    success: function (data) {
      setConversionValues(data);
    },
    error: function (notice) {
      alert(notice.responseText);
    },
  });
}

// a helper method, updates html elements
function setConversionValues(data){
  var response = JSON.parse(data);
  // update text
  $('#utcdisplay').val(response['utc']);
  $('#aestdisplay').val(response['aest']);
  $('#cstdisplay').val(response['cst']);
  $('#mstdisplay').val(response['mst']);
  $('#nzstdisplay').val(response['nzst']);
}
