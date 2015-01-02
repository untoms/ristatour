    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Enkripsi Chiper Text</div>
        </div> 
        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Text / Code </label>
                            <div class="controls">
                                <input class="input-xlarge focused" name="plain" type="text"  required>
                            </div>
                        </div>	
                        <div class="control-group">
                            <label class="control-label">Key </label>
                            <div class="controls">
                                <select name='key' class="span2" >
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=9>9</option>
                                    <option value=10>10</option>
                                    <option value=11>11</option>
                                    <option value=12>12</option>
                                    <option value=13>13</option>
                                    <option value=14>14</option>
                                    <option value=15>15</option>
                                    <option value=16>16</option>
                                    <option value=17>17</option>
                                    <option value=18>18</option>
                                    <option value=19>19</option>
                                    <option value=20>20</option>
                                    <option value=21>21</option>
                                    <option value=22>22</option>
                                    <option value=23>23</option>
                                    <option value=24>24</option>
                                    <option value=25>25</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Option</label>
                            <div class="controls">
                                <span class="span6 input-icon input-icon-right">
                                    <label class="red">
                                        <input name="opsi" value="enc" type="radio" checked />
                                        <span class="lbl"> encrypt</span>
                                    </label>
                                    <label class="red">
                                        <input name="opsi" value="dec" type="radio" />
                                        <span class="lbl"> decrypt</span>
                                    </label>
                                </span>
                            </div>   
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary" name="submit" value="go">Process</button>
                                <button type="reset" class="btn">Reset</button>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>	
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Hasil Enkripsi Chiper Text</div>
            </div>          
            <div class="block-content collapse in">	
                <div class="span12">
                    <form class="form-horizontal" method="post"> 
                        <fieldset>	
                            <?php
                                if (!$_POST['submit'] == "go" ){exit;}
                                //enkripsi caesar
                                //alogaritma caesar = number_plaintext + key => chippertext
                                $plain=$_POST['plain'];
                                $k=$_POST['key'];
                                $opsi=$_POST['opsi'];

                            ?>
                            <div class="control-group">
                                <label class="control-label">Text / Code </label>
                                <div class="controls">
                                    <input class="input-xlarge focused" name="plain" 
                                           type="text" value="<?php echo  $plain;?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Key </label>
                                <div class="controls">
                                    <input class="input-xlarge focused" name="plain" 
                                           type="text" value="<?php echo  $k;?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Result </label>
                                <div class="controls">
                                    <div class="label label-success label-large">     
                                        <?php
                                        if ($opsi == "enc") {
                                            for ($a=0; $a < strlen($plain); $a++){ 
                                                if ($a==0){
                                                    $ord= ord($plain[$a]);
                                                    $key=$k;
                                                    $jum= $ord + $key;
                                                    
                                                    if ($ord + $key > 122){
                                                        $b= $ord + $key - 26;$c= chr($b);
                                                    } else {
                                                        if ($ord + $key > 90 && $ord < 97){
                                                            $b= $ord + $key - 26;$c= chr($b);
                                                            
                                                        } else {$b= $ord + $key;$c= chr($b);
                                                        
                                                        }
                                                    } echo $c;
                                                    
                                                }
                        else if ($a%2==0){
                        $ord= ord($plain[$a]);
                        $key=$k+1;
                        $jum= $ord + $key;

                                if ($ord + $key > 122){$b= $ord + $key - 26;$c= chr($b);} 
                                    else {
                                        if ($ord + $key > 90 && $ord < 97){$b= $ord + $key - 26;$c= chr($b);} 
                                            else {$b= $ord + $key;$c= chr($b);}
                                        }


                              echo $c;

                                  }	
                        else if ($a%3==0){
                        $ord= ord($plain[$a]);
                        $key=$k+2;
                        $jum= $ord + $key;

                                if ($ord + $key > 122){$b= $ord + $key - 26;$c= chr($b);} 
                                    else {
                                        if ($ord + $key > 90 && $ord < 97){$b= $ord + $key - 26;$c= chr($b);} 
                                            else {$b= $ord + $key;$c= chr($b);}
                                        }


                              echo $c;

                                  }
                        else {
                        $ord= ord($plain[$a]);
                        $key=$k+3;
                        $jum= $ord + $key;

                                if ($ord + $key > 122){$b= $ord + $key - 26;$c= chr($b);} 
                                    else {
                                        if ($ord + $key > 90 && $ord < 97){$b= $ord + $key - 26;$c= chr($b);} 
                                            else {$b= $ord + $key;$c= chr($b);}
                                        }


                              echo $c;

                                  }	  


                            }

                        exit;
                        }

                        if ($opsi == "dec") {
                        for ($a=0; $a < strlen($plain); $a++)
                        {

                        if ($a==0){
                        $key=$k;
                         $ord= ord($plain[$a]);

                                if ($ord -$key < 97 && $ord >96){$b= $ord - $key + 26;$c= chr($b);} 
                                    else {
                                        if ($ord - $key < 65 ){$b= $ord - $key + 26;$c= chr($b);} 
                                            else {$b= $ord - $key;$c= chr($b);}
                                        }

                           echo $c;}

                        else  if ($a%2==0){
                        $key=$k+1;
                         $ord= ord($plain[$a]);

                                if ($ord -$key < 97 && $ord >96){$b= $ord - $key + 26;$c= chr($b);} 
                                    else {
                                        if ($ord - $key < 65 ){$b= $ord - $key + 26;$c= chr($b);} 
                                            else {$b= $ord - $key;$c= chr($b);}
                                        }

                           echo $c;}  
                         else  if ($a%3==0){
                        $key=$k+2;
                         $ord= ord($plain[$a]);

                                if ($ord -$key < 97 && $ord >96){$b= $ord - $key + 26;$c= chr($b);} 
                                    else {
                                        if ($ord - $key < 65 ){$b= $ord - $key + 26;$c= chr($b);} 
                                            else {$b= $ord - $key;$c= chr($b);}
                                        }

                           echo $c;} 
                        else  {
                        $key=$k+3;
                         $ord= ord($plain[$a]);

                                if ($ord -$key < 97 && $ord >96){$b= $ord - $key + 26;$c= chr($b);} 
                                    else {
                                        if ($ord - $key < 65 ){$b= $ord - $key + 26;$c= chr($b);} 
                                            else {$b= $ord - $key;$c= chr($b);}
                                        }

                           echo $c;}    

                        }
                        exit;
                        }



/**
for ($a=0; $a < strlen($plain); $a++)
{ $ord= ord($plain[$a]);

        if ($ord -$key < 97 && $ord >96){$b= $ord - $key + 26;$c= chr($b);} 
            else {
                if ($ord - $key < 65 ){$b= $ord - $key + 26;$c= chr($b);} 
                    else {$b= $ord - $key;$c= chr($b);}
                }
    
   echo $c;
}
exit;

**/
                                        ?>
                                    </div>
                                </div>	
                            </div>  
                        </fieldset>
                    </form>
                </div>	
            </div>
        </div>
