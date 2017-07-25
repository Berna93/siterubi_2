<!-- Include Mask plugin -->
<script src="//cdnjs.com/libraries/jquery.mask"></script>

<form id="maskForm" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-3 control-label">IP address</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="ipAddress" />
        </div>
    </div>
</form>

<script>
$(document).ready(function(){
  $('.ipAddress').mask('00/00/0000');
});
</script>