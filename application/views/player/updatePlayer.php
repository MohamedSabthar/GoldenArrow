<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">

        <section class="py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-header">
                            <img src="img/avatar-1.jpg" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0" />
                            <h2 class="h6 mb-0 text-uppercase">Update Player Profile</h2>
                        </div>

                        <div class="card-body">


                            <?php
                            foreach ($data as $row) {
                                ?>
                                <form method="post">
                                    <table class="table table-hover">
                                        <tr>
                                            <td width="230">Enter Your Name </td>
                                            <td width="329"><input type="text" name="name" value="<?php echo $row->name; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Enter Your DOB </td>
                                            <td><input type="text" name="DOB" value="<?php echo $row->DOB; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td>Enter Your Position </td>
                                            <td><input type="text" name="position" value="<?php echo $row->position; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" class="btn btn-danger" name="update" value="Update Record" /></td>
                                        </tr>
                                    </table>
                                </form>
                            <?php }; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>