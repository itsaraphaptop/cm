<?php

    function getParent($costcode){

        // setup var
        $lev = 0; $parent = array();
        $levArr = array(10000000,1000000,10000,100,1);

        // loop check level of costcode
        foreach ($levArr as $key => $value)
            if($costcode%$value == 0){ $lev = $key+1; break; }

        // loop add parent to array
        $parent['level'] = $lev;
        for($i=$lev;$i>=1;$i--){ $parent['parent'][$i] = sprintf("%08d",floor($costcode/$levArr[$i-1])*$levArr[$i-1]); }
        return $parent;

    }

?>