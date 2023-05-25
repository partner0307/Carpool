const form = $('#editPassword');

form.validate({
    rules: {
        'newPassword': {required: true},
        'confirmPassword': {required: true, equalTo: '#newPassword'}
    }
});

form.on('submit', e => {
    e.preventDefault();

    const model = {
        id: $('#user_id').val(),
        password: $('#newPassword').val()
    }
    $.post('/dashboard/user/change', model).then(res => {
        if(res > 0) {
            $('#newPassword').val('');
            $('#confirmPassword').val('');
            toastr['success']('New Password has been saved successfully.', 'Success!', {
                closeButton: true, tapToDismiss: false
            });
        } else {
            toastr['error']('Failed to save.', 'Failed!', {
                closeButton: true, tapToDismiss: false
            });
        }
    })
})
