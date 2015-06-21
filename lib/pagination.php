<?php  
//Pagination
function powen_pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $powen_paged;
     if(empty($powen_paged)) $powen_paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$powen_paged." of ".$pages."</span>";
         if($powen_paged > 2 && $powen_paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($powen_paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($powen_paged - 1)."'class='page-previous'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $powen_paged+$range+1 || $i <= $powen_paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($powen_paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($powen_paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($powen_paged + 1)."\" class='page-next'>Next &rsaquo;</a>";  
         if ($powen_paged < $pages-1 &&  $powen_paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' class='page-last'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
?>