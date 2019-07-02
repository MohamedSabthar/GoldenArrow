<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">
                <div class="col-lg-6 mb-3">

                    <!-- search trainer form -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Search Trainers</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" method="POST" action="/accountant/trainers">
                                <div class="form-group">
                                    <label for="trainerName" class="sr-only">Name</label>
                                    <input id="trainerName" type="text" placeholder="Name" class="mr-3 form-control"
                                        name="trainerName">
                                </div>
                                <div class="form-group">
                                    <label for="trainerId" class="sr-only">Trainer ID</label>
                                    <input id="trainerId" type="text" placeholder="Trainer ID" class="mr-3 form-control"
                                        name="trainerId">
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="o-search-magnify-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end of search trainer form -->

                    <div style="height:550px;overflow-y:scroll">
                        <?php if (!empty($searchTrainers) && $searchTrainers!=-1):?>
                        <!-- trainer search result -->
                        <h3 class="h6 text-uppercase mb-0 text-center m-4">Search result</h3>
                        <?php foreach ($searchTrainers as $trainer):?>
                        <div class="col">
                            <a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                                <div class="row">
                                    <div
                                        class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                                        <strong class="h5 mb-0"><sup class="smaller text-gray font-weight-normal">ID
                                            </sup><?=$trainer->userId?></strong><img src="/img/avatar-4.jpg" alt="..."
                                            style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                                        <h6 class="mb-0"><?=$trainer->userName?></h6>
                                    </div>
                                    <div
                                        class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left ">

                                        <p class="mb-0 mt-3 mt-lg-0 mx-5">
                                            <button type="button" data-toggle="modal" data-target="#history"
                                                class="ml-3 mb-1 btn btn-outline-secondary"
                                                onClick="viewHistory('<?=$trainer->userId?>')" style="font-size:0.7rem">
                                                View
                                            </button>
                                            <button type="button" data-toggle="modal" data-target="#addPayment"
                                                class="ml-3 btn btn-outline-success"
                                                onClick="setIdToAddPaymentModel('<?=$trainer->userId?>')"
                                                style="font-size:0.7rem">
                                                Pay Salary
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach?>
                        <!-- end of trainer search result -->

                        <?php elseif ($searchTrainers==-1):?>
                        <!-- if not input presented -->
                        <div class="card ">
                            <div class="card-body">
                                <p class="text-center text-danger">Name or Trainer Id needed</p>
                            </div>
                        </div>
                        <?php else:?>
                        <!-- if no result found -->
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">No Matches found</p>
                            </div>
                        </div>
                        <?php endif?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if (!empty($trainers)):?>
                    <!-- trainer list -->
                    <h3 class="h6 text-uppercase mb-0 text-center mb-2">All Trainers</h3>
                    <?php foreach ($trainers as $trainer):?>
                    <div class="col">
                        <a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                            <div class="row">
                                <div
                                    class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                                    <strong class="h5 mb-0"><sup class="smaller text-gray font-weight-normal">ID
                                        </sup><?=$trainer->userId?></strong><img src="/img/avatar-4.jpg" alt="..."
                                        style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                                    <h6 class="mb-0"><?=$trainer->userName?></h6>
                                </div>
                                <div
                                    class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left ">

                                    <p class="mb-0 mt-3 mt-lg-0 mx-5">
                                        <button type="button" data-toggle="modal" data-target="#addPayment"
                                            class="ml-3 btn btn-outline-success"
                                            onClick="setIdToAddPaymentModel('<?=$trainer->userId?>')"
                                            style="font-size:0.7rem">
                                            Pay Salary
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach?>
                    <!--Pagination Links-->
                    <p><?=$links?></p>
                    <!--end of trainer list -->
                    <?php endif?>
                </div>
        </section>


        <!-- pay Salary model -->
        <div id="addPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            class="modal fade text-left" style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Pay Salary</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/accountant/trainer/add">
                            <input type="hidden" name="trainerId" id="addTrainerId">
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
                                    <option value="BANK">bank transfer</option>
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
        <!-- end of pay salary model -->


        <!-- history model -->
        <div id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left"
            style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Salay History</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body" style="height:450px; overflow-y:scroll;">

                        <table class="table table-hover card-text">
                            <thead>
                                <tr>
                                    <th>Ammount</th>
                                    <th>Date</th>
                                    <th>Method</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="salaryHistory">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- end of pay salary model -->





        <!-- Update payment model -->
        <div id="updatePayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            class="modal fade text-left" style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Upadate salary Payment</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/accountant/update">
                            <input type="hidden" name="salaryId" id="salaryIdUpdate">
                            <div class="form-group">
                                <label>Ammount</label>
                                <input name="ammount" id="ammountUpdate" type="number" placeholder="Ammount"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="paymentDate" id="paymentDateUpdate" type="date" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Payment Method</label>
                                <select name="paymentType" id="paymentTypeUpdate" class="form-control">
                                    <option value="CASH">cash</option>
                                    <option value="BANK">bank transfer</option>
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


    </div>
</div>

<script>
function setIdToAddPaymentModel(trainerId) {
    document.getElementById("addTrainerId").value = trainerId;
    console.log(trainerId)
}

function viewHistory(trainerId) {
    $.post('/trainerPaymentController/viewSalaryHistory', {
            trainerId
        },
        function(result) {
            $('#salaryHistory').html(result);
            console.log(result);
        });

}

function pass(ammount, paymentDate, salarytId) {
    console.log(paymentDate);
    console.log(ammount);
    document.getElementById("ammountUpdate").value = ammount;
    document.getElementById("paymentDateUpdate").value = paymentDate;

    document.getElementById("salaryIdUpdate").value = salarytId;
}
</script>