<?php 
// autoload'dan helperin alt tireden önceki kısmını yazarak tanımladık  
function convertToSEO($text){   
    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", "/", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));
}
function getReadableDate($data) {
    setlocale(LC_TIME, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($data));

}

function get_active_user() {
    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user)
        return $user;
    else
        return false;
}

function send_email($toEmail = "", $subject = "", $message = ""){
    $t = &get_instance();

    $t->load->model("emailsettings_model");

    $email_settings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
        )
    );

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

function get_settings()
{   
    $t = &get_instance();

    $t->load->model("settings_model");

    if($t->session->userdata("settings")) {
        $settings = $t->session->userdata("settings");
    } else {
        $settings = $t->settings_model->get();

        if(!$settings) {

            $settings = new stdClass();
            $settings->company_name = "default";
            $settings->logo         = "default";

        }
        
        $t->session->set_userdata("settings", $settings);

    }
    return $settings;
}

function get_category_title($category_id = 0) {

    $t = &get_instance();

    $t->load->model("portfolio_category_model");

    $category = $t->portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );

    if($category)
        return $category->title;
    else 
        return "Tanımlı değil"; 
}

function page_title($sectionTitle = "") {

    $t = &get_instance();
    $t->session->set_userdata("section_title", $sectionTitle);    

}

function upload_picture($file, $uploadPath, $width, $height, $name){

    $t = &get_instance();
    $t->load->library("simpleimagelib");

    if(!is_dir("{$uploadPath}")){
        mkdir("{$uploadPath}");
        chmod ("{$uploadPath}", 0644); 
    }

    if(!is_dir("{$uploadPath}/{$width}x{$height}")){
        mkdir("{$uploadPath}/{$width}x{$height}");
    }

    $upload_error = false;
    try {

        $simpleImage = $t->simpleimagelib->get_simple_image_instance();

        $simpleImage
            ->fromFile($file)
            ->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null, 87);

    } catch(Exception $err) {
        $error =  $err->getMessage();
        $upload_error = true;
    }

    if($upload_error){
        echo $error;
    } else {
        return true;
    }


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