/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

// put user id for role and user mapping
function UserAssignRoleID(user_id){
	$("#mapping_user_id").val(user_id);	
}
// put role id for role and user mapping
function UserAssignPermissionID(permission_id){
	$("#mapping_role_id").val(permission_id);	
}

function CheckValidaCheckBox(){
	if($('.roleassign:checked').length == 0){
		alert('uuudfuho gaya');
		return false;
	}
	
	if($('.roleassign:checked').length == 0){
		alert('uuudfuho gaya');
		return false;
	}
	
	return false;
	/*
	
	
	*/
	
	
	
	
}



