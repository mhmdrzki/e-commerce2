<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>Setting Admin</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>

                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->

                <div id="form_sample_2" class="form-horizontal">
                    <div id="box" class="alert alert-success hide">
                        Data Berhasil Diupdate
                    </div>
                    <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $id_admin;?>">


                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input type="text" name="nama" id="nama" class="span6 m-wrap" value="<?php echo $nama;?>"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" id="username" class="span6 m-wrap" value="<?php echo $username;?>"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="password"  class="span6 m-wrap" value=""/>
                        </div>
                    </div>
                    



                    <div class="form-actions">
                        <button type="submit" id="update" class="btn green"><i class="icon-ok"></i> Update</button>

                    </div>
                </div>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){

        $("#update").click(function(){



            var id_admin = $("#id_admin").val();
            var nama = $("#nama").val();
            var username = $("#username").val();
            var password = $("#password").val();

            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>adminweb/admin_edit",
                data:"id_admin="+id_admin+"&nama="+nama+"&username="+username+"&password="+password,
                success:function(data) {
                    $("#box").show();


                }
            });



        });

    });
</script>