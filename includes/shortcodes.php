<?php
function custom_dropdown_shortcode($atts) {
    // Generate dropdown HTML
        $output='<form action="" method="post">';
        $output .= '<select name="Post_type" class="dropdown_class">';
    
        $output.='<option value="session">Session</option>';
        $output.='<option value="coursess">Courses</option>';
    
        $output .= '</select>';
        $output.='<select name="Posts" class="dropdown_class">';
        for($i=1;$i<=10;$i++)
        {
            $output.='<option value="'.$i.'">'.strval($i). '</option>';
        }
    
        $output.='<input type="submit" class="submit_btn" name="submit" value="Submit">';
    
        $output.='</form>';
    
        return $output;
    }
    add_shortcode('dropdown', 'custom_dropdown_shortcode');