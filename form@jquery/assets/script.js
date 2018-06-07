$(document).ready(function() {
    $('#form').submit(function(e) {
        e.preventDefault();
        var obj = {
            name: {
                fname: $('input#fname').val(),
                lname: $('input#lname').val(),
            },
            Age:$('input#age').val(),
            Gender: $('input[name=gen]:checked').val(),
            dob: $('input#dob').val(),
            password: $('input#password').val(),
            favoriteplace: $('select#place').val(),
            email: $('input#email').val(),
            phone: $('input#phone').val(),
            Hobbies: {
                hobbies1: $('input#hobbies1:checked').val(),
                hobbies2: $('input#hobbies2:checked').val(),
                hobbies3: $('input#hobbies3:checked').val(),
                hobbies4: $('input#hobbies4:checked').val(),
            },
            
        }
        alert('Thank You');
        console.log(obj);
    });
});