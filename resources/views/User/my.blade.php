<div class="text-center">
        <h5 style="font-size:30px;"></h5><br>
</div>
 
    <label style="color:black; font-size: 17px;">Select Your Food Category :</label>

    <script>
            jQuery(document).ready(function () {
                jQuery('#name').keyup(function () {
                    var str = jQuery('#name').val();


                    var spart = str.split(" ");
                    for (var i = 0; i < spart.length; i++) {
                        var j = spart[i].charAt(0).toUpperCase();
                        spart[i] = j + spart[i].substr(1);
                    }
                    jQuery('#name').val(spart.join(" "));

                });
            });

        </script>


onkeyup="capitalize(this.id, this.value);"
<script>
    function capitalize(textboxid, str) {
        // string with alteast one character
        if (str && str.length >= 1) {
            var firstChar = str.charAt(0);
            var remainingStr = str.slice(1);
            str = firstChar.toUpperCase() + remainingStr;
        }
        document.getElementById(textboxid).value = str;
    }

</script>

<table class="table">
        onchange="ValidateFileUpload();"
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

                        if (Extension == "png" || Extension == "JPG" || Extension == "jpeg" ||
                            Extension == "jpg") {}


                        //The file upload is NOT an image
                        else {
                            $("#pic_1").html(
                                    'Photo only allows file types of PNG, JPG, JPEG...!')
                                .fadeIn().delay(4000).fadeOut();
                            document.getElementById('pic').value = "";

                        }
                    }
                }

            </script>