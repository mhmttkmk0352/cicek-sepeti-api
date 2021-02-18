<?php 

    class cicek_sepeti {

        public $api_url;
        private $api_key;
        
        public function __construct(){
            $this->api_url = "http://apis.ciceksepeti.com";
            $this->api_key = "*****************************";
        }
        public function siparis_getir(){
            $post_verisi = array(
                "startDate"=>"2020-07-03T03:52:09.390Z",
                "endDate"=>"2020-07-07T03:52:09.390Z",
                "pageSize"=>10,
                "page"=>0
            );

            $post_verisi = json_encode( $post_verisi );

            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $this->api_url."/api/v1/Order/GetOrders");
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, [
                "x-api-key: ".$this->api_key,
                "Content-Type: application/json"       
            ]);
            curl_setopt( $ch, CURLOPT_POST, 1 );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, ($post_verisi) );
        
            return curl_exec( $ch );        
            
        }
    }

    $cs = new cicek_sepeti;
    echo $cs->siparis_getir();


?>
