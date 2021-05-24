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

function get_settings(){
    $t = &get_instance();

    //$settings = $t->session->userdata("settings");

    //if(empty($settings)) {
        $t->load->model("settings_model");

        $settings = $t->settings_model->get();

        $t->session->set_userdata("settings", $settings);
    //}

    return $settings;
}

function send_email($toEmail = "", $subject = "", $message = ""){
    $t = &get_instance();

    $t->load->model("emailsettings_model");

    $email_settings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
        )
    );

    if(empty($toEmail)) 
        $toEmail = $email_settings->to;

    $config = array(
        "protocol"  => $email_settings->protocol,
        "smtp_host" => $email_settings->host,
        "smtp_port" => $email_settings->port,
        "smtp_user" => $email_settings->user,
        "smtp_pass" => $email_settings->password,
        "starttls"  => true,
        "charset"   => "utf-8",
        "mailtype"  => "html",
        "wordwrap"  => true,
        "newline"   => "\r\n"
    );

    $t->load->library("email", $config);

    $t->email->from($email_settings->from, $email_settings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);

    return $send = $t->email->send();
}


function get_picture($path = "", $picture = "", $resolution = "50x50"){

    if($picture != ""){

        if(file_exists(FCPATH . "uploads/$path/$resolution/$picture")){
            $picture = base_url("uploads/$path/$resolution/$picture");
        } else {
            $picture = base_url("assets/assets/images/default_image.png");

        }

    } else {

        $picture = base_url("assets/assets/images/default_image.png");

    }

    return $picture;

}