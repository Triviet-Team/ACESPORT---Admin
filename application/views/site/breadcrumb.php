<?php 
    $xhtmlBreadcrumb = '';
    if(isset($breadcrumb)){
        $xhtmlBreadcrumb .= '<div class="bc-icons"><nav aria-label="breadcrumb"><ol class="breadcrumb">';
        $xhtmlBreadcrumb .= '<li class="breadcrumb-item"><a itemprop="url" href="'.base_url().'"><span itemprop="title">Trang chủ</span></a></li>';

        foreach($breadcrumb as $k => $row){
            if($k == count($breadcrumb) - 1){
                $xhtmlBreadcrumb .= '<li class="breadcrumb-item active">'.$row['name'].'</li>';
            }else{
                $xhtmlBreadcrumb .= '<li class="breadcrumb-item"><a itemprop="url" href="'.$row['url'].'"><span itemprop="title">'.$row['name'].'</span></a></li>';
            }
        }

        $xhtmlBreadcrumb .= '</ol></nav></div>';
    }
    echo $xhtmlBreadcrumb;
?>



                
                
