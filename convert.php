



<?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                                    {
                                     $amount=$_POST['amount'];
                                     $from='INR';
                                     $to='USD';
                            
                                    $from1 = urlencode($from);
                                    $to1 = urlencode($to);
                                    $url = "https://www.google.com/search?q=".$from1."+to+".$to1;

                                     
                                    $get = file_get_contents($url);
                                    $data = preg_split('/\D\s(.*?)\s=\s/',$get);
                                    $exhangeRate = (float) substr($data[1],0,7);
                                    $convertedAmount = $amount*$exhangeRate;
                                        echo "result= ". $convertedAmount. "$";
                                    } 
                   
               
         ?>