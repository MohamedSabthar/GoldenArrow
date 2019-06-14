<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">

        <section class="py-5">

            <div class="row">

                <!-- search player form -->
                <div class="col-lg-6 mb-5">

                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Search Player</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" method="POST" action="/accountant/">
                                <div class="form-group">
                                    <label for="playerName" class="sr-only">Name</label>
                                    <input id="playerName" type="text" placeholder="Name" class="mr-3 form-control"
                                        name="playerName">
                                </div>
                                <div class="form-group">
                                    <label for="playerId" class="sr-only">Player ID</label>
                                    <input id="playerId" type="text" placeholder="Player ID" class="mr-3 form-control"
                                        name="playerId">
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="o-search-magnify-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>






                    <?php if (!empty($playerHistory)):?>

                    <!-- player payment history -->
                    <?php print_r($playerHistory[0])?>
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-uppercase mb-0"><?=$playerHistory[0]->userName."'s Payment"?><span
                                    class="float-right">
                                    <button type="button" data-toggle="modal" data-target="#addPayment"
                                        class="btn btn-outline-primary" onClick="setIdToAddPaymentModel('<?=$playerHistory[0]->userId?>')"
                                        style="font-size:0.7rem">
                                        Add Payment
                                    </button>
                                    
                                    <form method="POST" action="" class="d-inline">
                                                <input name="paymentId" type="hidden" value=<?=$playerHistory[0]->userId?> />
                                                
                                                <button type="button" 
                                        class="btn btn-outline-danger mr-2" onClick=""
                                        style="font-size:0.7rem">
                                        Block
                                    </button>
                                            </form>





                                   
                                    <?= "Id :".$playerHistory[0]->userId?></span></h6>
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
                                    <?php $i=1; foreach ($playerHistory as $records) :?>

                                    <tr>
                                        <th scope="row"><?=$i++?></th>
                                        <td><?=$records->ammount?></td>
                                        <td><?=$records->paymentDate?></td>
                                        <td><?=$records->paymentType?></td>
                                        <td>
                                            <!-- update button -->
                                            <button type="button" data-toggle="modal" data-target="#myModal"
                                                class="btn btn-outline-primary"
                                                onClick="pass('<?=$records->ammount?>','<?=$records->paymentDate?>','<?=$records->paymentType?>','<?=$records->paymentId?>')">
                                                <i class="far fa-edit "></i>
                                            </button>
                                            <!-- delete button -->
                                            <form method="POST" action="/accountant/delete" class="d-inline">
                                                <input name="paymentId" type="hidden" value=<?=$records->paymentId?> />
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                    <?php endforeach;?>

                        </div>


                        </tbody>
                        </table>
                    </div>
                </div>

                <?php else:?>

                <div class="card">
                    <div class="card-body">
                        <p class="text-center">No records found enter Player-Id or Name to search</p>
                    </div>

                </div>

                <?php endif?>
            </div>






            <!-- Current month payment table -->
            <div class="col-lg-6 mb-5">
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
                                <?php foreach ($paymentsForThisMonth as $records) :?>

                                <tr>
                                    <th scope="row"><?=$records->playerId?></th>
                                    <td><?=$records->ammount?></td>
                                    <td><?=$records->paymentDate?></td>
                                    <td><?=$records->paymentType?></td>
                                    <td>
                                        <!-- update button -->
                                        <button type="button" data-toggle="modal" data-target="#myModal"
                                            class="btn btn-outline-primary"
                                            onClick="pass('<?=$records->ammount?>','<?=$records->paymentDate?>','<?=$records->paymentType?>','<?=$records->paymentId?>')">
                                            <i class="far fa-edit "></i>
                                        </button>
                                        <!-- delete button -->
                                        <form method="POST" action="/accountantController/deletePaymentRecord"
                                            class="d-inline">
                                            <input name="paymentId" type="hidden" value=<?=$records->paymentId?> />
                                            <button type="submit" class="btn btn-outline-danger"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                <?php endforeach;?>



                            </tbody>
                        </table>

                        <p><?=$links?></p>
                    </div>
                </div>

                <div class="col mt-4">
                    <div
                        class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                            <div class="dot mr-3 bg-blue"></div>
                            <div class="text">
                                <h6 class="mb-0">Number of payments</h6>
                                <span class="text-gray"><?=$noOfPayments?></span>
                            </div>
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
                                <h6 class="mb-0">Total payment</h6>
                                <span class="text-gray"><?=$totalPayment.".00/="?></span>
                            </div>
                        </div>
                        <div class="icon bg-green text-white">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>

                </div>



            </div>
        </section>



        <!-- Update payment model -->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left"
            style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Upadate Payment</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/accountantController/updatePaymentRecord">
                            <input type="hidden" name="paymentId" id="paymentId">
                            <div class="form-group">
                                <label>Ammount</label>
                                <input name="ammount" id="ammount" type="number" placeholder="Ammount"
                                    class="form-control" required>
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

        <!-- Add payment model -->
        <div id="addPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left"
            style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Add Payment</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/accountantController/addPaymentRecord">
                            <input type="hidden" name="playerId" id="addPlayertId">
                            <div class="form-group">
                                <label>Ammount</label>
                                <input name="ammount" id="ammount" type="number" placeholder="Ammount"
                                    class="form-control" required>
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


        <script>
        //script to set values to the modal
        function pass(ammount, paymentDate, paymentType, paymentId) {
            document.getElementById("ammount").value = ammount;
            document.getElementById("paymentDate").value = paymentDate;
            document.getElementById("paymentType").value = paymentType;
            document.getElementById("paymentId").value = paymentId;
        }

        function setIdToAddPaymentModel(playerId){
            document.getElementById("addPlayertId").value = playerId;
            console.log(playerId)
        }
        </script>