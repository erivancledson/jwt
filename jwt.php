<?php
class JWT {

	public function create($data) {
//criptografia HS256
		$header = json_encode(array("typ"=>"JWT", "alg"=>"HS256"));
     //cria o payload
		$payload = json_encode($data);

		$hbase = $this->base64url_encode($header);
		$pbase = $this->base64url_encode($payload);

		//assinatura
		
		
		$signature = hash_hmac("sha256", $hbase.".".$pbase, "abC123!", true);
		$bsig = $this->base64url_encode($signature);
     //juntando as informações
		$jwt = $hbase.".".$pbase.".".$bsig;

		return $jwt;
	}

	private function base64url_encode( $data ){

		//troca para o =
	  return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
	}

	private function base64url_decode( $data ){
	  return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
	}

}