<?php
class JisakuHelper extends AppHelper {
//    ヘルバーを読み込む
    var $helpers = array('Form');

    
    //年のプルダウンを作成(フィールド名、最小値、最大値)
    function selectYear($field, $minYear, $maxYear) 
    {
        $yearList = array();
//        最小値が最大値になるまで繰り返す
        for ($year = $minYear; $year <= $maxYear; ++$year) {
            //$yearList[100] = 100の形式にする
            $yearList[$year] = $year;
        }
        
        return $this->Form->select($field, $yearList,array('label' => '製作年'));
    }
//$this->Test->selectYear('year', 1000, 2000);で使用する
 
    
     function selectTime($field, $minTime, $maxTime) 
    {
        $timeList = array();
        for ($time = $minTime; $time <= $maxTime; ++$time) {
            $timeList[$time] = $time;
        }
        return $this->Form->select($field, $timeList,array('label' => '上映時間'));
    }

    
    //Array ( [3] => アジア [2] => アメリカ ) 配列
    //results.ctpで使用。取得した検索条件配列を「/」で区切って渡す
    function getSearch($items) {
         foreach( $items as $item) {
       $itemList[] = $item;
    }
     $item_name=implode('&nbsp;/&nbsp;', $itemList);
     return  $item_name;
    }


    //Array ( [0] => Array ( [id] => 2 [name] => アメリカ ) )配列
    //viewで使用。国名やジャンル名のみを「/」で区切って渡す
    function getName($items) {
    foreach ($items as $item) {
                    $itemList[]=$item["name"];
                }
                $item_name=implode('&nbsp;/&nbsp;', $itemList);
     return  $item_name;
}


//あらすじから１２０文字だけ抜き出す
function summary($summary) {
    $summary = mb_substr($summary, 0,120);
    return $summary;
}



function selectScore() {
      $scoreList = array();
        for ($i = 1 ; $i <= 5 ; ++$i) {
            $scoreList[$i] = $i;
        }
        
        
        return $this->Form->select('score', $scoreList,array(
            'empty' => '---',
        ));
    }

    
    
    function getStar($level) {
    $max = 5;
    return str_repeat($this->Html->image('star_ylw.gif'), $level) . str_repeat($this->Html->image('star_wht.gif'), $max-$level);
}
}
?>
