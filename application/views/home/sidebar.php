<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->


            <?php

            foreach ($kategori->result_array() as $value) {?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="<?php echo base_url();?>home/kategori/<?php echo $value['id_kategori'];?>"><?php echo $value['nama_kategori'];?></a></h4>
                    </div>
                </div>
                <?php
            }
            ?>



        </div><!--/category-products-->


        </br>







    </div>
</div>