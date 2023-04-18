
$(document).ready(function (e) {
    //upload image  

    $("#imageMain").on("change", function (e) {
        // $("#imageUploadForm").submit();
        const {
            files
        } = event.target;
        var formData = new FormData;
        e.preventDefault();
        formData.append('imageFile', files[0]);
        $.ajax({
            url: 'uploadImage',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                console.log("success");
                //console.log(data);
                console.log(JSON.parse(data));
                var dataReturn = JSON.parse(data);

                document.getElementById('uploadImageFinished').setAttribute("src", dataReturn['image']);
                document.getElementById('miniAvatar').setAttribute("src", dataReturn['image']);
            },
            error: function (xhr, status, error) {
                console.log(error);
            },
            finally: function () {

            }
        });

    });

    function myProgressHandler(event) {
        //your code to track upload progress
        var p = Math.floor(event.loaded / event.total * 100);
        document.title = p + '%';
    }

    function myOnLoadHandler(event) {
        // your code on finished upload
        alert(event.target.responseText);
    }

    /////////////////////////////////////////////////////////////////////////////////
    // Edit profile

    var imageFile;
    $('#imageChange').on("change", function (e) {
        const {
            files
        } = event.target;

        e.preventDefault();
        imageFile = files[0];
    });
    $('.buttonAjax').on('click', function (e) {
        e.preventDefault();
        var updateFormData = new FormData();
        updateFormData.append('imageFile', imageFile);
        updateFormData.append('firstName', $('.firstName').val());
        updateFormData.append('lastName', $('.lastName').val());
        updateFormData.append('email', $('.email').val());
        updateFormData.append('phone', $('.phone').val());
        updateFormData.append('address', $('.address').val());

        $.ajax({
            url: 'editProfile',
            type: 'POST',
            data: updateFormData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                var dataReturn = JSON.parse(data);
                console.log(dataReturn);

                // anh co loi
                if (dataReturn['errors']['image']) {
                    document.getElementById('image-warning').innerHTML = dataReturn['errors']['image'];
                } else {
                    console.log(1);
                    document.getElementById('image-warning').innerHTML = '';
                    $('#staticBackdrop').hide();
                    $('.modal-backdrop').hide();
                    document.getElementById('uploadImageFinished').setAttribute("src", dataReturn['image']);
                    document.getElementById('miniAvatar').setAttribute("src", dataReturn['image']);

                    document.getElementById("fullNameMain").innerHTML = dataReturn['firstName'] + ' ' + dataReturn['lastName'];
                    document.getElementById("nameTitle").innerHTML = dataReturn['firstName'] + ' ' + dataReturn['lastName'];
                    document.getElementById("navbarName").innerHTML = dataReturn['firstName'] + ' ' + dataReturn['lastName'];
                    document.getElementById("emailMain").innerHTML = dataReturn['email'];
                    document.getElementById("emailTitle").innerHTML = dataReturn['email'];
                    document.getElementById("phoneMain").innerHTML = dataReturn['phone'];
                    document.getElementById("addressMain").innerHTML = dataReturn['address'];
                }


            },
            error: function (xhr, status, error) {
                console.log(error);
            },
            finally: function () {

            }
        });
    });
});
