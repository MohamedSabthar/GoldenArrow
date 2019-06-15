<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        <section class="py-5">
            <div class="row">


                <!-- search player form -->
                <div class="col-lg-6 mb-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="h6 text-uppercase mb-0">Search Players</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" method="POST" action="/players">
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


                    <div style="height:550px;overflow-y:scroll">


                        <?php if (!empty($searchPlayers) && $searchPlayers!=-1):?>
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
                                            Lorem
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach?>
                        <?php elseif ($searchPlayers==-1):?>
                        <div class="card ">
                            <div class="card-body">
                                <p class="text-center text-danger">Name or Player Id needed</p>
                            </div>
                        </div>
                        <?php else:?>
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
                                        Lorem
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach?>

                    <!--Pagination Links-->
                    <p><?=$links?></p>
                    <?php endif?>
                </div>
        </section>
    </div>
</div>