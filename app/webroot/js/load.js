$(function(){
    
    //チェックボックスが選択されたらgetContents()を呼び出す
  $("input:checkbox").change(function(){getContents();});
 
 //時間のプルダウンが選択されたらgetContents()を呼び出す
$('#time').change(function(){getContents();});

//スコアが選択されたらgetContents()を呼び出す
$('#score').change(function(){getContents();});

});

//ページ番号をクリックされたら
$(".pagination a").live('click', function(){
//ページ遷移を抑制する
  $("#serviceListSection").load(this.href);
  return false;
});


//チェックされた値を取得し、
function getChecked(name) {
    
    //チェックボックスでチェックされた値を取得し、
  var AllVals = $('input[name="' + name + '"]:checked').map(function() {
    return this.value;
  });
  
  //「｜」で連結する
  AllVals = $.makeArray(AllVals).join('|');
  return AllVals;
}

function getContents(){
  
  //時間の値を取得
  var timeId =$('#time').val();
  
  //国id一覧を取得
  var countryId = getChecked('country_id[]');
  //ジャンルid一覧を取得
  var genreId = getChecked('genre_id[]');
  //感想id一覧を取得
  var feelingId = getChecked('feeling_id[]');
  //鑑賞相手id一覧を取得
  var partnerId = getChecked('partner_id[]');
  
  //点数の値を取得
  var scoreId =$('#score').val();
  
  //検索に一致するURLを取得する
 var http = $.get (
"results/title:/time:" + timeId + "/country_id:" + countryId + "/genre_id:" + genreId + 
    "/feeling_id:" + feelingId + "/partner_id:" + partnerId + "/score:" + scoreId,
null,

function ( data ) {
//取得したデータを表示する場所を指定
$("#serviceListSection").html(data);
}
)
}