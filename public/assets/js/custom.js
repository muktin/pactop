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

function CheckValidaRoleCheckBox(){
	if($('.roleassign:checked').length == 0){
		$('.alerts').html('<span style="color:red">You must check at least one role!!!</span>');
		return false;
	}
}

function CheckValidaCheckBoxPermission(){
	
	if($('.permissionassign:checked').length == 0){
		$('.alerts').html('<span style="color:red">You must check at least one permossion!!!</span>');
		return false;
	}
	
}

function UserAjaxCallActiveDeactive(id){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var text = $(this).html();
	let isActive = confirm("Do you want Active/Inactive?");
	 
	if(isActive == true){
		$.ajax({
			url: "ajaxCallActiveDeactive",
			method: 'get',
			data: {
				id: id,
			  },
			  success: function(result){
				location.reload(true);
			  }
		});
	}  
}

function RoleAjaxCallActiveDeactive(id){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let isActive = confirm("Do you want Active/Inactive?");
	 
	if(isActive == true){
		$.ajax({
			url: "ajaxCallActiveDeactive",
			method: 'POST',
			data: {
				id: id,
			  },
			  success: function(result){
				  alert(result);
				  return false
				//location.reload(true);
			  }
		});
	}  
}

function RoleAjaxCallActiveDeactive(id){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let isActive = confirm("Do you want Active/Inactive?");
	 
	if(isActive == true){
		$.ajax({
			url: "ajaxCallActiveDeactive",
			method: 'POST',
			data: {
				id: id,
			  },
			  success: function(result){
				location.reload(true);
			  }
		});
	}  
}

function PermissionAjaxCallActiveDeactive(id){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let isActive = confirm("Do you want Active/Inactive?");
	 
	if(isActive == true){
		$.ajax({
			url: "ajaxCallActiveDeactive",
			method: 'POST',
			data: {
				id: id,
			  },
			  success: function(result){
				location.reload(true);
			  }
		});
	}  
}

function InstituteAjaxCallActiveDeactive(id){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	let isActive = confirm("Do you want Active/Inactive?");
	 
	if(isActive == true){
		$.ajax({
			url: "ajaxCallActiveDeactive",
			method: 'POST',
			data: {
				id: id,
			  },
			  success: function(result){
				location.reload(true);
			  }
		});
	}  
}



