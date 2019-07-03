<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">
                <div class="col-lg-6 mb-3">

                <!-- search player form -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Search Players</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" method="POST" action="/accountant/players">
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
                    <!-- end of search player form -->

                    <div style="height:550px;overflow-y:scroll">
                        <?php if (!empty($searchPlayers) && $searchPlayers!=-1):?>
                        <!-- player search result -->
                        <h3 class="h6 text-uppercase mb-0 text-center m-4">Search result</h3>
                        <?php foreach ($searchPlayers as $player):?>
                        <div class="col">
                            <a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                                <div class="row">
                                    <div
                                        class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                                        <strong class="h5 mb-0"><sup class="smaller text-gray font-weight-normal">ID
                                            </sup><?=$player->userId?></strong><img src="/img/avatar-4.jpg" alt="..."
                                            style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                                        <h6 class="mb-0"><?=$player->userName?></h6>
                                    </div>
                                    <div
                                        class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left ">

                                        <p class="mb-0 mt-3 mt-lg-0 mx-5">
                                        <button type="button" data-toggle="modal" data-target="#addPayment"
                                        class="ml-3 btn btn-outline-success"
                                        onClick="setIdToAddPaymentModel('<?=$player->userId?>')"
                                        style="font-size:0.7rem">
                                        Add Payment
                                    </button>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach?>
                        <!-- end of player search result -->

                        <?php elseif ($searchPlayers==-1):?><!-- if not input presented -->
                        <div class="card ">
                            <div class="card-body">
                                <p class="text-center text-danger">Name or Player Id needed</p>
                            </div>
                        </div>
                        <?php else:?><!-- if no result found -->
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">No Matches found</p>
                            </div>
                        </div>
                        <?php endif?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if (!empty($players)):?>
                    <!-- player list -->
                    <h3 class="h6 text-uppercase mb-0 text-center mb-2">All Players</h3>
                    <?php foreach ($players as $player):?>
                    <div class="col">
                        <a href="#" class="message card px-5 py-3 mb-4 bg-hover-gradient-primary no-anchor-style">
                            <div class="row">
                                <div
                                    class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                                    <strong class="h5 mb-0"><sup class="smaller text-gray font-weight-normal">ID
                                        </sup><?=$player->userId?></strong><img src="/img/avatar-4.jpg" alt="..."
                                        style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                                    <h6 class="mb-0"><?=$player->userName?></h6>
                                </div>
                                <div
                                    class="col-lg-9 d-flex align-items-center flex-column flex-lg-row text-center text-md-left ">

                                    <p class="mb-0 mt-3 mt-lg-0 mx-5">
                                    <button type="button" data-toggle="modal" data-target="#addPayment"
                                        class="ml-3 btn btn-outline-success"
                                        onClick="setIdToAddPaymentModel('<?=$player->userId?>')"
                                        style="font-size:0.7rem">
                                        Add Payment
                                    </button>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach?>
                    <!--Pagination Links-->
                    <p><?=$links?></p>
                    <!--end of player list -->
                    <?php endif?>
                </div>
        </section>


        <!-- Add payment model -->
        <div id="addPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            class="modal fade text-left" style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Add Payment</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/accountant/add">
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
        <!-- end of Add payment model -->

    </div>
</div>

<script>
function setIdToAddPaymentModel(playerId) {
            document.getElementById("addPlayertId").value = playerId;
            console.log(playerId)
        }

        </script>