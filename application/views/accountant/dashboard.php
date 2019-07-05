<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">


        <section class="py-5">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div id="error" class="m-4"></div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="text-center text-uppercase">Generate Report</p>
                            <form id="report">
                                <div class="form-group">
                                    <label class="form-control-label text-uppercase">Start Date</label>
                                    <input type="date" name="startDate" id="startDate" placeholder="Report From"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label text-uppercase">End Date</label>
                                    <input type="date" name="endDate" id="endDate" placeholder="Report Until"
                                        class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col mt-4">
                    <div class="row" style="margin:0 auto;">
                        <button type="submit" onClick="generateMebershipReport()"
                            class="btn btn-primary mt-4 m-3">Membership-Fee</button>
                    </div>
                    <div class="row" style="margin:0 auto;">
                        <button type="button" onClick="generateSlaryReport()"
                            class="btn btn-primary m-3">Salary-Payment</button>
                    </div>
                </div>


            </div>
        </section>

        <script>
        function generateMebershipReport() {
            if (validate()) return;
            document.getElementById("report").action =
                '/accountant/AccountantReportController/generateMebershipPaymentReport';
            document.getElementById("report").submit();
        }

        function generateSlaryReport() {
            if (validate()) return;
            document.getElementById("report").action =
                '/accountant/AccountantReportController/generateSalaryPaymentReport';
            document.getElementById("report").submit();
        }

        function validate() {
            if (document.getElementById('startDate').value > document.getElementById('endDate').value || document
                .getElementById('startDate').value == "" || document.getElementById('endDate').value == "") {
                document.getElementById("error").innerHTML =
                    " <small class=' text-uppercase alert alert-danger text-center  p-2 mb-2'> Invalide Date Selection  </small>";
                return 1;
            }
        }
        </script>


    </div>