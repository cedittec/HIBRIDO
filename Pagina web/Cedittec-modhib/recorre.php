<?php
    $path = "./";
    echo "PATH: ".$path."<br><br>";
    recorre($path, 0);



    function recorre($path, $niveles)
    {
        if ($handle = opendir($path)) 
        {
            while (false !== ($entry = readdir($handle)))
            {
                if(strpos($entry,'.') === false)
                {
                    for($i = 0; $i < $niveles*6; $i++) echo "&nbsp;";
                   
                    echo "DIR  $entry<br>";
                    recorre($path."/".$entry, $niveles+1);
                }
                else
                {
                    if($entry != "." && $entry != "..")
                    {
                        for($i = 0; $i < $niveles*6; $i++) echo "&nbsp;";

                        if(substr($entry, -4, 4) == ".php" || substr($entry, -5, 5) == ".html" || substr($entry, -3, 3) == ".js")
                        {
                            echo "<font color = 'red'>$entry</font><br>";
                         
                         
                            $fHandle = fopen($path."/".$entry, "r");
                            $contents = fread($fHandle, filesize($path."/".$entry));
                            echo "<font color = 'green'>".htmlentities($contents)."</font><br>";
    
                        }
                        else
                            echo "$entry<br>";
                    }
                }
            }
            closedir($handle);
        }
    }
?>