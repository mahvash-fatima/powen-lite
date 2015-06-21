<?php  
//Pagination
function powen_pagination($powen_pages = '', $powen_range = 4)
{  
     $powen_showitems = ($powen_range * 2)+1;  
 
     global $powen_paged;
     if(empty($powen_paged)) $powen_paged = 1;
 
     if($powen_pages == '')
     {
         global $wp_query;
         $powen_pages = $wp_query->max_num_pages;
         if(!$powen_pages)
         {
             $powen_pages = 1;
         }
     }   
 
     if(1 != $powen_pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$powen_paged." of ".$powen_pages."</span>";
         if($powen_paged > 2 && $powen_paged > $powen_range+1 && $powen_showitems < $powen_pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($powen_paged > 1 && $powen_showitems < $powen_pages) echo "<a href='".get_pagenum_link($powen_paged - 1)."'class='page-previous'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $powen_pages; $i++)
         {
             if (1 != $powen_pages &&( !($i >= $powen_paged+$powen_range+1 || $i <= $powen_paged-$powen_range-1) || $powen_pages <= $powen_showitems ))
             {
                 echo ($powen_paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($powen_paged < $powen_pages && $powen_showitems < $powen_pages) echo "<a href=\"".get_pagenum_link($powen_paged + 1)."\" class='page-next'>Next &rsaquo;</a>";  
         if ($powen_paged < $powen_pages-1 &&  $powen_paged+$powen_range-1 < $powen_pages && $powen_showitems < $powen_pages) echo "<a href='".get_pagenum_link($powen_pages)."' class='page-last'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
?>