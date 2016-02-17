<?php
if (file_exists('./login/includes/api.php')) {
include('./login/includes/api.php');
} else {
include('../login/includes/api.php');
}
if(is_logged_in()) {
      /*
       * This example is written in PHP and provides a base to access our API. This example uses this method
       * http://wiki.atlauncher.com/api:admin:pack#put_admin_pack_pack_name_settings_allowedplayers - to alter
       * the allowed players for a private pack. This is a PUT request meaning that all the allowed players will
       * be replaced with what is provided in the $dataToSend array.
       */
      $apiKey = "w20G3VNJgaM8z4czuzK1usmY1It4X2au"; // Insert API Key Here
      $packSafeName = "ResonantRise"; // Packs safe name removing all non alphanumeric characters so "My Pack-23" would be "MyPack23"
      
      $apiBaseURL = "https://api.atlauncher.com/v1";
      
      // The API request to make, in this instance it's dealing with allowed players of a private pack
      $apiRequestURL = $apiBaseURL . "/admin/pack/" . $packSafeName . "/files/4.x";
      
      // The username to add to the allowed players list
      $username= "Ryahn";
      
      $response = null;
      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $apiRequestURL);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["API-KEY: " . $apiKey, "Content-Type: application/json"]);
      curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
      $ret = curl_exec($ch);
      curl_close($ch);
      
      if($ret == null) {
          exit("Didn't get response from the API!");
      }
      
      echo $ret;
    }
  ?>