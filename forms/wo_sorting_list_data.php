<?php
// --------------------------------------------------------------------
// wo_sorting_list_data.php -- HTML fragment to show the logs.
//
// Created: 12/31/15 SS
// --------------------------------------------------------------------



    if(isset($error_msg))
    {
        echo '<div class="showlog_error_message">' . $error_msg . '</div>';
    }
    if(isset($output_lines))
    {
        echo '<div class="wo_sorting_data">' . "\n";
        foreach($output_lines as $line)
        {
            echo $line . "<br>\n";
        }
        echo "</div>\n";
    }
    echo "</body>\n";  // Required because this is an extension to a normal page.
    echo "</html>\n";
?>