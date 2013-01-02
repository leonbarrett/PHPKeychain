<?php

namespace LeonBarrett;

/**
 * LbKeychain - a PHP wrapper for storing and retrieving passwords in OS X Keychain.
 *
 * @author Leon Barrett <leon@leonbarrett.com>
 *
 * @example
 * LbKeychain::set_password('My Service','password');


/**
 * LbKeychain class.
 */
class KeyChain{
	
	
	/**
	 * set_password function.
	 * 
	 * @access public
	 * @static
	 * @param string $service_name (default: '')
	 * @param string $password (default: '')
	 * @return void
	 */
	public function set_password($service_name = '',$password = ''){
		
		exec('security 2>&1 >/dev/null add-generic-password -a '.$service_name.' -s "Login: '.$service_name.'" -w '.$password);	
		
		if(!get_password($service_name) return false;
		
		return true;	
		
	} // end function: set_password
	
	
	/**
	 * update_password function.
	 * 
	 * @access public
	 * @static
	 * @param string $service_name (default: '')
	 * @param string $password (default: '')
	 * @return void
	 */
	public function update_password($service_name = '',$password = ''){
		
		self::delete_password($service_name);
		self::set_password($service_name,$password);
		
		return;
	} // end function: update_password
	
	
	/**
	 * delete_password function.
	 * 
	 * @access public
	 * @static
	 * @param string $service_name (default: '')
	 * @return void
	 */
	public function delete_password($service_name = ''){
		
		exec('security 2>&1 >/dev/null delete-generic-password -a '.$service_name.' -s "Login: '.$service_name.'" >/dev/null');
		
		return;
		
	} //end function: delete_password
	
	
	/**
	 * get_password function.
	 * 
	 * @access public
	 * @static
	 * @param string $service_name (default: '')
	 * @return void
	 */
	public function get_password($service_name = ''){
		
		$output = array();
		exec('security 2>&1 >/dev/null find-generic-password -ga '.$service_name,$output);
				
		if($output[0] && $output[0] !="security: SecKeychainSearchCopyNext: The specified item could not be found in the keychain."){
		
			$password = $output[0];			
			$password = str_replace('"', '',$password);
			$password = str_replace('password: ', '',$password);
			
			return $password;
			
		}
		
		return false;
		
	} //end function: get_password
	
} //end class: Keychain





	