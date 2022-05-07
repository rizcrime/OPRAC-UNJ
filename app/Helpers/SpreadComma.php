<?php
namespace App\Helpers;

class SpreadComma{
    public function spreMems($nilai, $par){
        $jc = [];
        foreach ($nilai as $val){
            if($par==2){
                array_push($jc, $val->subjects->classrooms->members);
            }elseif($par==3){
                array_push($jc, $val->members);
            }
            else{
                array_push($jc, $val->classrooms->members);
            }
        }
        return explode(',', $jc[0]??0);
    }
}

?>
