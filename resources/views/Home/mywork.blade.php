<input type="text" class="form-control" placeholder="Enter Your Name" name="name" id="name" required
    onchange="Validatename()" ;>
<label class="errortext" style="display:nne; color:red" id="name_l"></label><br>
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
<input type="text" id="place" name="place" onkeyup="capitalize(this.id, this.value);" placeholder="Enter Your Place"
    class="form-control1" onchange="Validateplace();" required>
<label class="errortext" style="display:none; color:red" id="place_1"></label><br>
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
<input type="text" id="place" name="place" onkeyup="this.value=this.value.toUpperCase();" placeholder="Enter Your Place"
    class="form-control1" onchange="Validateplace();" required>
<!-- large modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Modal Body</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Small Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Modal Body</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
