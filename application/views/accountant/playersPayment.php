<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <!-- search player -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Search Player Payments</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" method="POST" action="/accountant/payments">
                                <div class="form-group">
                                    <label for="playerName" class="sr-only">Name</label>
                                    <input id="playerName" type="text" placeholder="Name" class="mr-3 form-control" name="playerName">
                                </div>
                                <div class="form-group">
                                    <label for="playerId" class="sr-only">Player ID</label>
                                    <input id="playerId" type="text" placeholder="Player ID" class="mr-3 form-control" name="playerId">
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="o-search-magnify-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end of search player -->

                    <!-- notification for account block -->
                    <?php if ($this->session->flashdata('block')) : ?>
                        <small class="d-block text-uppercase alert alert-success text-center p-2 mb-3">
                            <?= $this->session->flashdata('block') ?>
                        </small>

                    <?php endif ?>

                    <?php if (!empty($playerHistory) && $playerHistory != -1) : ?>
                        <!-- player payment history -->
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-uppercase mb-0"><?= $playerHistory[0]->userName . "'s Payment" ?><span class="float-right">
                                        <button type="button" data-toggle="modal" data-target="#addPayment" class="btn btn-outline-primary" onClick="setIdToAddPaymentModel('<?= $playerHistory[0]->userId ?>')" style="font-size:0.7rem">
                                            Add Payment
                                        </button>



                                        <form method="POST" action="/accountant/block" class="d-inline">
                                            <input name="paymentId" type="hidden" value=<?= $playerHistory[0]->userId ?> />
                                            <input name="accountStatus" type="hidden" value=<?= $playerHistory[0]->accountStatus ?> />

                                            <button type="submit" class=" <?php if ($playerHistory[0]->accountStatus == 1) : ?>
                                                                    <?= "btn btn-outline-danger  mr-2" ?>
                                                            <?php else : ?>
                                                                    <?= " btn btn-outline-success  mr-2" ?>
                                                            <?php endif ?>" style="font-size:0.7rem">
                                                <?php if ($playerHistory[0]->accountStatus == 1) : ?>
                                                    <!-- if account is active -->
                                                    Block
                                                <?php else : ?>
                                                    <!-- if account is not active -->
                                                    UnBlock
                                                <?php endif ?>
                                            </button>
                                        </form>
                                        <?= "Id : " . $playerHistory[0]->userId ?>
                                </h6>
                            </div>
                            <div class="card-body" style="height:400px;overflow-y: scroll">
                                <table class="table table-hover card-text">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ammount</th>
                                            <th>Date</th>
                                            <th>Method</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($playerHistory as $records) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++ ?></th>
                                                <td><?= $records->ammount ?></td>
                                                <td><?= $records->paymentDate ?></td>
                                                <td><?= $records->paymentType ?></td>
                                                <td>
                                                    <!-- update button -->
                                                    <button type="button" data-toggle="modal" data-target="#updatePayment" class="btn btn-outline-primary" onClick="pass('<?= $records->ammount ?>','<?= $records->paymentDate ?>','<?= $records->paymentType ?>','<?= $records->paymentId ?>')">
                                                        <i class="far fa-edit "></i>
                                                    </button>
                                                    <!-- delete button -->
                                                    <form method="POST" action="/accountant/delete" class="d-inline">
                                                        <input name="paymentId" type="hidden" value=<?= $records->paymentId ?> />
                                                        <button onClick="return confirm('Are you sure you want to Delete ?')" type="submit" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end of player payment history -->

                    <?php elseif ($playerHistory == -1) : ?>
                        <!-- if no input presented -->
                        <div class="card ">
                            <div class="card-body">
                                <p class="text-center text-danger">Name or Player Id needed</p>
                            </div>
                        </div>
                    <?php else : ?>
                        <!-- if no matched records found -->
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">No payment history</p>
                            </div>
                        </div>
                    <?php endif ?>
                </div>


                <div class="col-lg-6 mb-5">
                    <?php if (!empty($paymentsForThisMonth)) : ?>

                        <!-- Current month payment  -->
                        <div class="card">
                            <div class="card-header">
                                <h6 class="text-uppercase mb-0">This month Payments</h6>
                            </div>
                            <div class="card-body" style="height:450px;overflow-y:scroll;">
                                <table class="table table-hover card-text">
                                    <thead>
                                        <tr>
                                            <th>Player Id</th>
                                            <th>Ammount</th>
                                            <th>Date</th>
                                            <th>Method</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paymentsForThisMonth as $records) : ?>
                                            <tr>
                                                <th scope="row"><?= $records->playerId ?></th>
                                                <td><?= $records->ammount ?></td>
                                                <td><?= $records->paymentDate ?></td>
                                                <td><?= $records->paymentType ?></td>
                                                <td>
                                                    <!-- update button -->
                                                    <button type="button" data-toggle="modal" data-target="#updatePayment" class="btn btn-outline-primary" onClick="pass('<?= $records->ammount ?>','<?= $records->paymentDate ?>','<?= $records->paymentType ?>','<?= $records->paymentId ?>')">
                                                        <i class="far fa-edit "></i>
                                                    </button>
                                                    <!-- delete button -->
                                                    <form method="POST" action="/accountant/delete" class="d-inline">
                                                        <input name="paymentId" type="hidden" value=<?= $records->paymentId ?> />
                                                        <button onClick="return confirm('Are you sure you want to Delete ?')" type="submit" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!--Pagination Links-->
                                <p><?= $links ?></p>
                            </div>
                        </div>
                        <!-- end of current month payment -->

                    <?php else : ?>
                        <!-- if no payments found for current month -->
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">No Payments Yet</p>
                            </div>
                        </div>
                    <?php endif ?>


                    <div class="col mt-4">

                        <!-- Number of players paid for current month -->
                        <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <div class="dot mr-3 bg-blue"></div>
                                <div class="text">
                                    <h6 class="mb-0">Number of payments</h6>
                                    <span class="text-gray"><?= $noOfPayments ?></span>
                                </div>
                            </div>
                            <div class="icon bg-blue text-white">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                        </div>
                        <!--end of Number of players paid for current month -->

                        <!-- Total payment for current month -->
                        <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                            <div class="flex-grow-1 d-flex align-items-center">
                                <div class="dot mr-3 bg-green"></div>
                                <div class="text">
                                    <h6 class="mb-0">Total payment</h6>
                                    <span class="text-gray"><?= $totalPayment . ".00/=" ?></span>
                                </div>
                            </div>
                            <div class="icon bg-green text-white">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <!-- end of Total payment for current month -->

                    </div>
                </div>
            </div>
        </section>



        <!-- Update payment model -->
        <div id="updatePayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Upadate Payment</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/accountant/update">
                            <input type="hidden" name="paymentId" id="paymentId">
                            <div class="form-group">
                                <label>Ammount</label>
                                <input name="ammount" id="ammount" type="number" placeholder="Ammount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="paymentDate" id="paymentDate" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select name="paymentType" id="paymentType" class="form-control">
                                    <option value="CASH">cash</option>
                                    <option value="CARD">card</option>
                                    <option value="ONLINE">online</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary float-right">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--end of Update payment model -->

        <!-- Add payment model -->
        <div id="addPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Add Payment</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/accountant/add">
                            <input type="hidden" name="playerId" id="addPlayertId">
                            <div class="form-group">
                                <label>Ammount</label>
                                <input name="ammount" id="ammount" type="number" placeholder="Ammount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="paymentDate" id="paymentDate" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select name="paymentType" id="paymentType" class="form-control">
                                    <option value="CASH">cash</option>
                                    <option value="CARD">card</option>
                                    <option value="ONLINE">online</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-primary float-right">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- end of Add payment model -->
    </div>


    <script>
        //script to set values to the modal
        function pass(ammount, paymentDate, paymentType, paymentId) {
            document.getElementById("ammount").value = ammount;
            document.getElementById("paymentDate").value = paymentDate;
            document.getElementById("paymentType").value = paymentType;
            document.getElementById("paymentId").value = paymentId;
        }

        function setIdToAddPaymentModel(playerId) {
            document.getElementById("addPlayertId").value = playerId;
            console.log(playerId)
        }
    </script>