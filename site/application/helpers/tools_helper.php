<?php 

function get_product_cover_image($product_id) {
    $t = &get_instance();

    $t->load->model("product_image_model");

    $cover_image = $t->product_image_model->get(
        array(
            "isCover"       => 1,
            "product_id"    => $product_id
        )
    );

    if(empty($cover_image)){
        $cover_image = $t->product_image_model->get(
            array(
                "product_id"    => $product_id
            )
        );
    };

    return !empty($cover_image) ? $cover_image->img_url : "" ;
}

function get_portfolio_cover_image($portfolio_id) {
    $t = &get_instance();

    $t->load->model("portfolio_image_model");

    $cover_image = $t->portfolio_image_model->get(
        array(
            "isCover"       => 1,
            "portfolio_id"    => $portfolio_id
        )
    );

    if(empty($cover_image)){
        $cover_image = $t->portfolio_image_model->get(
            array(
                "portfolio_id"    => $portfolio_id
            )
        );
    };

    return !empty($cover_image) ? $cover_image->img_url : "" ;
}

function get_sub_images($product_id) {
    $t = &get_instance();

    $t->load->model("product_image_model");

    $subImages = $t->product_image_model->get_all(
        array(
            "isCover"       => 0,
            "product_id"    => $product_id
        )
    );
    
    return !empty($subImages) ? $subImages : "" ;

}

function getReadableDate($data) {
    setlocale(LC_TIME, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($data));

}

function get_category($category_id){
    $t = &get_instance();

    $t->load->model("portfolio_category_model");

    $categoryName = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
    ));

    return (empty($categoryName)) ? false : $categoryName->title ;
} 