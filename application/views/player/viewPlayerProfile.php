<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">

        <section class="py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-header">
                            <img src="img/avatar-1.jpg" alt="..." style="max-width: 3rem"
                                class="rounded-circle mx-3 my-2 my-lg-0" />
                            <h2 class="h6 mb-0 text-uppercase">Profile</h2>
                        </div>

                        <div class="card-body">
<!--  -->
                <?php
                
                 foreach($data as $row){
                    ?>
                            <div
                                class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                <div class="left d-flex align-items-center">


                                    <div class="icon icon-lg shadow mr-3 text-gray">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span>ID</span><span class="dot dot-sm ml-2 bg-violet"></span>
                                        </h6>

                                    </div>
                                </div>
                                <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-violet">
                                    <h5><?=$row->id?></h5>
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                <div class="left d-flex align-items-center">
                                    <div class="icon icon-lg shadow mr-3 text-gray">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span>Name</span><span class="dot dot-sm ml-2 bg-green"></span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-green">
                                    <h5><?=$row->name?></h5>
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                <div class="left d-flex align-items-center">
                                    <div class="icon icon-lg shadow mr-3 text-gray">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span>DOB</span><span class="dot dot-sm ml-2 bg-blue"></span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-blue">
                                    <h5><?=$row->DOB?></h5>
                                </div>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                                <div class="left d-flex align-items-center">
                                    <div class="icon icon-lg shadow mr-3 text-gray">
                                        <i class="fas fa-clipboard-check"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span>Position</span><span class="dot dot-sm ml-2 bg-red"></span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-red">
                                    <h5><?=$row->position?></h5>
                                </div>
                            </div>
                            <?php
                 }
                ?>

                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div
                        class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                            <div class="dot mr-3 bg-blue"></div>
                            <?php echo "<a href='updatedata?id=".$row->id."'>Update</a>";?>
                        </div>
                        <div class="icon bg-blue text-white">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                    </div>
                    <div
                        class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                            <div class="dot mr-3 bg-green"></div>
                            <div class="text">
                            <form method="post" action="http://localhost:8080/Paypal">
                            <input hidden value="1" name="id">
                            <input type="SUBMIT"
                               value="Membership Fee" class="bg-gray-100 roundy px-4 py-1 mr-0 mr-lg-3 mt-2 mt-lg-0 text-dark exclode">
                               </form>
                                <div class="text-gray">Online payment</div>
                            </div>
                        </div>
                        <div class="icon bg-green text-white">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <!-- ?> -->

                </div>
            </div>
        </section>


        <!-- Update Form-->
        <div class="col-lg-4 mb-5">

            <div class="card-body">

                <!-- Update-->
                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
                    class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="exampleModalLabel" class="modal-title">Update Profile</h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <?php 
                        foreach($data as $row)
                        {
                        ?>
                                <form>
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" 
                                            value="<?php echo $row->id; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo $row->name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="date" name="DOB" class="form-control"
                                            value="<?php echo $row->DOB; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" name="position" class="form-control"
                                            value="<?php echo $row->position; ?>">
                                    </div>
                                </form>
                                <?php }; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                <input type="submit" class="btn btn-danger" name="update" value="Update Record"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>