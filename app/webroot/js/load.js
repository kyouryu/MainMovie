$(function(){
  $("input:checkbox").change(function(){getContents();});
 


$('#time').change(function(){getContents();});

$('#score').change(function(){getContents();});


});

$(".pagination a").live('click', function(){
  $("#serviceListSection").load(this.href);
  return false;
});


function getChecked(name) {
  var AllVals = $('input[name="' + name + '"]:checked').map(function() {
    return this.value;
  });
  AllVals = $.makeArray(AllVals).join('|');
  return AllVals;
}

function getContents(){
  var timeId =$('#time').val();
  var countryId = getChecked('country_id[]');
  var genreId = getChecked('genre_id[]');
  var feelingId = getChecked('feeling_id[]');
  var partnerId = getChecked('partner_id[]');
  var scoreId =$('#score').val();
  
 var http = $.get (
"results/title:/time:" + timeId + "/country_id:" + countryId + "/genre_id:" + genreId + 
    "/feeling_id:" + feelingId + "/partner_id:" + partnerId + "/score:" + scoreId,
null,
function ( data ) {
$("#serviceListSection").html(data);
}
)
}