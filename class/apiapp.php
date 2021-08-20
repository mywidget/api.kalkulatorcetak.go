<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class apiapp {
		private $status; 
		private $produk; 
        private function exec_redirects($ch, &$redirects, $die=false) {
            $data = curl_exec($ch);
            
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_code == 301 || $http_code == 302) {
                list($header) = explode("\r\n\r\n", $data, 2);
                
                $matches = array();
                preg_match("/(Location:|URI:)[^(\n)]*/", $header, $matches);
                $url = trim(str_replace($matches[1], "", $matches[0]));
                
                $url_parsed = parse_url($url);
                if (isset($url_parsed)) {
                    curl_setopt($ch, CURLOPT_URL, $url);
                    $redirects++;
                    return $this->exec_redirects($ch, $redirects, true);
				}
			}
            
            list(, $body) = explode("\r\n\r\n", $data, 2);
            return $body;
		}
        
       
		public function load_more($opts){
			extract($opts);
            $endpoint = $site_api.'/apiapp/load/'; 
			// return $endpoint;
			$configs = array('secret'=>$app_secret,'app_id'=>$appid_api,'domain'=>$_SERVER['HTTP_HOST'],'start'=>0,'limit'=>6);
			$arr =json_encode($configs);
			
            // $ch = curl_init(); 
			// curl_setopt($ch, CURLOPT_URL, $endpoint);
			// // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: token '.$app_secret, 'User-Agent: Kalkulatorcetak'));
			// curl_setopt($ch, CURLOPT_HEADER, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
            // $data = $this->exec_redirects($ch, $out); 
            // $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // curl_close($ch);
            
            // if($statusCode == 200){
                // $this->status = "ok";  
                $this->produk = $arr;
                // } else{
                // $this->status = "Status Code: " . $statusCode;
			// }
		}
        function get_status() {
			return $this->status;
		}
        function get_data() {
			return $this->produk;
		}
	}		