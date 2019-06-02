<label class="imglabel">Upload Your Image</label>
<input type="file" value='{{ $data[0]->image }}' class="form-control" id="pic" accept=".png, .jpg, .jpeg,.JPG"
    name="pic" required onchange="ValidateFileUpload();">
<label class="errortext" style="display:none; color:red" id="pic_1"></label><br>
<script>
    function ValidateFileUpload() {
        var fuData = document.getElementById('pic');
        var FileUploadPath = fuData.value;

        //To check if user upload any file
        if (FileUploadPath == '') {
            $("#pic_1").html('Select An Image..!').fadeIn().delay(4000).fadeOut();

        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

            //The file uploaded is an image

            if (Extension == "png" || Extension == "JPG" || Extension == "jpeg" || Extension == "jpg") {}


            //The file upload is NOT an image
            else {
                $("#pic_1").html('Photo only allows file types of PNG, JPG, JPEG...!').fadeIn().delay(4000).fadeOut();
                document.getElementById('pic').value = "";

            }
        }
    }

</script>
