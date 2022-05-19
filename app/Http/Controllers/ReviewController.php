<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getFacebookReviews() {
        $url = "https://graph.facebook.com/v12.0/me?fields=id%2Cname%2Coverall_star_rating%2Cpicture%7Burl%7D%2Crating_count%2Cratings%7Bcreated_time%2Creview_text%2Crating%2Creviewer%7Bid%2Cfirst_name%2Cprofile_pic%7D%7D&access_token=";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.config('app.fbac'));
        // SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);
        curl_close($ch);

        return $this -> response['response'] = json_decode($output);
    }

    public function getGAC() {
        return config('app.gac');
    }
}
