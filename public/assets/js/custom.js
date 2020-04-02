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
      swal({
          title: "Are you sure?",
          text: "",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
			
          if (isConfirm) {
			  swal({
              title: '',
              text: 'Status has been updated successfully!',
              icon: 'success'
            }).then(function() {
             $.ajax({
				url: "ajaxCallActiveDeactive",
				method: 'get',
				data: {id: id},
				success: function(result){
					$('.loader').show();
					location.reload(true);
				}
			});
            });
			
           
        } else {
            swal("Cancelled", "", "error");
          }
        });  
	}

function RoleAjaxCallActiveDeactive(id)
{
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
      swal({
          title: "Are you sure?",
          text: "",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
			
          if (isConfirm) {
			  swal({
              title: '',
              text: 'Status has been updated successfully!',
              icon: 'success'
            }).then(function() {
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
            });
			
           
        } else {
            swal("Cancelled", "", "error");
          }
        });  
	}

function PermissionAjaxCallActiveDeactive(id){
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
      swal({
          title: "Are you sure?",
          text: "",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
			
          if (isConfirm) {
			  swal({
              title: '',
              text: 'Status has been updated successfully!',
              icon: 'success'
            }).then(function() {
				$.ajax({
					url: "ajaxCallActiveDeactive",
					method: 'POST',
					data: {id: id},
					success: function(result){
						location.reload(true);
					}
				});
			});
        } else {
            swal("Cancelled", "", "error");
          }
        });  
}

function InstituteAjaxCallActiveDeactive(id){
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
      swal({
          title: "Are you sure?",
          text: "",
          icon: "warning",
          buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
          ],
          dangerMode: true,
        }).then(function(isConfirm) {
			
          if (isConfirm) {
			  swal({
              title: '',
              text: 'Status has been updated successfully!',
              icon: 'success'
            }).then(function() {
				$.ajax({
					url: "ajaxCallActiveDeactive",
					method: 'POST',
					data: {id: id},
					success: function(result){
						location.reload(true);
					}
				});
			});
        } else {
            swal("Cancelled", "", "error");
          }
        });  
}



