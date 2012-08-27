<?php


function tml_registration_errors( $errors ) {
// FIRST NAME
	if ( empty( $_POST['first_name'] ) ) {
		$errors->add( 'empty_first_name', '<strong>ERROR</strong>: Please type your first name.' );	
	}
	if ( !empty( $_POST['first_name'] ) ) {	
		$value_first_name = $_POST['first_name'];
		$value_first_name = stripslashes($value_first_name);
		
		if (strlen($value_first_name) > '16') {
			$errors->add( 'maxlength_first_name', '<strong>ERROR</strong>: Please enter a first name with 16 or fewer characters.' );
		}		
		elseif (!preg_match("/^[a-zA-Z '-]+$/", $value_first_name)) {
			$errors->add( 'invalid_first_name', '<strong>ERROR</strong>: Please enter a first name using only letters, space, hyphen, and apostrophe.' );
		}
	}

// LAST NAME
	if ( empty( $_POST['last_name'] ) ) {
		$errors->add( 'empty_last_name', '<strong>ERROR</strong>: Please type your last name.' );	
	}
	if ( !empty( $_POST['last_name'] ) ) {	
		$value_last_name = $_POST['last_name'];
		$value_last_name = stripslashes($value_last_name);

		if (strlen($value_last_name) > '30') {
			$errors->add( 'maxlength_last_name', '<strong>ERROR</strong>: Please enter a last name with 30 or fewer characters.' );
		}		
		elseif (!preg_match("/^[a-zA-Z '-]+$/", $value_last_name)) {
			$errors->add( 'invalid_last_name', '<strong>ERROR</strong>: Please enter a last name using only letters, space, hyphen, and apostrophe.' );
		}
	}




	return $errors;
}
add_filter( 'registration_errors', 'tml_registration_errors' );


function tml_user_register( $user_id ) {
	if ( !empty( $_POST['first_name'] ) )
		update_user_meta( $user_id, 'first_name', $_POST['first_name'] );
	if ( !empty( $_POST['last_name'] ) )
		update_user_meta( $user_id, 'last_name', $_POST['last_name'] );
}
add_action( 'user_register', 'tml_user_register' );

?>